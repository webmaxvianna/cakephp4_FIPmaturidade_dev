<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Pitches Controller
 *
 * @property \App\Model\Table\PitchesTable $Pitches
 * @method \App\Model\Entity\Pitch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PitchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id_idea = null)
    {
        if($this->Auth->user('role_id') != 1 && $this->Auth->user('role_id') != 5) {
            $this->Flash->error(__('Operação não permitida.'));
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        if($id_idea == null) {
            $this->paginate = [
                'contain' => ['Categories', 'Ideas'],
                'limit' => 5,
                'order' => ['idea_id' => 'asc'],
                'conditions' => ['id_jurado' => $this->Auth->user('id')],
            ];
        }
        else {
            $this->paginate = [
                'contain' => ['Categories', 'Ideas'],
                'limit' => 5,
                'order' => ['idea_id' => 'asc'],
                'conditions' => ['id_jurado' => $this->Auth->user('id'), 'idea_id' => $id_idea],
            ];
        }
        $pitches = $this->paginate($this->Pitches);
        $this->set(compact('pitches'));
    }

    /**
     * View method
     *
     * @param string|null $id Pitch id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pitch = $this->Pitches->get($id, [
            'contain' => ['Categories', 'Ideas'],
        ]);

        $this->set(compact('pitch'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($idea_id = null)
    {
        $user_id = $this->Auth->user('id');

        //Verificação para não permitir a alteração de notas de ideias não vinculadas ao avaliador
        $this->loadModel('IdeasUsersJurors');
        $existe = $this->IdeasUsersJurors->find('list', ['conditions' => ['user_id =' => $user_id, 'idea_id =' => $idea_id]]);
        if($existe->toArray()==null) {
            $this->Flash->error(__('Operação não permitida.'));
            return $this->redirect(['controller' => 'pitches', 'action' => 'index']);
        }
        
        $pitch = $this->Pitches->newEmptyEntity();
        if ($this->request->is('post')) {
            $pitch = $this->Pitches->patchEntity($pitch, $this->request->getData());
            $existe = $this->Pitches->find('list', ['limit' => 200, 'conditions' => ['idea_id =' => $idea_id, 'id_jurado =' => $user_id,
            'category_id =' => $pitch->category_id]]);
            if($existe->toArray()!=null) {
                $pitch->id = key($existe->toArray());
            }
            if ($this->Pitches->save($pitch)) {
                $this->Flash->success(__('A pontuação foi registrada.'));
                return $this->redirect(['action' => 'add', $idea_id]);
            }
            $this->Flash->error(__('A pontuação não pôde ser registrada.'));
        }
        $categories = $this->Pitches->Categories->find('list', ['limit' => 200]);
        $ideas = $this->Pitches->Ideas->find('list', ['limit' => 200, 'conditions' => ['id' => $idea_id]]);
        $this->loadModel('Users');
        $jurado = $this->Users->find('list', ['limit' => 200, 'conditions' => ['id' => $user_id]]);
        $this->set(compact('pitch', 'categories', 'ideas', 'jurado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pitch id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $idea_id = null)
    {
        $user_id = $this->Auth->user('id');

        //Verificação para não permitir a alteração de notas de ideias não vinculadas ao avaliador
        $this->loadModel('IdeasUsersJurors');
        $existe = $this->IdeasUsersJurors->find('list', ['conditions' => ['user_id =' => $user_id, 'idea_id =' => $idea_id]]);
        if($existe->toArray()==null) {
            $this->Flash->error(__('Operação não permitida.'));
            return $this->redirect(['controller' => 'pitches', 'action' => 'index']);
        }

        $pitch = $this->Pitches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pitch = $this->Pitches->patchEntity($pitch, $this->request->getData());
            if ($this->Pitches->save($pitch)) {
                $this->Flash->success(__('A pontuação foi editada.'));
                return $this->redirect(['action' => 'index', $idea_id]);
            }
            $this->Flash->error(__('A pontuação não pôde ser editada.'));
        }
        $this->loadModel('Users');
        $ideas = $this->Pitches->Ideas->find('list', ['limit' => 200, 'conditions' => ['id' => $idea_id]]);
        $jurado = $this->Users->find('list', ['limit' => 200, 'conditions' => ['id' => $user_id]]);
        $categories = $this->Pitches->Categories->find('list', ['limit' => 200]);
        $this->set(compact('pitch', 'ideas', 'categories', 'jurado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pitch id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->Flash->error(__('Operação não permitida.'));
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $pitch = $this->Pitches->get($id);
        if ($this->Pitches->delete($pitch)) {
            $this->Flash->success(__('The pitch has been deleted.'));
        } else {
            $this->Flash->error(__('The pitch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function indexPitchCandidato($id_user = null)
    {
        if($this->Auth->user('role_id') != 3) {
            $this->Flash->error(__('Operação não permitida.'));
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->loadModel('Ideas');
        $idea = $this->Ideas->find('all', ['limit' => 200, 'conditions' => ['user_id' => $id_user, 'edict_id' => constant("EDITAL_ATUAL")]])->toArray();
        $this->paginate = [
            'contain' => ['Ideas', 'Categories'],
            'limit' => 5,
            'order' => ['idea_id' => 'asc'],
            'conditions' => ['idea_id' => $idea[0]->id],
        ];
        $pitches = $this->paginate($this->Pitches);
        $this->set(compact('pitches'));
    }
}
