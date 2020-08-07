<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Parameters Controller
 *
 * @property \App\Model\Table\ParametersTable $Parameters
 * @method \App\Model\Entity\Parameter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParametersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $parameters = $this->paginate($this->Parameters);

        $this->set(compact('parameters'));
    }

    /**
     * View method
     *
     * @param string|null $id Parameter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parameter = $this->Parameters->get($id, [
            'contain' => ['Edicts', 'Appraisals'],
        ]);

        $this->set(compact('parameter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parameter = $this->Parameters->newEmptyEntity();
        if ($this->request->is('post')) {
            $parameter = $this->Parameters->patchEntity($parameter, $this->request->getData());
            if ($this->Parameters->save($parameter)) {
                $this->Flash->success(__('The parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parameter could not be saved. Please, try again.'));
        }
        $edicts = $this->Parameters->Edicts->find('list', ['limit' => 200]);
        $this->set(compact('parameter', 'edicts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parameter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parameter = $this->Parameters->get($id, [
            'contain' => ['Edicts'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parameter = $this->Parameters->patchEntity($parameter, $this->request->getData());
            if ($this->Parameters->save($parameter)) {
                $this->Flash->success(__('The parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parameter could not be saved. Please, try again.'));
        }
        $edicts = $this->Parameters->Edicts->find('list', ['limit' => 200]);
        $this->set(compact('parameter', 'edicts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parameter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parameter = $this->Parameters->get($id);
        if ($this->Parameters->delete($parameter)) {
            $this->Flash->success(__('The parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The parameter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
