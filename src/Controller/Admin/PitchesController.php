<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Pitches Controller
 *
 * @property \App\Model\Table\PitchesTable $Pitches
 * @method \App\Model\Entity\Pitch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PitchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Ideas'],
        ];
        $pitches = $this->paginate($this->Pitches);

        $this->set(compact('pitches'));
    }

    /**
     * View method
     *
     * @param string|null $id Pitch id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pitch = $this->Pitches->get($id, [
            'contain' => ['Categories', 'Ideas'],
        ]);

        $this->set(compact('pitch'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pitch = $this->Pitches->newEmptyEntity();
        if ($this->request->is('post')) {
            $pitch = $this->Pitches->patchEntity($pitch, $this->request->getData());
            if ($this->Pitches->save($pitch)) {
                $this->Flash->success(__('The pitch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pitch could not be saved. Please, try again.'));
        }
        $categories = $this->Pitches->Categories->find('list', ['limit' => 200]);
        $ideas = $this->Pitches->Ideas->find('list', ['limit' => 200]);
        $this->set(compact('pitch', 'categories', 'ideas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pitch id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pitch = $this->Pitches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pitch = $this->Pitches->patchEntity($pitch, $this->request->getData());
            if ($this->Pitches->save($pitch)) {
                $this->Flash->success(__('The pitch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pitch could not be saved. Please, try again.'));
        }
        $categories = $this->Pitches->Categories->find('list', ['limit' => 200]);
        $ideas = $this->Pitches->Ideas->find('list', ['limit' => 200]);
        $this->set(compact('pitch', 'categories', 'ideas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pitch id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pitch = $this->Pitches->get($id);
        if ($this->Pitches->delete($pitch)) {
            $this->Flash->success(__('The pitch has been deleted.'));
        } else {
            $this->Flash->error(__('The pitch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
