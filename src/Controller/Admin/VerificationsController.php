<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Verifications Controller
 *
 * @property \App\Model\Table\VerificationsTable $Verifications
 * @method \App\Model\Entity\Verification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VerificationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    /*
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $verifications = $this->paginate($this->Verifications);

        $this->set(compact('verifications'));
    }
    */

    /**
     * View method
     *
     * @param string|null $id Verification id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function view($id = null)
    {
        $verification = $this->Verifications->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('verification'));
    }
    */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    /*
    public function add()
    {
        $verification = $this->Verifications->newEmptyEntity();
        if ($this->request->is('post')) {
            $verification = $this->Verifications->patchEntity($verification, $this->request->getData());
            if ($this->Verifications->save($verification)) {
                $this->Flash->success(__('The verification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verification could not be saved. Please, try again.'));
        }
        $users = $this->Verifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('verification', 'users'));
    }
    */

    /**
     * Edit method
     *
     * @param string|null $id Verification id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function edit($id = null)
    {
        $verification = $this->Verifications->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $verification = $this->Verifications->patchEntity($verification, $this->request->getData());
            if ($this->Verifications->save($verification)) {
                $this->Flash->success(__('The verification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verification could not be saved. Please, try again.'));
        }
        $users = $this->Verifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('verification', 'users'));
    }
    */

    /**
     * Delete method
     *
     * @param string|null $id Verification id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $verification = $this->Verifications->get($id);
        if ($this->Verifications->delete($verification)) {
            $this->Flash->success(__('The verification has been deleted.'));
        } else {
            $this->Flash->error(__('The verification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    */
}
