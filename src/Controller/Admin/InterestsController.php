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
        $this->paginate = [
            'order' => ['Interests.interesse' => 'asc']
        ];

        $interests = $this->paginate($this->Interests);

        $this->set(compact('interests'));
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
        $interest = $this->Interests->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('interest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $interest = $this->Interests->newEmptyEntity();
        if ($this->request->is('post')) {
            $interest = $this->Interests->patchEntity($interest, $this->request->getData());
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__('The interest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The interest could not be saved. Please, try again.'));
        }
        $users = $this->Interests->Users->find('list', ['limit' => 200]);
        $this->set(compact('interest', 'users'));
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
        $interest = $this->Interests->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $interest = $this->Interests->patchEntity($interest, $this->request->getData());
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__('The interest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The interest could not be saved. Please, try again.'));
        }
        $users = $this->Interests->Users->find('list', ['limit' => 200]);
        $this->set(compact('interest', 'users'));
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
        $this->request->allowMethod(['post', 'delete']);
        $interest = $this->Interests->get($id);
        if ($this->Interests->delete($interest)) {
            $this->Flash->success(__('The interest has been deleted.'));
        } else {
            $this->Flash->error(__('The interest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
