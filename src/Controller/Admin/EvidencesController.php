<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Evidences Controller
 *
 * @property \App\Model\Table\EvidencesTable $Evidences
 * @method \App\Model\Entity\Evidence[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EvidencesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ideas', 'Tasks'],
        ];
        $evidences = $this->paginate($this->Evidences);

        $this->set(compact('evidences'));
    }

    /**
     * View method
     *
     * @param string|null $id Evidence id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evidence = $this->Evidences->get($id, [
            'contain' => ['Ideas', 'Tasks'],
        ]);

        $this->set(compact('evidence'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $evidence = $this->Evidences->newEmptyEntity();
        if ($this->request->is('post')) {
            $evidence = $this->Evidences->patchEntity($evidence, $this->request->getData());
            if ($this->Evidences->save($evidence)) {
                $this->Flash->success(__('The evidence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evidence could not be saved. Please, try again.'));
        }
        $ideas = $this->Evidences->Ideas->find('list', ['limit' => 200]);
        $tasks = $this->Evidences->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('evidence', 'ideas', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Evidence id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evidence = $this->Evidences->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evidence = $this->Evidences->patchEntity($evidence, $this->request->getData());
            if ($this->Evidences->save($evidence)) {
                $this->Flash->success(__('The evidence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evidence could not be saved. Please, try again.'));
        }
        $ideas = $this->Evidences->Ideas->find('list', ['limit' => 200]);
        $tasks = $this->Evidences->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('evidence', 'ideas', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Evidence id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evidence = $this->Evidences->get($id);
        if ($this->Evidences->delete($evidence)) {
            $this->Flash->success(__('The evidence has been deleted.'));
        } else {
            $this->Flash->error(__('The evidence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
