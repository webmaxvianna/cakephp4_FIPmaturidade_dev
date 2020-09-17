<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Interests Controller
 *
 * @property \App\Model\Table\InterestsTable $Interests
 * @method \App\Model\Entity\Interest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InterestsController extends AppController
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
            'limit' => 5
        ];

        $interests = $this->paginate($this->Interests);

        $this->set(compact('interests'));
        $this->set("title_for_layout", "Interesses"); //Titulo da Página
    }

    /**
     * View method
     *
     * @param string|null $id Interest id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $interest = $this->Interests->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('interest'));
                
        $this->loadModel('InterestsUsers');
        $users = $this->InterestsUsers->find('all')->contain(['Users'])->where(['interest_id' => $id]);
        $this->paginate = ['limit' => 5];
        $this->set('users', $this->paginate($users));

        $this->set("title_for_layout", "Visualizar Interesses"); //Titulo da Página
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $interest = $this->Interests->newEmptyEntity();
        if ($this->request->is('post')) {
            $interest = $this->Interests->patchEntity($interest, $this->request->getData());
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__('O interesse foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $users = $this->Interests->Users->find('list', ['limit' => 200]);
        $this->set(compact('interest', 'users'));
        $this->set("title_for_layout", "Adicionar Interesses"); //Titulo da Página
    }

    /**
     * Edit method
     *
     * @param string|null $id Interest id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $interest = $this->Interests->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $interest = $this->Interests->patchEntity($interest, $this->request->getData());
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__('O interesse foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $users = $this->Interests->Users->find('list', ['limit' => 200]);
        $this->set(compact('interest', 'users'));
        $this->set("title_for_layout", "Editar Interesses"); //Titulo da Página
    }

    /**
     * Delete method
     *
     * @param string|null $id Interest id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $interest = $this->Interests->get($id);
        if ($this->Interests->delete($interest)) {
            $this->Flash->success(__('O interesse foi excluído.'));
        } else {
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
