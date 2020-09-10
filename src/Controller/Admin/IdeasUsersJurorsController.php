<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * IdeasUsersJurors Controller
 *
 * @property \App\Model\Table\IdeasUsersJurorsTable $IdeasUsersJurors
 * @method \App\Model\Entity\IdeasUsersJuror[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IdeasUsersJurorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id = null)
    {
        $this->loadModel('IdeasUsersJurors');
        $this->paginate = [
            'contain' => ['Ideas', 'Users'],
            'limit' => 5,
            'order' => ['Ideasusersjurors.id' => 'asc'],
            'conditions' => ['Users.id' => $id],
            'sortWhitelist' => ['Ideas.titulo', 'Ideas.descricao', 'Ideas.status']
        ];
        $ideasUsersJurors = $this->paginate($this->IdeasUsersJurors);

        $this->set(compact('ideasUsersJurors'));
    }

    /**
     * View method
     *
     * @param string|null $id Ideas Users Juror id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('IdeasUsersJurors');
        $ideasUsersJuror = $this->IdeasUsersJurors->get($id, [
            'contain' => ['Ideas', 'Users'],
        ]);

        $this->set(compact('ideasUsersJuror'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ideasUsersJuror = $this->IdeasUsersJurors->newEmptyEntity();
        if ($this->request->is('post')) {
            $ideasUsersJuror = $this->IdeasUsersJurors->patchEntity($ideasUsersJuror, $this->request->getData());
            if ($this->IdeasUsersJurors->save($ideasUsersJuror)) {
                $this->Flash->success(__('The ideas users juror has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ideas users juror could not be saved. Please, try again.'));
        }
        $ideas = $this->IdeasUsersJurors->Ideas->find('list', ['limit' => 200]);
        $users = $this->IdeasUsersJurors->Users->find('list', ['limit' => 200]);
        $this->set(compact('ideasUsersJuror', 'ideas', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ideas Users Juror id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ideasUsersJuror = $this->IdeasUsersJurors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ideasUsersJuror = $this->IdeasUsersJurors->patchEntity($ideasUsersJuror, $this->request->getData());
            if ($this->IdeasUsersJurors->save($ideasUsersJuror)) {
                $this->Flash->success(__('The ideas users juror has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ideas users juror could not be saved. Please, try again.'));
        }
        $ideas = $this->IdeasUsersJurors->Ideas->find('list', ['limit' => 200]);
        $users = $this->IdeasUsersJurors->Users->find('list', ['limit' => 200]);
        $this->set(compact('ideasUsersJuror', 'ideas', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ideas Users Juror id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ideasUsersJuror = $this->IdeasUsersJurors->get($id);
        if ($this->IdeasUsersJurors->delete($ideasUsersJuror)) {
            $this->Flash->success(__('The ideas users juror has been deleted.'));
        } else {
            $this->Flash->error(__('The ideas users juror could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
