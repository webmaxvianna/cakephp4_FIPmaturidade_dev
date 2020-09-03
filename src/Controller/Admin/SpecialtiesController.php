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
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        $this->paginate = [
            'limit' => 5
        ];
        
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
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
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
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $specialty = $this->Specialties->newEmptyEntity();
        if ($this->request->is('post')) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('A especialidade foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
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
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('A especialidade foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
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
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $specialty = $this->Specialties->get($id);
        if ($this->Specialties->delete($specialty)) {
            $this->Flash->success(__('A especialidade foi excluída.'));
        } else {
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function vincularAvaliadores($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);
        //debug($this->request->getData());exit;
        if ($this->request->is(['patch', 'post', 'put'])) {   
            // debug($this->request->getData());         
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('A especialidade foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        $this->loadModel('Roles');
        $avaliadorId = $this->Roles->find()
        ->where(['funcao LIKE' => 'Avaliador'])
        ->toList();
        
        $avaliadores = $this->Users->find('list', ['conditions' => ['role_id' => $avaliadorId[0]['id']]]);
        $this->set(compact('specialty', 'avaliadores'));
    }

    public function vincularConsultores($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);
        //debug($this->request->getData());exit;
        if ($this->request->is(['patch', 'post', 'put'])) {   
            debug($this->request->getData());exit;         
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('A especialidade foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        $this->loadModel('Roles');
        $consultorId = $this->Roles->find()
        ->where(['funcao LIKE' => 'Consultor'])
        ->toList();
        
        $consultores = $this->Specialties->Users->find('list', ['conditions' => ['role_id' => $consultorId[0]['id']]]);
        $this->set(compact('specialty', 'consultores'));
    }

    public function vincularJurados($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Users'],
        ]);
        //debug($this->request->getData());exit;
        if ($this->request->is(['patch', 'post', 'put'])) {   
            //debug($this->request->getData());exit;         
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->getData());
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('A especialidade foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro. Por favor, tente novamente.'));
        }

        $this->loadModel('Roles');
        $juradoId = $this->Roles->find()
        ->where(['funcao LIKE' => 'Jurado'])
        ->toList();
        
        $jurados = $this->Users->find('list', ['conditions' => ['role_id' => $juradoId[0]['id']]]);
        $this->set(compact('specialty', 'jurados'));
    }
}
