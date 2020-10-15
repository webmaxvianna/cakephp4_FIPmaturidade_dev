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
        if($this->Auth->user('role_id') != 1) {
            return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->paginate = [
            'contain' => ['Roles'],
            'limit' => 5,
            'order' => ['Users.id' => 'asc']
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set("title_for_layout", "Usuários"); //Titulo da Página
    }

    public function view($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'MyEdicts', 'Edicts', 'MyIdeas', 'Ideas', 'Characteristics', 'Interests', 'Specialties', 'Tasks', 'Resumes', 'Verifications'],
        ]);
        $this->set(compact('user'));
        $this->set("title_for_layout", "Visualizar usuário"); //Titulo da Página
    }

    public function add()
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome'] = ucwords(strtolower($usuario['nome']));
            $usuario['sobrenome'] = ucwords(strtolower($usuario['sobrenome']));
            $usuario['nome_completo'] = $usuario['nome'] . " " . $usuario['sobrenome'];
            $usuario['email'] = strtolower($usuario['email']);           
            $usuario['password'] = '123456';
            $this->loadModel('Roles');
            $role = $this->Roles->findById($usuario['role_id'])->first();
            $user = $this->Users->patchEntity($user, $usuario);
            if ($this->Users->save($user)) {
                $this->getMailer('Users')->send('newUser', [$user, $role]); // Envio de email para Novo candidato
                $this->Flash->success(__('O usuário foi cadastrado. Um email foi enviado para "'.$user->email.'"'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não foi cadastrado. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $edicts = $this->Users->Edicts->find('list', ['limit' => 200]);
        $ideas = $this->Users->Ideas->find('list', ['limit' => 200]);
        $characteristics = $this->Users->Characteristics->find('list', ['limit' => 200]);
        $interests = $this->Users->Interests->find('list', ['limit' => 200]);
        $specialties = $this->Users->Specialties->find('list', ['limit' => 200]);
        $tasks = $this->Users->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'edicts', 'ideas', 'characteristics', 'interests', 'specialties', 'tasks'));
        $this->set("title_for_layout", "Adicionar usuário"); //Titulo da Página
    }

    public function edit($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Edicts', 'Ideas', 'Characteristics', 'Interests', 'Resumes', 'Roles', 'Specialties', 'Tasks', 'Verifications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome_completo'] = ucwords(strtolower($usuario['nome'])) . " " . ucwords(strtolower($usuario['sobrenome']));
            $usuario['email'] = strtolower($usuario['email']);
            $user = $this->Users->patchEntity($user, $usuario);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi alterado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não foi alterado. por favor, tente novamente.'));
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
        $this->set("title_for_layout", "Editar usuário"); //Titulo da Página
    }

    public function delete($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        // Verificar se existem arquivos de imagem ou PDF
        if (isset($user->foto)) { $foto = WWW_ROOT . $user->foto; }
        if (isset($user->verification->autorizacao_pais)) { 
            $autorizacao_pais = WWW_ROOT . $user->verification->autorizacao_pais; }
        if (isset($user->verification->residencia)) { 
            $residencia = WWW_ROOT . $user->verification->residencia; }
        if (isset($user->verification->identidade_frente)) { 
            $identidade_frente = WWW_ROOT . $user->verification->identidade_frente; }
        if (isset($user->verification->identidade_verso)) { 
            $identidade_verso = WWW_ROOT . $user->verification->identidade_verso; }

        if ($this->Users->delete($user)) {
            // Caso existam, excluir arquivos de imagem ou PDF
            if (isset($foto)) { unlink($foto); } 
            if (isset($autorizacao_pais)) { unlink($autorizacao_pais); } 
            if (isset($residencia)) { unlink($residencia); } 
            if (isset($identidade_frente)) { unlink($identidade_frente); } 
            if (isset($identidade_verso)) { unlink($identidade_verso); }
             
            $this->Flash->success(__('O usuário foi excluído.'));
        } else {
            $this->Flash->error(__('O usuário não foi excluído. Por favor, tente novamente.'));
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
                $this->Flash->error_sm(__('Nome de usuário ou senha está incorreto'));
            }
        }
        $this->set("title_for_layout", "Tela de Acesso"); //Titulo da Página
    }

    public function logout()
    {
        $this->Flash->success_sm('Você foi desconectado do sistema.');
        return $this->redirect($this->Auth->logout());
    }
    // LOGIN E LOGOUT


    // CADASTRAR NOVO CANDIDATO E RECUPERAR ACESSO
    public function registerApplicant()
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            if (isset($_POST['g-recaptcha-response'])) {
                $captcha_data = $_POST['g-recaptcha-response'];
            }
            
            // Se nenhum valor foi recebido, o usuário não realizou o captcha
            if (!$captcha_data) {
                $this->Flash->error_sm(__('Por favor, confirme o captcha.'));
            }
            else {
                $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
            }
            if ($resposta != null && $resposta.success) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $usuario = $this->request->getData();
                $usuario['nome_completo'] = ucwords(strtolower($usuario['nome'])) . " " . ucwords(strtolower($usuario['sobrenome']));
                $usuario['email'] = strtolower($usuario['email']);
                $user = $this->Users->patchEntity($user, $usuario);
                $user['role_id'] = '3'; // ID do Candidato
                if ($this->Users->save($user)) {
                    $this->Flash->success_sm(__('O candidato foi cadastrado.'));
                    $this->getMailer('Users')->send('newApplicant', [$user]); // Envio de email para Novo candidato
                    return $this->redirect(['controller' => 'users', 'action' => 'login']);
                }
                $this->Flash->error_sm(__('O candidato não foi cadastrado. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Novo Candidato"); //Titulo da Página
    }

    public function sendConfirmationEmail($id = null)
    {
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
        }
        $user = $this->Users->get($id)->toArray();
        $this->getMailer('Users')->send('sendConfirmationEmail', [$user]); // Envio de email para confirmação de endereço de email
        $this->Flash->success(__('Enviamos, para "' . $user['email'] . '", um link para confirmação de email.'));
        return $this->redirect($this->referer());
    }

    public function confirmEmail()
    {   
        // debug($this->request->getQuery());exit;
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
                $this->Flash->error_sm(__('Os dados informados não foram encontrados. Por favor, tente novamente.'));
                return $this->redirect(['controller' => 'users', 'action' => 'recoveryPassword']);
            } else {
                $this->getMailer('Users')->send('recoveryPassword', [$user]); // Envio de email para recuperação de senha
                $this->Flash->success_sm(__('Enviamos um link para alteração de senha em sua conta de email.'));
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
                $this->Flash->error_sm(__('Senha não alterada.'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            $user = $this->Users->get($id);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                $this->Flash->success_sm(__('Senha alterada!'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
            $this->Flash->error_sm(__('Senha não foi alterada. Por favor, Tente novamente.'));
            return $this->redirect($this->referer());
        } else {
            $user = $this->Users->findByEmail($q_email)->toArray();
            if(isset($user)){
                $hash = substr($user[0]['password'], 0, 30);
                if ($hash != $q_token) {
                    $this->Flash->error_sm(__('Você não tem permissão para alterar essa senha.'));
                    return $this->redirect(['controller' => 'users', 'action' => 'login']);
                }
            } else {
                $this->Flash->error_sm(__('Email não encontrado.'));
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
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changePassword', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            unset($user['role_id']);
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
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changeEmail', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id);        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userData = $this->request->getData();
            $userData['email'] = strtolower($userData['email']);
            $userData['confirmacao_email'] = 0;
            $user = $this->Users->patchEntity($user, $userData); 
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                $this->getMailer('Users')->send('sendConfirmationEmail', [$user]); // Envio de email para confirmação de endereço de email
                $this->Flash->success(__('O email foi alterado.'));
                return $this->redirect(['controller' => 'users', 'action' => 'changeEmail', $this->Auth->user('id')]);
            }
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Alterar Email"); //Titulo da Página
    }

    public function editProfile($id = null)
    {
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'editProfile', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id, [
            'contain' => ['Characteristics', 'Interests', 'Resumes', 'Specialties', 'Verifications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $usuario = $this->request->getData();
            $usuario['nome_completo'] = ucwords(strtolower($usuario['nome'])) . " " . ucwords(strtolower($usuario['sobrenome']));
            $user = $this->Users->patchEntity($user, $usuario);
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Os dados do(a) candidato(a) foram alterados.'));
                return $this->redirect(['controller' => 'users', 'action' => 'editProfile', $this->Auth->user('id')]);
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
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changeImageProfile', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->foto)) {
                $imagedb = WWW_ROOT . $user->foto;
            }
            $userData = $this->request->getData();
            $fileObject = $this->request->getData("foto");
            $imgSize = getimagesize($fileObject->getStream()->getMetadata('uri'));
            if ($imgSize[0] != $imgSize[1]) {
                $this->Flash->warning(__('A foto precisa ter os mesmos tamanhos de altura e largura.'));
                return $this->redirect($this->referer());
            }
            if ($fileObject->getSize() > (1024*1024)) {
                $img_size = intdiv($fileObject->getSize(), 1024);
                $this->Flash->warning(__("Sua foto tem $img_size KB. A foto deverá ser menor que 1024 KB."));
                return $this->redirect($this->referer());
            }
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg");
            if (in_array($fileObject->getClientMediaType(), $valid_extensions)) {
                $ext = pathinfo($fileObject->getClientFilename(), PATHINFO_EXTENSION);
                $destination = WWW_ROOT . "img" . DS . "usuarios" . DS . $user->id . '.' . $ext;
                $userData["foto"] = '/img/usuarios/' . $user->id . '.' . $ext;
                $user = $this->Users->patchEntity($user, $userData);
                unset($user['role_id']);
                if ($this->Users->save($user)) {
                    if (isset($imagedb)) { unlink($imagedb); } 
                    $this->Flash->success(__('A foto foi alterada.'));
                    $fileObject->moveTo($destination);
                    return $this->redirect(['controller' => 'users', 'action' => 'changeImageProfile',$user->id]);
                }
            }
            $this->Flash->error(__('Não foi possível alterar a foto.'));
        }
        $this->set(compact('user'));
        $this->set("title_for_layout", "Alterar Foto"); //Titulo da Página
    }

    // ADICIONAR E EXCLIUR COMPROVANTES DE DOCUMENTOS
    public function changeParentalPermission($id = null)
    {
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changeParentalPermission', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->autorizacao_pais)) {
                $imagedb = WWW_ROOT . $user->verification->autorizacao_pais;
            }
            $file = $this->request->getData('verification.autorizacao_pais');
            if ($file->getSize() > (1024 * 1024 * 10)) {                
                $this->Flash->warning(__('Apenas arquivos menores que 10 MB são permitdos.'));
                return $this->redirect(['action' => 'changeParentalPermission', $id]);
            }
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "application/pdf");
            if (!in_array($file->getClientMediaType(), $valid_extensions)) {
                $this->Flash->warning(__('Apenas arquivos PDF, JPG ou PNG são permitdos.'));
                return $this->redirect(['action' => 'changeParentalPermission', $id]);
            }
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['autorizacao_pais'] = '/docs/comprovantes/' . $user->id . '-' . $user->username . '-autorizacao_pais.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }                
                $this->Flash->success(__('A "Autorização dos Pais ou Responsável" foi salva.'));
                $path = WWW_ROOT . 'docs' . DS . 'comprovantes' . DS . $user->id . '-' . $user->username . '-autorizacao_pais.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('A "Autorização dos Pais ou Responsável" não foi salva. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function changeProofOfResidence($id = null)
    {
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changeProofOfResidence', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->residencia)) {
                $imagedb = WWW_ROOT . $user->verification->residencia;
            }
            $file = $this->request->getData('verification.residencia');
            if ($file->getSize() > (1024 * 1024 * 10)) {                
                $this->Flash->warning(__('Apenas arquivos menores que 10 MB são permitdos.'));
                return $this->redirect(['action' => 'changeProofOfResidence', $id]);
            }
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "application/pdf");
            if (!in_array($file->getClientMediaType(), $valid_extensions)) {
                $this->Flash->warning(__('Apenas arquivos PDF, JPG ou PNG são permitdos.'));
                return $this->redirect(['action' => 'changeProofOfResidence', $id]);
            }
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['residencia'] = '/docs/comprovantes/' . $user->id . '-' . $user->username . '-residencia.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }                
                $this->Flash->success(__('O "Comprovante de Residência" foi salvo.'));
                $path = WWW_ROOT . 'docs' . DS . 'comprovantes' . DS . $user->id . '-' . $user->username . '-residencia.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('O "Comprovante de Residência" não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function changeIdentityCardFront($id = null)
    {
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changeIdentityCardFront', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->identidade_frente)) {
                $imagedb = WWW_ROOT . $user->verification->identidade_frente;
            }
            $file = $this->request->getData('verification.identidade_frente');
            if ($file->getSize() > (1024 * 1024 * 10)) {                
                $this->Flash->warning(__('Apenas arquivos menores que 10 MB são permitdos.'));
                return $this->redirect(['action' => 'changeIdentityCardFront', $id]);
            }
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "application/pdf");
            if (!in_array($file->getClientMediaType(), $valid_extensions)) {
                $this->Flash->warning(__('Apenas arquivos PDF, JPG ou PNG são permitdos.'));
                return $this->redirect(['action' => 'changeIdentityCardFront', $id]);
            }
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['identidade_frente'] = '/docs/comprovantes/' . $user->id . '-' . $user->username . '-identidade_frente.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }                
                $this->Flash->success(__('A frente do "Comprovante de Identidade" foi salva.'));
                $path = WWW_ROOT . 'docs' . DS . 'comprovantes' . DS . $user->id . '-' . $user->username . '-identidade_frente.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('A frente do "Comprovante de Identidade" não foi salva. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
    }

    public function changeIdentityCardBack($id = null)
    {
        if ($id != $this->Auth->user('id')) {
            $this->Flash->error(__('Você não tem permissão para alterar o ID: "'.$id.'"'));
            return $this->redirect(['controller' => 'users', 'action' => 'changeIdentityCardBack', $this->Auth->user('id')]);
        }

        $user = $this->Users->get($id, ['contain' => ['Verifications']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($user->verification->identidade_verso)) {
                $imagedb = WWW_ROOT . $user->verification->identidade_verso;
            }
            $file = $this->request->getData('verification.identidade_verso');
            if ($file->getSize() > (1024 * 1024 * 10)) {                
                $this->Flash->warning(__('Apenas arquivos menores que 10 MB são permitdos.'));
                return $this->redirect(['action' => 'changeIdentityCardBack', $id]);
            }
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "application/pdf");
            if (!in_array($file->getClientMediaType(), $valid_extensions)) {
                $this->Flash->warning(__('Apenas arquivos PDF, JPG ou PNG são permitdos.'));
                return $this->redirect(['action' => 'changeIdentityCardBack', $id]);
            }
            $userData = $this->request->getData();
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $userData['verification']['identidade_verso'] = '/docs/comprovantes/' . $user->id . '-' . $user->username . '-identidade_verso.' . $ext;
            $user = $this->Users->patchEntity($user, $userData);
            unset($user['role_id']);
            if ($this->Users->save($user)) {
                if (isset($imagedb)) { unlink($imagedb); }  
                $this->Flash->success(__('O verso do "Comprovante de Identidade" foi salvo.'));
                $path = WWW_ROOT . 'docs' . DS . 'comprovantes' . DS . $user->id . '-' . $user->username . '-identidade_verso.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'editProfile', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('O verso do "Comprovante de Identidade" não foi salvo. Por favor, tente novamente'));
        }
        $this->set(compact('user'));
    }
    // ADICIONAR E EXCLIUR COMPROVANTES DE DOCUMENTOS
    
}
