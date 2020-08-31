<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Characteristics Controller
 *
 * @property \App\Model\Table\CharacteristicsTable $Characteristics
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CharacteristicsController extends AppController
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
        
        $characteristics = $this->paginate($this->Characteristics);

        $this->set(compact('characteristics'));
    }

    /**
     * View method
     *
     * @param string|null $id Characteristic id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $characteristic = $this->Characteristics->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('characteristic'));
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
        $characteristic = $this->Characteristics->newEmptyEntity();
        if ($this->request->is('post')) {
            $characteristic = $this->Characteristics->patchEntity($characteristic, $this->request->getData());
            if ($this->Characteristics->save($characteristic)) {
                $this->Flash->success(__('A característica foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $users = $this->Characteristics->Users->find('list', ['limit' => 200]);
        $this->set(compact('characteristic', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Characteristic id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $characteristic = $this->Characteristics->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $characteristic = $this->Characteristics->patchEntity($characteristic, $this->request->getData());
            if ($this->Characteristics->save($characteristic)) {
                $this->Flash->success(__('A característica foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }
        $users = $this->Characteristics->Users->find('list', ['limit' => 200]);
        $this->set(compact('characteristic', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Characteristic id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $characteristic = $this->Characteristics->get($id);
        if ($this->Characteristics->delete($characteristic)) {
            $this->Flash->success(__('A característica foi excluída.'));
        } else {
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
