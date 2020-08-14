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
            $valid_img = array('image/png','image/jpg','image/jpeg','image/bmp');
            $valid_doc = array('application/pdf');
            $valid_file = array_merge($valid_img,$valid_doc);
            $residencia = $this->request->getData('verification.residencia');
            $declaracao = $this->request->getData('verification.declaracao');
            $doc_frente = $this->request->getData('verification.identidade_frente');
            $doc_verso = $this->request->getData('verification.identidade_verso');
            $autorizacao = $this->request->getData('verification.autorizacao_pais');
            $userData = $this->request->getData();
            if (!empty($doc_frente->getClientFilename()) || !empty($doc_verso->getClientFilename()) || !empty($residencia->getClientFilename()) || !empty($declaracao->getClientFilename()) || !empty($autorizacao->getClientFilename())) {
                
                if (in_array($doc_frente->getClientMediaType(), $valid_img)) {
                    $extensao = pathinfo($doc_frente->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_doc_frente = WWW_ROOT . 'img/docs/'. $userLogged->id .'-doc_frente.'.$extensao;
                    $userData['verification']['identidade_frente'] = '/img/docs/' . $userLogged->id .'-doc_frente.'.$extensao;
                } else {
                    $userData['verification']['identidade_frente'] = null;
                }

                if (in_array($doc_verso->getClientMediaType(), $valid_img)) {
                    $extensao = pathinfo($doc_verso->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_doc_verso = WWW_ROOT . 'img/docs/'. $userLogged->id .'-doc_verso.'.$extensao;
                    $userData['verification']['identidade_verso'] = '/img/docs/' . $userLogged->id .'-doc_verso.'.$extensao;
                } else {
                    $userData['verification']['identidade_verso'] = null;
                }  
                
                if (in_array($residencia->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($residencia->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_residencia = WWW_ROOT . 'img/docs/'. $userLogged->id .'-residencia.'.$extensao;
                    $userData['verification']['residencia'] = '/img/docs/' . $userLogged->id .'-residencia.'.$extensao;
                } else {
                    $userData['verification']['residencia'] = null;
                } 
                
                if (in_array($declaracao->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($declaracao->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_declaracao = WWW_ROOT . 'img/docs/'. $userLogged->id .'-declaracao.'.$extensao;
                    $userData['verification']['declaracao'] = '/img/docs/' . $userLogged->id .'-declaracao.'.$extensao;
                } else {
                    $userData['verification']['declaracao'] = null;
                } 
                
                if (in_array($autorizacao->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($autorizacao->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_autorizacao = WWW_ROOT . 'img/docs/'. $userLogged->id .'-autorizacao.'.$extensao;
                    $userData['verification']['autorizacao_pais'] = '/img/docs/' . $userLogged->id .'-autorizacao.'.$extensao;
                } else {
                    $userData['verification']['autorizacao_pais'] = null;
                }               
            } else {
                $userData['verification']['autorizacao_pais'] = null;
                $userData['verification']['declaracao'] = null;
                $userData['verification']['residencia'] = null;
                $userData['verification']['identidade_verso'] = null;
                $userData['verification']['identidade_frente'] = null;
            }
            // debug($userData); exit;
            $userData['nome_completo'] = $userData['nome']." ".$userData['sobrenome'];
            $user = $this->Users->patchEntity($user, $userData);
            // debug($user); exit;
            if ($this->Users->save($user)) {
                if (isset($caminho_doc_frente)) { $doc_frente->moveTo($caminho_doc_frente); }
                if (isset($caminho_doc_verso)) { $doc_verso->moveTo($caminho_doc_verso); }
                if (isset($caminho_residencia)) { $residencia->moveTo($caminho_residencia); }
                if (isset($caminho_declaracao)) { $declaracao->moveTo($caminho_declaracao); }
                if (isset($caminho_autorizacao)) { $autorizacao->moveTo($caminho_autorizacao); }
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
            $fileObject = $this->request->getData("profile_image");
            $fileExtension = $fileObject->getClientMediaType();
            $ext = explode("/", $fileExtension);
            $filename = md5(uniqid((string)time())).'.'.$ext[1];
            $valid_extensions = array("image/png", "image/jpeg", "image/jpg", "image/gif");

            if (in_array($fileExtension, $valid_extensions)) {
                $destination = WWW_ROOT . "photos" . DS . $filename;
                $fileObject->moveTo($destination);
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $usuario = $this->request->getData(); 
                $usuario['nome_completo'] = $usuario['nome']." ".$usuario['sobrenome'];
                $usuario["foto"] = "photos" . "/" . $filename;
                $user = $this->Users->patchEntity($user, $usuario);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
    
                    return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
                }
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

    public function verificationDocuments($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Verifications'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $valid_img = array('image/png','image/jpg','image/jpeg','image/bmp');
            $valid_doc = array('application/pdf');
            $valid_file = array_merge($valid_img,$valid_doc);
            $residencia = $this->request->getData('verification.residencia');
            $declaracao = $this->request->getData('verification.declaracao');
            $doc_frente = $this->request->getData('verification.identidade_frente');
            $doc_verso = $this->request->getData('verification.identidade_verso');
            $autorizacao = $this->request->getData('verification.autorizacao_pais');
            $userData = $this->request->getData();
            // debug($this->request->getData()); exit;
            if (!empty($doc_frente->getClientFilename()) || !empty($doc_verso->getClientFilename()) || !empty($residencia->getClientFilename()) || !empty($declaracao->getClientFilename()) || !empty($autorizacao->getClientFilename())) {
                
                if (in_array($doc_frente->getClientMediaType(), $valid_img)) {
                    $extensao = pathinfo($doc_frente->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_doc_frente = WWW_ROOT . 'img/docs/'. $userLogged->id .'-doc_frente.'.$extensao;
                    $userData['verification']['identidade_frente'] = '/img/docs/' . $userLogged->id .'-doc_frente.'.$extensao;
                } else {
                    $userData['verification']['identidade_frente'] = null;
                }

                if (in_array($doc_verso->getClientMediaType(), $valid_img)) {
                    $extensao = pathinfo($doc_verso->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_doc_verso = WWW_ROOT . 'img/docs/'. $userLogged->id .'-doc_verso.'.$extensao;
                    $userData['verification']['identidade_verso'] = '/img/docs/' . $userLogged->id .'-doc_verso.'.$extensao;
                } else {
                    $userData['verification']['identidade_verso'] = null;
                }  
                
                if (in_array($residencia->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($residencia->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_residencia = WWW_ROOT . 'img/docs/'. $userLogged->id .'-residencia.'.$extensao;
                    $userData['verification']['residencia'] = '/img/docs/' . $userLogged->id .'-residencia.'.$extensao;
                } else {
                    $userData['verification']['residencia'] = null;
                } 
                
                if (in_array($declaracao->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($declaracao->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_declaracao = WWW_ROOT . 'img/docs/'. $userLogged->id .'-declaracao.'.$extensao;
                    $userData['verification']['declaracao'] = '/img/docs/' . $userLogged->id .'-declaracao.'.$extensao;
                } else {
                    $userData['verification']['declaracao'] = null;
                } 
                
                if (in_array($autorizacao->getClientMediaType(), $valid_file)) {
                    $extensao = pathinfo($autorizacao->getClientFilename(), PATHINFO_EXTENSION);
                    $caminho_autorizacao = WWW_ROOT . 'img/docs/'. $userLogged->id .'-autorizacao.'.$extensao;
                    $userData['verification']['autorizacao_pais'] = '/img/docs/' . $userLogged->id .'-autorizacao.'.$extensao;
                } else {
                    $userData['verification']['autorizacao_pais'] = null;
                }               
            } else {
                // $userData['verification']['autorizacao_pais'] = null;
                // $userData['verification']['declaracao'] = null;
                // $userData['verification']['residencia'] = null;
                // $userData['verification']['identidade_verso'] = null;
                // $userData['verification']['identidade_frente'] = null;
            }
            debug($userData); exit;
            $user = $this->Users->patchEntity($user, $userData);
            // debug($user); exit;
            if ($this->Users->save($user)) {
                if (isset($caminho_doc_frente)) { $doc_frente->moveTo($caminho_doc_frente); }
                if (isset($caminho_doc_verso)) { $doc_verso->moveTo($caminho_doc_verso); }
                if (isset($caminho_residencia)) { $residencia->moveTo($caminho_residencia); }
                if (isset($caminho_declaracao)) { $declaracao->moveTo($caminho_declaracao); }
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
