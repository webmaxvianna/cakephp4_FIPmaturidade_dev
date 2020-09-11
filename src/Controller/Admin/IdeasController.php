<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Ideas Controller
 *
 * @property \App\Model\Table\IdeasTable $Ideas
 * @method \App\Model\Entity\Idea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IdeasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->paginate = [
            'contain' => ['Edicts', 'Users', 'Owners'],
            'limit' => 5,
            'order' => ['Ideas.id' => 'asc']
        ];
        $ideas = $this->paginate($this->Ideas);

        $this->set(compact('ideas'));
        $this->set("title_for_layout", "Ideias"); //Titulo da Página
    }

    /**
     * View method
     *
     * @param string|null $id Idea id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Edicts', 'Owners', 'Appraisals', 'Confidentials', 'Evidences', 'Pitches'],
        ]);
        
        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        $this->set(compact('idea'));
        $this->set("title_for_layout", "Visualizar Ideia"); //Titulo da Página
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        //Checagem caso o usuário tente passar outro id pela URL
        if ($id != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        //Checagem se já existe uma ideia cadastrada no edital atual
        if($id != null) {
            $idea = $this->Ideas->find('list', ['limit' => 200, 'contain' => ['Edicts'], 'conditions' => ['Ideas.user_id' => $id, 'Edicts.id' => constant("EDITAL_ATUAL")]]);
            if($idea->toArray() != null) {
                $this->Flash->error(__('Você já possui uma ideia cadastrada no edital atual.'));
                return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
            }
        }

        $idea = $this->Ideas->newEmptyEntity();
        if ($this->request->is('post')) {
            $idea->user_id = $this->Auth->user('id');
            $idea->edict_id = constant("EDITAL_ATUAL");
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('A ideia foi salva.'));

                return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro durante o cadastro. Por favor, tente novamente.'));
        }
        $edicts = $this->Ideas->Edicts->find('list', ['limit' => 200]);
        if ($id == null) {
            $users = $this->Ideas->Users->find('list', ['limit' => 200]);
        } else {
            $users = $this->Ideas->Users->find('list', ['limit' => 200, 'conditions' => ['Users.id' => $id]]);
        }
        $this->set(compact('idea', 'edicts', 'users'));
        $this->set("title_for_layout", "Adicionar Ideia"); //Titulo da Página
    }

    /**
     * Edit method
     *
     * @param string|null $id Idea id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);
        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('A ideia foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        //$edicts = $this->Ideas->Edicts->find('list', ['limit' => 200]);
        //$users = $this->Ideas->Users->find('list', ['limit' => 200]);
        //$users = $this->Ideas->Users->find('list', ['limit' => 200, 'conditions' => ['Users.id' => $this->Auth->user('id')]]);
        $this->set(compact('idea'));
        $this->set("title_for_layout", "Editar Ideia"); //Titulo da Página
    }

    /**
     * Delete method
     *
     * @param string|null $id Idea id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $idea = $this->Ideas->get($id);

        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        if ($this->Ideas->delete($idea)) {
            $this->Flash->success(__('A ideia foi apagada.'));
        } else {
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function vincularAvaliadores($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);

        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('O avaliador foi designado com sucesso.'));
            } else {
                $this->Flash->error(__('Erro ao designar avaliador.'));
            }
            return $this->redirect(['action' => 'index']);
        }

        $avaliadores = $this->Ideas->Users->find('list', ['conditions' => ['role_id' => '2']]);
        $this->set(compact('idea', 'avaliadores'));
        $this->set("title_for_layout", "Vincular Avaliadores"); //Titulo da Página
    }

    public function vincularJurados($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        $idea = $this->Ideas->get($id, [
            'contain' => ['Jurors'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData()); 
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('O jurado foi designado com sucesso.'));
            } else {
                $this->Flash->error(__('Erro ao designar jurado.'));
            }
            return $this->redirect(['action' => 'index']);
        }

        $jurados = $this->Ideas->Users->find('list', ['conditions' => ['role_id' => '5']]);
        $this->set(compact('idea', 'jurados'));
    }

    public function addApplicantIdeas($id = null)
    {
        $user = $this->Ideas->Users->get($id, [
            'contain' => ['MyEdicts', 'Edicts', 'MyIdeas'],
        ]);
        $idea = $this->Ideas->newEmptyEntity();
        if ($this->request->is('post')) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            $edict = end($user->edicts);
            $idea['edict_id'] = $edict->id;
            $idea['user_id'] = $user->id;
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('The idea has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'applicantIdeas', $user->id]);
            }
            $this->Flash->error(__('The idea could not be saved. Please, try again.'));
        }
        $this->set(compact('idea'));
        $this->set(compact('user'));
    }

    public function indexCandidatos($id = null)
    {
        $this->paginate = [
            'contain' => ['Edicts', 'Users', 'Owners'],
            'limit' => 3,
            'conditions' => ['Owners.id' => $id],
            'order' => ['Ideas.id' => 'asc']
        ];
        $ideas = $this->paginate($this->Ideas);

        $this->set(compact('ideas'));
        $this->set("Ideias", "Tela de Acesso"); //Titulo da Página
    }

    public function addIdeas($id = null)
    {
        //Checagem caso o usuário tente passar outro id pela URL
        if ($id != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        //Checagem se já existe uma ideia cadastrada no edital atual
        if($id != null) {
            $idea = $this->Ideas->find('list', ['limit' => 200, 'contain' => ['Edicts'], 'conditions' => ['Ideas.user_id' => $id, 'Edicts.id' => constant("EDITAL_ATUAL")]]);
            if($idea->toArray() != null) {
                $this->Flash->error(__('Você já possui uma ideia cadastrada no edital atual.'));
                return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
            }
        }

        $idea = $this->Ideas->newEmptyEntity();
        if ($this->request->is('post')) {
            $idea->user_id = $this->Auth->user('id');
            $idea->edict_id = constant("EDITAL_ATUAL");
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('A ideia foi salva.'));

                return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('Ocorreu um erro durante o cadastro. Por favor, tente novamente.'));
        }
        $edicts = $this->Ideas->Edicts->find('list', ['limit' => 200]);
        if ($id == null) {
            $users = $this->Ideas->Users->find('list', ['limit' => 200]);
        } else {
            $users = $this->Ideas->Users->find('list', ['limit' => 200, 'conditions' => ['Users.id' => $id]]);
        }
        $this->set(compact('idea', 'edicts', 'users'));
        $this->set("title_for_layout", "Adicionar Ideia"); //Titulo da Página
    }

    public function editIdeas($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);
        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('As informações da ideia foram salvas.'));

                return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $this->set(compact('idea'));
        $this->set("title_for_layout", "Editar Ideia"); //Titulo da Página
    }

    public function editCanvas($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);
        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('As informações do Canvas foram salvas.'));

                return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $this->set(compact('idea'));
        $this->set("title_for_layout", "Editar Canvas"); //Titulo da Página
    }

    public function editSumario($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);
        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('As informações do Sumário Executivo foram salvas.'));

                return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $this->set(compact('idea'));
        $this->set("title_for_layout", "Editar Sumário"); //Titulo da Página
    }

    public function finishIdea($id = null)
    {
        $idea = $this->Ideas->get($id);
        $idea->status = 2;

        if($idea->toArray()['user_id'] != $this->Auth->user('id') && $this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        
        if ($this->Ideas->save($idea)) {
            $this->Flash->success(__('A ideia foi finalizada.'));
            return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
        }
        $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        return $this->redirect(['action' => 'indexCandidatos', $this->Auth->user('id')]);
    }
}
