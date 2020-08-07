<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Confidentials Controller
 *
 * @property \App\Model\Table\ConfidentialsTable $Confidentials
 * @method \App\Model\Entity\Confidential[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfidentialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ideas'],
        ];
        $confidentials = $this->paginate($this->Confidentials);

        $this->set(compact('confidentials'));
    }

    /**
     * View method
     *
     * @param string|null $id Confidential id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $confidential = $this->Confidentials->get($id, [
            'contain' => ['Ideas'],
        ]);

        $this->set(compact('confidential'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $confidential = $this->Confidentials->newEmptyEntity();
        if ($this->request->is('post')) {
            $confidential = $this->Confidentials->patchEntity($confidential, $this->request->getData());
            if ($this->Confidentials->save($confidential)) {
                $this->Flash->success(__('The confidential has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The confidential could not be saved. Please, try again.'));
        }
        $ideas = $this->Confidentials->Ideas->find('list', ['limit' => 200]);
        $this->set(compact('confidential', 'ideas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Confidential id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $confidential = $this->Confidentials->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $confidential = $this->Confidentials->patchEntity($confidential, $this->request->getData());
            if ($this->Confidentials->save($confidential)) {
                $this->Flash->success(__('The confidential has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The confidential could not be saved. Please, try again.'));
        }
        $ideas = $this->Confidentials->Ideas->find('list', ['limit' => 200]);
        $this->set(compact('confidential', 'ideas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Confidential id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $confidential = $this->Confidentials->get($id);
        if ($this->Confidentials->delete($confidential)) {
            $this->Flash->success(__('The confidential has been deleted.'));
        } else {
            $this->Flash->error(__('The confidential could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
