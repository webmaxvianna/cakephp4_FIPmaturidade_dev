<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Resumes Controller
 *
 * @property \App\Model\Table\ResumesTable $Resumes
 * @method \App\Model\Entity\Resume[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResumesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $resumes = $this->paginate($this->Resumes);

        $this->set(compact('resumes'));
    }

    /**
     * View method
     *
     * @param string|null $id Resume id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resume = $this->Resumes->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('resume'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resume = $this->Resumes->newEmptyEntity();
        if ($this->request->is('post')) {
            $resume = $this->Resumes->patchEntity($resume, $this->request->getData());
            if ($this->Resumes->save($resume)) {
                $this->Flash->success(__('The resume has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resume could not be saved. Please, try again.'));
        }
        $users = $this->Resumes->Users->find('list', ['limit' => 200]);
        $this->set(compact('resume', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resume id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resume = $this->Resumes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resume = $this->Resumes->patchEntity($resume, $this->request->getData());
            if ($this->Resumes->save($resume)) {
                $this->Flash->success(__('The resume has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resume could not be saved. Please, try again.'));
        }
        $users = $this->Resumes->Users->find('list', ['limit' => 200]);
        $this->set(compact('resume', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resume id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resume = $this->Resumes->get($id);
        if ($this->Resumes->delete($resume)) {
            $this->Flash->success(__('The resume has been deleted.'));
        } else {
            $this->Flash->error(__('The resume could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
