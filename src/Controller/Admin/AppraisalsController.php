<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Appraisals Controller
 *
 * @property \App\Model\Table\AppraisalsTable $Appraisals
 * @method \App\Model\Entity\Appraisal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppraisalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ideas', 'Parameters'],
        ];
        $appraisals = $this->paginate($this->Appraisals);

        $this->set(compact('appraisals'));
    }

    /**
     * View method
     *
     * @param string|null $id Appraisal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appraisal = $this->Appraisals->get($id, [
            'contain' => ['Ideas', 'Parameters'],
        ]);

        $this->set(compact('appraisal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appraisal = $this->Appraisals->newEmptyEntity();
        if ($this->request->is('post')) {
            $appraisal = $this->Appraisals->patchEntity($appraisal, $this->request->getData());
            if ($this->Appraisals->save($appraisal)) {
                $this->Flash->success(__('The appraisal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appraisal could not be saved. Please, try again.'));
        }
        $ideas = $this->Appraisals->Ideas->find('list', ['limit' => 200]);
        $parameters = $this->Appraisals->Parameters->find('list', ['limit' => 200]);
        $this->set(compact('appraisal', 'ideas', 'parameters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appraisal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appraisal = $this->Appraisals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appraisal = $this->Appraisals->patchEntity($appraisal, $this->request->getData());
            if ($this->Appraisals->save($appraisal)) {
                $this->Flash->success(__('The appraisal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appraisal could not be saved. Please, try again.'));
        }
        $ideas = $this->Appraisals->Ideas->find('list', ['limit' => 200]);
        $parameters = $this->Appraisals->Parameters->find('list', ['limit' => 200]);
        $this->set(compact('appraisal', 'ideas', 'parameters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appraisal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appraisal = $this->Appraisals->get($id);
        if ($this->Appraisals->delete($appraisal)) {
            $this->Flash->success(__('The appraisal has been deleted.'));
        } else {
            $this->Flash->error(__('The appraisal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
