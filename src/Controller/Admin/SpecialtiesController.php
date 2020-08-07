<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Specialties Controller
 *
 * @property \App\Model\Table\SpecialtiesTable $Specialties
 * @method \App\Model\Entity\Specialty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecialtiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $specialties = $this->paginate($this->Specialties);

        $this->set(compact('specialties'));
    }

    /**
     * View method
     *
     * @param string|null $id Specialty id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('specialty'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialty = $this->Specialties->newEmptyEntity();
        if ($this->request->is('post')) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('The specialty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialty could not be saved. Please, try again.'));
        }
        $users = $this->Specialties->Users->find('list', ['limit' => 200]);
        $this->set(compact('specialty', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Specialty id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('The specialty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialty could not be saved. Please, try again.'));
        }
        $users = $this->Specialties->Users->find('list', ['limit' => 200]);
        $this->set(compact('specialty', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Specialty id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialty = $this->Specialties->get($id);
        if ($this->Specialties->delete($specialty)) {
            $this->Flash->success(__('The specialty has been deleted.'));
        } else {
            $this->Flash->error(__('The specialty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function vincularAvaliadores($id = null)
    {
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is('post')) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('The specialty has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialty could not be saved. Please, try again.'));
        }
        $avaliadores = $this->Specialties->Users->find('list', ['limit' => 200, 'where' => ['role_id' => '3']]);
        $this->set(compact('specialty', 'avaliadores'));
    }
}
