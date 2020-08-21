<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Controller\Controller;

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
        $this->paginate = [
            'contain' => ['Edicts', 'Users', 'Owners'],
            'limit' => 3,
            'order' => ['Ideas.id' => 'asc']
        ];
        $ideas = $this->paginate($this->Ideas);

        $this->set(compact('ideas'));
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
            'contain' => ['Edicts', 'Users', 'Appraisals', 'Confidentials', 'Evidences', 'Pitches'],
        ]);

        $this->set(compact('idea'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $idea = $this->Ideas->newEmptyEntity();
        if ($this->request->is('post')) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('The idea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The idea could not be saved. Please, try again.'));
        }
        $edicts = $this->Ideas->Edicts->find('list', ['limit' => 200]);
        $users = $this->Ideas->Users->find('list', ['limit' => 200]);
        $this->set(compact('idea', 'edicts', 'users'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('The idea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The idea could not be saved. Please, try again.'));
        }
        $edicts = $this->Ideas->Edicts->find('list', ['limit' => 200]);
        $users = $this->Ideas->Users->find('list', ['limit' => 200]);
        $this->set(compact('idea', 'edicts', 'users'));
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
        if ($this->Ideas->delete($idea)) {
            $this->Flash->success(__('The idea has been deleted.'));
        } else {
            $this->Flash->error(__('The idea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function vincularAvaliadores($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('O avaliador foi designado com sucesso.'));
            }
            else {
                $this->Flash->error(__('Erro ao designar avaliador.'));
            }
            return $this->redirect(['action' => 'index']);
        }

        $avaliadores = $this->Ideas->Users->find('list', ['conditions' => ['role_id' => '4']]);
        $this->set(compact('idea', 'avaliadores'));
    }

    public function listIdeas() {
        $filteredIdeas = $this->Ideas->find('all', [
            'contain' => [
                'Owners'
            ],
            'conditions' => [
                'user_id =' => $this->Auth->user('id')
            ]
        ]);

        $ideas = $this->paginate($filteredIdeas);
        $edicts = $this->Ideas->Edicts->find('all', ['limit' => 200]);
        $this->set(compact('ideas', 'edicts'));
    }

    public function editSumario($id = null)
    {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);

        if($idea['user_id'] != $this->Auth->user('id'))
        {
            $this->Flash->error(__('Access Denied.'));

            return $this->redirect(['action' => 'listIdeas', $this->Auth->user('id')]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('The idea has been saved.'));

                return $this->redirect(['action' => 'listIdeas']);
            }
            $this->Flash->error(__('The idea could not be saved. Please, try again.'));
        }
        $this->set(compact('idea'));
    }

    public function editCanvas($id = null) {
        $idea = $this->Ideas->get($id, [
            'contain' => ['Users'],
        ]);

        if($idea['user_id'] != $this->Auth->user('id'))
        {
            $this->Flash->error(__('Access Denied.'));

            return $this->redirect(['action' => 'listIdeas', $this->Auth->user('id')]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $idea = $this->Ideas->patchEntity($idea, $this->request->getData());
            if ($this->Ideas->save($idea)) {
                $this->Flash->success(__('The idea has been saved.'));

                return $this->redirect(['action' => 'listIdeas']);
            }
            $this->Flash->error(__('The idea could not be saved. Please, try again.'));
        }
        $this->set(compact('idea'));
    }
}
