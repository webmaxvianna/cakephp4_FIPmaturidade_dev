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
    public function index($id_idea = null)
    {
        if($this->Auth->user('role_id') != 1 && $this->Auth->user('role_id') != 2) {
            $this->Flash->error(__('Operação não permitida.'));
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        if($id_idea == null) {
            $this->paginate = [
                'contain' => ['Ideas', 'Parameters'],
                'limit' => 5,
                'order' => ['idea_id' => 'asc'],
                'conditions' => ['id_avaliador' => $this->Auth->user('id')],
            ];
        }
        else {
            $this->paginate = [
                'contain' => ['Ideas', 'Parameters'],
                'limit' => 5,
                'order' => ['idea_id' => 'asc'],
                'conditions' => ['id_avaliador' => $this->Auth->user('id'), 'idea_id' => $id_idea],
            ];
        }
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
    public function add($idea_id = null)
    {
        $user_id = $this->Auth->user('id');

        //Verificação para não permitir a alteração de notas de ideias não vinculadas ao avaliador
        $this->loadModel('IdeasUsers');
        $existe = $this->IdeasUsers->find('list', ['conditions' => ['user_id =' => $user_id, 'idea_id =' => $idea_id]]);
        if($existe->toArray()==null) {
            $this->Flash->error(__('Operação não permitida.'));
            return $this->redirect(['controller' => 'appraisals', 'action' => 'index']);
        }

        $appraisal = $this->Appraisals->newEmptyEntity();
        if ($this->request->is('post')) {
            $appraisal = $this->Appraisals->patchEntity($appraisal, $this->request->getData());
            $existe = $this->Appraisals->find('list', ['limit' => 200, 'conditions' => ['idea_id =' => $idea_id, 'id_avaliador =' => $user_id,
            'parameter_id =' => $appraisal->parameter_id]]);
            if($existe->toArray()!=null) {
                $appraisal->id = key($existe->toArray());
            }
            if ($this->Appraisals->save($appraisal)) {
                $this->Flash->success(__('A pontuação foi registrada.'));
                return $this->redirect(['controller' => 'appraisals', 'action' => 'add', $idea_id]);
            }
            $this->Flash->error(__('A pontuação não pôde ser registrada.'));
        }
        $this->loadModel('Users');
        $ideas = $this->Appraisals->Ideas->find('list', ['limit' => 200, 'conditions' => ['id' => $idea_id]]);
        $avaliador = $this->Users->find('list', ['limit' => 200, 'conditions' => ['id' => $user_id]]);
        $parameters = $this->Appraisals->Parameters->find('list', ['limit' => 200]);
        $this->set(compact('appraisal', 'ideas', 'parameters', 'avaliador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appraisal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $idea_id = null)
    {
        $user_id = $this->Auth->user('id');

        //Verificação para não permitir a alteração de notas de ideias não vinculadas ao avaliador
        $this->loadModel('IdeasUsers');
        $existe = $this->IdeasUsers->find('list', ['conditions' => ['user_id =' => $user_id, 'idea_id =' => $idea_id]]);
        if($existe->toArray()==null) {
            $this->Flash->error(__('Operação não permitida.'));
            return $this->redirect(['controller' => 'appraisals', 'action' => 'index']);
        }

        $appraisal = $this->Appraisals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appraisal = $this->Appraisals->patchEntity($appraisal, $this->request->getData());
            if ($this->Appraisals->save($appraisal)) {
                $this->Flash->success(__('A pontuação foi editada.'));

                return $this->redirect(['action' => 'index', $idea_id]);
            }
            $this->Flash->error(__('A pontuação não pôde ser editada.'));
        }
        $this->loadModel('Users');
        $ideas = $this->Appraisals->Ideas->find('list', ['limit' => 200, 'conditions' => ['id' => $idea_id]]);
        $avaliador = $this->Users->find('list', ['limit' => 200, 'conditions' => ['id' => $user_id]]);
        $parameters = $this->Appraisals->Parameters->find('list', ['limit' => 200]);
        $this->set(compact('appraisal', 'ideas', 'parameters', 'avaliador'));
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
        if($this->Auth->user('role_id') != 1) {
            $this->Flash->error(__('Operação não permitida.'));
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
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
