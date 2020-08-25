<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Mailer\MailerAwareTrait;

class UsersController extends AppController
{
    use MailerAwareTrait;

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
            $usuario['nome_completo'] = $usuario['nome']." ".$usuario['sobrenome'];
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
                $this->Flash->error(__('Nome de usuário ou senha está incorreto'));
            }
        }
        $this->set("title_for_layout", "Tela de Acesso"); //Titulo da Página
    }

    public function logout()
    {
        $this->Flash->success('Você foi desconectado do sistema.');
        return $this->redirect($this->Auth->logout());
    }
    // LOGIN E LOGOUT


    // CADASTRAR NOVO CANDIDATO E RECUPERAR ACESSO
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
                $this->Flash->success(__('O candidato foi cadastrado.'));
                $this->getMailer('Users')->send('newApplicant', [$user]); // Envio de email para Novo candidato
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            $this->Flash->error(__('O candidato não foi cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Novo Candidato"); //Titulo da Página
    }

    public function sendConfirmationEmail($id = null)
    {
        $user = $this->Users->get($id)->toArray();
        $this->getMailer('Users')->send('sendConfirmationEmail', [$user]); // Envio de email para confirmação de endereço de email
        $this->Flash->success(__('Enviamos um link para confirmação de email.'));
        return $this->redirect($this->referer());
    }

    public function confirmEmail()
    {   
        debug($this->request->getQuery());exit;
        $q_email = $this->request->getQuery('email');
        $q_username = $this->request->getQuery('user');
        $user = $this->Users->findByEmail($q_email)->toList();
        $user = $user[0];
        // debug($user);exit;
        if (($user->username == $q_username) && ($user->email == $q_email)) {
            $userData = $this->Users->get($user->id); 
            $userData['confirmacao_email'] = 1;
            // debug($userData);exit;
            if ($this->Users->save($userData)) {
                $this->Flash->success(__('Email confirmado.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Email não foi confirmado. Por favor, tente novamente.'));
        }
    }

    public function recoveryPassword()
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $keyword = $this->request->getData('keyword');
            $user = $this->Users->findByEmailOrUsername($keyword, $keyword)->toArray();
            // debug($user);exit;
            if (empty($user)) {
                $this->Flash->error(__('Os dados informados não foram encontrados. Por favor, tente novamente.'));
                return $this->redirect(['controller' => 'users', 'action' => 'recoveryPassword']);
            } else {
                $this->getMailer('Users')->send('recoveryPassword', [$user]); // Envio de email para recuperação de senha
                $this->Flash->success(__('Enviamos um link para alteração de senha em sua conta de email.'));
                return $this->redirect(['controller' => 'users', 'action' => 'recoveryPassword']);
            }
        }
        $this->set("title_for_layout", "Recuperar senha"); //Titulo da Página
    }

    public function resetPassword()
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');

        // debug($this->request->getQuery());exit;
        $q_email = $this->request->getQuery('email');
        $q_token = $this->request->getQuery('token');
        if ($this->request->is(['post', 'put'])) {
            // debug($this->request->getData());exit; 
            $id = $this->request->getData('id');
            if ($this->request->getData('password') == '') {
                $this->Flash->error(__('Senha não alterada.'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            $user = $this->Users->get($id);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // debug($user);exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha alterada!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Senha não foi alterada. Por favor, Tente novamente.'));
        } else {
            $user = $this->Users->findByEmail($q_email)->toArray();
            if(isset($user)){
                $hash = substr($user[0]['password'], 0, 30);
                if ($hash != $q_token) {
                    $this->Flash->error(__('Você não tem permissão para alterar essa senha.'));
                    return $this->redirect(['controller' => 'users', 'action' => 'login']);
                }
            } else {
                $this->Flash->error(__('Email não encontrado.'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        }
        $this->set(compact('user'));
        $this->set('id', $user[0]['id']);
        $this->set('username', $user[0]['username']);
        $this->set("title_for_layout", "Redefinir senha"); //Titulo da Página
    }
    // CADASTRAR NOVO CANDIDATO E RECUPERAR SENHA


    // ALTERAR PERFIL, SENHA, EMAIL E FOTO DO USUARIO
    public function changePassword($id = null)
    {
        $user = $this->Users->get($id);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('A senha foi alterada.'));
                return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('A senha não foi alterada. Por favor, tente novamente.'));
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
                $this->Flash->success(__('O email foi alterado.'));
                return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('O email não foi alterado. Por favor, tente novamente.'));
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
            $usuario['nome_completo'] = $usuario['nome']." ".$usuario['sobrenome'];
            $user = $this->Users->patchEntity($user, $usuario);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Os dados do(a) candidato(a) foram alterados.'));

                return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
            }
            $this->Flash->error(__('Os dados do(a) candidato(a) não foram alterados. Por favor, tente novamente'));
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
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fileObject = $this->request->getData("profile_image");
            $fileExtension = $fileObject->getClientMediaType();
            $ext = explode("/", $fileExtension);
            $filename = $user->id.'.'.$ext[1];
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "image/gif");

            if (in_array($fileExtension, $valid_extensions)) {
                $destination = WWW_ROOT . "img" . DS . "usuarios" . DS . $filename;
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $usuario["foto"] = '/img/usuarios/' . $filename;
                $user = $this->Users->patchEntity($user, $usuario);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('A foto foi alterada.'));
                    $fileObject->moveTo($destination);
                    return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
                }
            }
            $this->Flash->error(__('Não foi possível alterar a foto.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Alterar Foto"); //Titulo da Página
    }
    // ALTERAR PERFIL, SENHA, EMAIL E FOTO DO USUARIO


    // ADICIONAR E EXCLIUR COMPROVANTES DE DOCUMENTOS
    public function changeParentalPermission($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->autorizacao_pais)) {
                $imagedb = WWW_ROOT . $user->verification->autorizacao_pais;
            }
            $file = $this->request->getData('verification.autorizacao_pais');
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['autorizacao_pais'] = '/docs/' . $user->id . '-' . $user->username . '-autorizacao_pais.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }                
                $this->Flash->success(__('A "Autorização dos Pais ou Responsável" foi salva.'));
                $path = WWW_ROOT . 'docs' . DS . $user->id . '-' . $user->username . '-autorizacao_pais.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('A "Autorização dos Pais ou Responsável" não foi salva. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function changeProofOfResidence($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->residencia)) {
                $imagedb = WWW_ROOT . $user->verification->residencia;
            }
            $file = $this->request->getData('verification.residencia');
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['residencia'] = '/docs/' . $user->id . '-' . $user->username . '-residencia.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }                
                $this->Flash->success(__('O "Comprovante de Residência" foi salvo.'));
                $path = WWW_ROOT . 'docs' . DS . $user->id . '-' . $user->username . '-residencia.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('O "Comprovante de Residência" não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function changeIdentityCardFront($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->identidade_frente)) {
                $imagedb = WWW_ROOT . $user->verification->identidade_frente;
            }
            $file = $this->request->getData('verification.identidade_frente');
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['identidade_frente'] = '/docs/' . $user->id . '-' . $user->username . '-identidade_frente.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }                
                $this->Flash->success(__('A frente do "Comprovante de Identidade" foi salva.'));
                $path = WWW_ROOT . 'docs' . DS . $user->id . '-' . $user->username . '-identidade_frente.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('A frente do "Comprovante de Identidade" não foi salva. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function changeIdentityCardBack($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->identidade_verso)) {
                $imagedb = WWW_ROOT . $user->verification->identidade_verso;
            }
            $file = $this->request->getData('verification.identidade_verso');
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['identidade_verso'] = '/docs/' . $user->id . '-' . $user->username . '-identidade_verso.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }  
                $this->Flash->success(__('O verso do "Comprovante de Identidade" foi salvo.'));
                $path = WWW_ROOT . 'docs' . DS . $user->id . '-' . $user->username . '-identidade_verso.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('O verso do "Comprovante de Identidade" não foi salvo. Por favor, tente novamente'));
        }
        $this->set(compact('user'));
    }
    // ADICIONAR E EXCLIUR COMPROVANTES DE DOCUMENTOS
    
}
