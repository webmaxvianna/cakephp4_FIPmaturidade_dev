<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Consultants Controller
 *
 * @property \App\Model\Table\ConsultantsTable $Consultants
 * @method \App\Model\Entity\Consultant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsultantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Managers'],
        ];
        $consultants = $this->paginate($this->Consultants);

        $this->set(compact('consultants'));
    }

    /**
     * View method
     *
     * @param string|null $id Consultant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consultant = $this->Consultants->get($id, [
            'contain' => ['Managers', 'Edicts', 'Specialties', 'Tasks'],
        ]);

        $this->set(compact('consultant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consultant = $this->Consultants->newEmptyEntity();
        if ($this->request->is('post')) {
            $consultores = $this->request->getData(); 
            $consultores['nome_completo'] = $consultores['nome']." ".$consultores['sobrenome'];
            $consultant = $this->Consultants->patchEntity($consultant, $consultores);
            if ($this->Consultants->save($consultant)) {
                $this->Flash->success(__('The consultant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consultant could not be saved. Please, try again.'));
        }
        $managers = $this->Consultants->Managers->find('list', ['limit' => 200]);
        $edicts = $this->Consultants->Edicts->find('list', ['limit' => 200]);
        $specialties = $this->Consultants->Specialties->find('list', ['limit' => 200]);
        $tasks = $this->Consultants->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('consultant', 'managers', 'edicts', 'specialties', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consultant = $this->Consultants->get($id, [
            'contain' => ['Edicts', 'Specialties', 'Tasks'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consultores = $this->request->getData(); 
            $consultores['nome_completo'] = $consultores['nome']." ".$consultores['sobrenome'];
            $consultant = $this->Consultants->patchEntity($consultant, $consultores);
            if ($this->Consultants->save($consultant)) {
                $this->Flash->success(__('The consultant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consultant could not be saved. Please, try again.'));
        }
        $managers = $this->Consultants->Managers->find('list', ['limit' => 200]);
        $edicts = $this->Consultants->Edicts->find('list', ['limit' => 200]);
        $specialties = $this->Consultants->Specialties->find('list', ['limit' => 200]);
        $tasks = $this->Consultants->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('consultant', 'managers', 'edicts', 'specialties', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consultant = $this->Consultants->get($id);
        if ($this->Consultants->delete($consultant)) {
            $this->Flash->success(__('The consultant has been deleted.'));
        } else {
            $this->Flash->error(__('The consultant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
