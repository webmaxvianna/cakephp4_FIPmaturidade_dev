<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
            'limit' => 5,
            'order' => ['Users.id' => 'asc']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'MyEdicts', 'Edicts', 'MyIdeas', 'Ideas', 'Characteristics', 'Interests', 'Specialties', 'Tasks', 'Resumes', 'Verifications'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $userData['nome_completo'] = $userData['nome']." ".$userData['sobrenome'];
            $user = $this->Users->patchEntity($user, $userData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $edicts = $this->Users->Edicts->find('list', ['limit' => 200]);
        $ideas = $this->Users->Ideas->find('list', ['limit' => 200]);
        $characteristics = $this->Users->Characteristics->find('list', ['limit' => 200]);
        $interests = $this->Users->Interests->find('list', ['limit' => 200]);
        $specialties = $this->Users->Specialties->find('list', ['limit' => 200]);
        $tasks = $this->Users->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'edicts', 'ideas', 'characteristics', 'interests', 'specialties', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Edicts', 'Ideas', 'Characteristics', 'Interests', 'Resumes', 'Specialties', 'Tasks', 'Verifications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData(); 
            $usuario['nome_completo'] = $usuario['nome']." ".$usuario['sobrenome'];
            $user = $this->Users->patchEntity($user, $usuario);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $characteristics = $this->Users->Characteristics->find('list', ['limit' => 200]);
        $interests = $this->Users->Interests->find('list', ['limit' => 200]);
        $resumes = $this->Users->Resumes->find('list', ['limit' => 200]);
        $specialties = $this->Users->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'characteristics', 'interests', 'resumes', 'specialties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
        $this->set("title_for_layout", "Tela de Acesso"); //Titulo da Página
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function registerApplicant()
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData(); 
            $usuario['nome_completo'] = $usuario['nome']." ".$usuario['sobrenome'];
            $usuario['role_id'] = '3';
            $user = $this->Users->patchEntity($user, $usuario);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Novo Candidato"); //Titulo da Página
    }

    public function changePassword($id = null)
    {
        $user = $this->Users->get($id);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The password has been changed.'));
                return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('The password could not be changed. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Alterar Senha"); //Titulo da Página
    }

    public function changeEmail($id = null)
    {
        $user = $this->Users->get($id);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData()); 
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The e-mail address has been changed.'));
                return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('The e-mail address could not be changed. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Alterar Email"); //Titulo da Página
    }

    public function editProfile($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Edicts', 'Ideas', 'Characteristics', 'Interests', 'Resumes', 'Specialties', 'Tasks', 'Verifications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData(); 
            $usuario['nome_completo'] = $usuario['nome']." ".$usuario['sobrenome'];
            $user = $this->Users->patchEntity($user, $usuario);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $characteristics = $this->Users->Characteristics->find('list', ['limit' => 200]);
        $interests = $this->Users->Interests->find('list', ['limit' => 200]);
        $resumes = $this->Users->Resumes->find('list', ['limit' => 200]);
        $specialties = $this->Users->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'characteristics', 'interests', 'resumes', 'specialties'));
        $this->set("title_for_layout", "Editar Perfil"); //Titulo da Página
    }

    public function addParentalPermission($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $valid_file = array('application/pdf','image/png','image/jpg','image/jpeg','image/bmp');
            $autorizacao = $this->request->getData('verification.autorizacao_pais');
            $userData = $this->request->getData();
            if (!empty($autorizacao->getClientFilename())) {
                if (in_array($autorizacao->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($autorizacao->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_autorizacao = WWW_ROOT . 'img/docs/'. $user->username .'-autorizacao.'.$extensao;
                    $userData['verification']['autorizacao_pais'] = '/img/docs/' . $user->username .'-autorizacao.'.$extensao;
                } else {
                    $this->Flash->error(__('The file has been saved.'));
                    return $this->redirect(['action' => 'addParentalPermission', $userLogged->id]);
                }               
            }
            // debug($userData); exit;
            $user = $this->Users->patchEntity($user, $userData);
            // debug($user); exit;
            if ($this->Users->save($user)) {
                if (isset($caminho_autorizacao)) { $autorizacao->moveTo($caminho_autorizacao); }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'edit_profile', $userLogged->id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Comprovantes de Documentos");
    }

}
