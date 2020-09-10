<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * IdeasUsers Controller
 *
 * @property \App\Model\Table\IdeasUsersTable $IdeasUsers
 * @method \App\Model\Entity\IdeasUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IdeasUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id = null)
    {
        $this->paginate = [
            'contain' => ['Ideas', 'Users'],
            'limit' => 5,
            'order' => ['Ideasusers.id' => 'asc'],
            'conditions' => ['Users.id' => $id],
            'sortWhitelist' => ['Ideas.titulo', 'Ideas.descricao', 'Ideas.status']
        ];
        $ideasUsers = $this->paginate($this->Ideasusers);

        $this->set("title_for_layout", "Ideias"); //Titulo da Página
        $this->set(compact('ideasUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Ideas User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ideasUser = $this->Ideasusers->get($id, [
            'contain' => ['Ideas', 'Users'],
        ]);

        $this->set(compact('ideasUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ideasUser = $this->IdeasUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $ideasUser = $this->IdeasUsers->patchEntity($ideasUser, $this->request->getData());
            if ($this->IdeasUsers->save($ideasUser)) {
                $this->Flash->success(__('The ideas user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ideas user could not be saved. Please, try again.'));
        }
        $ideas = $this->IdeasUsers->Ideas->find('list', ['limit' => 200]);
        $users = $this->IdeasUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('ideasUser', 'ideas', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ideas User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ideasUser = $this->IdeasUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ideasUser = $this->IdeasUsers->patchEntity($ideasUser, $this->request->getData());
            if ($this->IdeasUsers->save($ideasUser)) {
                $this->Flash->success(__('The ideas user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ideas user could not be saved. Please, try again.'));
        }
        $ideas = $this->IdeasUsers->Ideas->find('list', ['limit' => 200]);
        $users = $this->IdeasUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('ideasUser', 'ideas', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ideas User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ideasUser = $this->IdeasUsers->get($id);
        if ($this->IdeasUsers->delete($ideasUser)) {
            $this->Flash->success(__('The ideas user has been deleted.'));
        } else {
            $this->Flash->error(__('The ideas user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
