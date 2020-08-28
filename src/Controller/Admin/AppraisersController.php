<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Appraisers Controller
 *
 * @property \App\Model\Table\AppraisersTable $Appraisers
 * @method \App\Model\Entity\Appraiser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppraisersController extends AppController
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
        $appraisers = $this->paginate($this->Appraisers);

        $this->set(compact('appraisers'));
    }

    /**
     * View method
     *
     * @param string|null $id Appraiser id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appraiser = $this->Appraisers->get($id, [
            'contain' => ['Managers', 'Edicts', 'Ideas', 'Specialties', 'Appraisals'],
        ]);

        $this->set(compact('appraiser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appraiser = $this->Appraisers->newEmptyEntity();
        if ($this->request->is('post')) {
            $avaliadores = $this->request->getData(); 
            $avaliadores['nome_completo'] = $avaliadores['nome']." ".$avaliadores['sobrenome'];
            $appraiser = $this->Appraisers->patchEntity($appraiser, $avaliadores);
            if ($this->Appraisers->save($appraiser)) {
                $this->Flash->success(__('The appraiser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appraiser could not be saved. Please, try again.'));
        }
        $managers = $this->Appraisers->Managers->find('list', ['limit' => 200]);
        $edicts = $this->Appraisers->Edicts->find('list', ['limit' => 200]);
        $ideas = $this->Appraisers->Ideas->find('list', ['limit' => 200]);
        $specialties = $this->Appraisers->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('appraiser', 'managers', 'edicts', 'ideas', 'specialties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appraiser id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appraiser = $this->Appraisers->get($id, [
            'contain' => ['Edicts', 'Ideas', 'Specialties'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $avaliadores = $this->request->getData(); 
            $avaliadores['nome_completo'] = $avaliadores['nome']." ".$avaliadores['sobrenome'];
            $appraiser = $this->Appraisers->patchEntity($appraiser, $avaliadores);
            if ($this->Appraisers->save($appraiser)) {
                $this->Flash->success(__('The appraiser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appraiser could not be saved. Please, try again.'));
        }
        $managers = $this->Appraisers->Managers->find('list', ['limit' => 200]);
        $edicts = $this->Appraisers->Edicts->find('list', ['limit' => 200]);
        $ideas = $this->Appraisers->Ideas->find('list', ['limit' => 200]);
        $specialties = $this->Appraisers->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('appraiser', 'managers', 'edicts', 'ideas', 'specialties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appraiser id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appraiser = $this->Appraisers->get($id);
        if ($this->Appraisers->delete($appraiser)) {
            $this->Flash->success(__('The appraiser has been deleted.'));
        } else {
            $this->Flash->error(__('The appraiser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
