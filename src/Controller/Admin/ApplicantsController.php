<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 * @method \App\Model\Entity\Applicant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $applicants = $this->paginate($this->Applicants);

        $this->set(compact('applicants'));
    }

    /**
     * View method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => ['Characteristics', 'Interests', 'Ideas', 'Resumes', 'Verifications'],
        ]);

        $this->set(compact('applicant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicant = $this->Applicants->newEmptyEntity();
        if ($this->request->is('post')) {
            $candidatos = $this->request->getData(); 
            $candidatos['nome_completo'] = $candidatos['nome']." ".$candidatos['sobrenome'];
            $apllicant = $this->Applicants->patchEntity($applicant, $candidatos);
            if ($this->Applicants->save($applicant)) {
                $this->Flash->success(__('The applicant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
        }
        $characteristics = $this->Applicants->Characteristics->find('list', ['limit' => 200]);
        $interests = $this->Applicants->Interests->find('list', ['limit' => 200]);
        $this->set(compact('applicant', 'characteristics', 'interests'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => ['Characteristics', 'Interests'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidatos = $this->request->getData(); 
            $candidatos['nome_completo'] = $candidatos['nome']." ".$candidatos['sobrenome'];
            $apllicant = $this->Applicants->patchEntity($applicant, $candidatos);
            if ($this->Applicants->save($applicant)) {
                $this->Flash->success(__('The applicant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
        }
        $characteristics = $this->Applicants->Characteristics->find('list', ['limit' => 200]);
        $interests = $this->Applicants->Interests->find('list', ['limit' => 200]);
        $this->set(compact('applicant', 'characteristics', 'interests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicant = $this->Applicants->get($id);
        if ($this->Applicants->delete($applicant)) {
            $this->Flash->success(__('The applicant has been deleted.'));
        } else {
            $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
