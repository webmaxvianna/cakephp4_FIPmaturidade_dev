<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Jurors Controller
 *
 * @property \App\Model\Table\JurorsTable $Jurors
 * @method \App\Model\Entity\Juror[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JurorsController extends AppController
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
        $jurors = $this->paginate($this->Jurors);

        $this->set(compact('jurors'));
    }

    /**
     * View method
     *
     * @param string|null $id Juror id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $juror = $this->Jurors->get($id, [
            'contain' => ['Managers', 'Edicts', 'Specialties', 'Pitches'],
        ]);

        $this->set(compact('juror'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $juror = $this->Jurors->newEmptyEntity();
        if ($this->request->is('post')) {
            $jurados = $this->request->getData(); 
            $jurados['nome_completo'] = $jurados['nome']." ".$jurados['sobrenome'];
            $juror = $this->Jurors->patchEntity($juror, $jurados);
            if ($this->Jurors->save($juror)) {
                $this->Flash->success(__('The juror has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The juror could not be saved. Please, try again.'));
        }
        $managers = $this->Jurors->Managers->find('list', ['limit' => 200]);
        $edicts = $this->Jurors->Edicts->find('list', ['limit' => 200]);
        $specialties = $this->Jurors->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('juror', 'managers', 'edicts', 'specialties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Juror id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $juror = $this->Jurors->get($id, [
            'contain' => ['Edicts', 'Specialties'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jurados = $this->request->getData(); 
            $jurados['nome_completo'] = $jurados['nome']." ".$jurados['sobrenome'];
            $juror = $this->Jurors->patchEntity($juror, $jurados);
            if ($this->Jurors->save($juror)) {
                $this->Flash->success(__('The juror has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The juror could not be saved. Please, try again.'));
        }
        $managers = $this->Jurors->Managers->find('list', ['limit' => 200]);
        $edicts = $this->Jurors->Edicts->find('list', ['limit' => 200]);
        $specialties = $this->Jurors->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('juror', 'managers', 'edicts', 'specialties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Juror id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $juror = $this->Jurors->get($id);
        if ($this->Jurors->delete($juror)) {
            $this->Flash->success(__('The juror has been deleted.'));
        } else {
            $this->Flash->error(__('The juror could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
