<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class UsersController extends AppController
{
    // CRUD PADRAO DO CAKEPHP
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

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'MyEdicts', 'Edicts', 'MyIdeas', 'Ideas', 'Characteristics', 'Interests', 'Specialties', 'Tasks', 'Resumes', 'Verifications'],
        ]);

        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome_completo'] = $usuario['nome'] . " " . $usuario['sobrenome'];
            $user = $this->Users->patchEntity($user, $usuario);
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

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Edicts', 'Ideas', 'Characteristics', 'Interests', 'Resumes', 'Specialties', 'Tasks'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome_completo'] = $usuario['nome'] . " " . $usuario['sobrenome'];
            $user = $this->Users->patchEntity($user, $usuario);
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
        $resumes = $this->Users->Resumes->find('list', ['limit' => 200]);
        $specialties = $this->Users->Specialties->find('list', ['limit' => 200]);
        $tasks = $this->Users->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'edicts', 'ideas', 'characteristics', 'interests', 'resumes', 'specialties', 'tasks'));
    }

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
    // CRUD PADRAO DO CAKEPHP

    // LOGIN E LOGOUT
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
    // LOGIN E LOGOUT


    // CADASTRAR NOVO CANDIDATO
    public function registerApplicant()
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome_completo'] = $usuario['nome'] . " " . $usuario['sobrenome'];
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
    // CADASTRAR NOVO CANDIDATO


    // ALTERAR PERFIL, SENHA, EMAIL E FOTO DO USUARIO
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
            'contain' => ['Characteristics', 'Interests', 'Resumes', 'Specialties', 'Verifications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome_completo'] = $usuario['nome'] . " " . $usuario['sobrenome'];
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

    public function changeImageProfile($id = null)
    {
        $this->set("title_for_layout", "Alterar Foto"); //Titulo da Página
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fileObject = $this->request->getData("profile_image");
            $fileExtension = $fileObject->getClientMediaType();
            $ext = explode("/", $fileExtension);
            $filename = $user->id . '.' . $ext[1];
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "image/gif");

            if (in_array($fileExtension, $valid_extensions)) {
                $destination = WWW_ROOT . "img" . DS . "usuarios" . DS . $filename;
                $fileObject->moveTo($destination);
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $usuario["foto"] = '/img/usuarios/' . $filename;
                $user = $this->Users->patchEntity($user, $usuario);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('A foto foi alterada.'));
                    return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
                }
            }
            $this->Flash->error(__('Não foi possível alterar a foto.'));
        }
        $this->set(compact('user'));
    }

    // PÁGINA SOBRE IDEIAS DO CANDIDATO
    public function applicantIdeas($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['MyEdicts', 'Edicts', 'MyIdeas'],
        ]);

        $this->set(compact('user'));
    }


}
