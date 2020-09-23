<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Edicts Controller
 *
 * @property \App\Model\Table\EdictsTable $Edicts
 * @method \App\Model\Entity\Edict[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EdictsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $edicts = $this->paginate($this->Edicts);
        $this->set(compact('edicts'));
        $this->set("title_for_layout", "Editais"); //Titulo da Página
    }

    /**
     * View method
     *
     * @param string|null $id Edict id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $edict = $this->Edicts->get($id, [
            'contain' => ['Owners', 'Users', 'Categories', 'Parameters', 'Tasks', 'Ideas'],
        ]);
        $this->set(compact('edict'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }

        $edict = $this->Edicts->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $edictData = $this->request->getData();
            $file = $this->request->getData('link');
            $valid_extensions = array("application/pdf");

            if ($file->getSize() > (1024 * 1024 * 10)) {                
                $this->Flash->warning(__('Apenas arquivos menores que 10 MB são permitdos.'));
                return $this->redirect(['action' => 'add']);
            }
            if (!in_array($file->getClientMediaType(), $valid_extensions)) {                
                $this->Flash->warning(__('Apenas arquivos em formato PDF são permitidos.'));
                return $this->redirect(['action' => 'add']);
            }
            
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $edictData['link'] =  '/docs/editais/' . $edictData['numero'] .  '-Edital-FundacaoInovaPrudente.' . $ext;
            $edictData['user_id'] =  $this->Auth->user('id');
            $edict = $this->Edicts->patchEntity($edict, $edictData);
            if ($this->Edicts->save($edict)) {               
                $this->Flash->success(__('O Edital nº '.$edict->numero.' foi salvo.'));
                $path = WWW_ROOT . 'docs/editais' . DS . $edict->numero . '-Edital-FundacaoInovaPrudente.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O edital não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('edict'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Edict id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $edict = $this->Edicts->get($id, [
            'contain' => ['Owners', 'Users', 'Categories', 'Parameters', 'Tasks'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $edictData = $this->request->getData();
            $edict = $this->Edicts->patchEntity($edict, $edictData);
            if ($this->Edicts->save($edict)) {
                $this->Flash->success(__('O Edital nº '.$edict->numero.' foi alterado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Edital não foi alterado. Por favor tente novamente'));
        }
        $this->set(compact('edict'));
    }

    public function editFile($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $edict = $this->Edicts->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $edictData = $this->request->getData();
            if (isset($edict->link)) {
                $edital = WWW_ROOT . $edict->link;
            }
            $file = $this->request->getData('link');
            $valid_extensions = array("application/pdf");

            if ($file->getSize() > (1024 * 1024 * 10)) {                
                $this->Flash->warning(__('Apenas arquivos menores que 10 MB são permitdos.'));
                return $this->redirect(['action' => 'editFile',$id]);
            }
            if (!in_array($file->getClientMediaType(), $valid_extensions)) {                
                $this->Flash->warning(__('Apenas arquivos em formato PDF são permitidos.'));
                return $this->redirect(['action' => 'editFile',$id]);
            }
            
            $ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
            $edictData['link'] =  '/docs/editais/' . $edict->numero .  '-Edital-FundacaoInovaPrudente.' . $ext;
            $edict = $this->Edicts->patchEntity($edict, $edictData);
            // debug($edital);exit;
            if ($this->Edicts->save($edict)) {
                if (isset($edital)) { unlink($edital); } 
                $this->Flash->success(__('O Edital nº '.$edict->numero.' foi alterado.'));
                $path = WWW_ROOT . 'docs/editais' . DS . $edict->numero . '-Edital-FundacaoInovaPrudente.' . $ext;
                $file->moveTo($path);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Edital não foi alterado. Por favor tente novamente'));
        }
        $this->set(compact('edict'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Edict id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('role_id') != 1) {
            $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $edict = $this->Edicts->get($id);
        if (isset($edict->link)) {$edital = WWW_ROOT . $edict->link;}          
        if ($this->Edicts->delete($edict)) {
            if (isset($edital)) {unlink($edital);}
            $this->Flash->success(__('O edital foi excluído.'));
        } else {
            $this->Flash->error(__('O edital não foi excluído. por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function listEdicts()
    {
        $this->paginate = ['limit' => 5, 'order' => ['Edicts.numero' => 'asc']];
        $edicts = $this->paginate($this->Edicts);        
        $this->set(compact('edicts'));
        $this->set("title_for_layout", "Editais"); //Titulo da Página
    }
}
