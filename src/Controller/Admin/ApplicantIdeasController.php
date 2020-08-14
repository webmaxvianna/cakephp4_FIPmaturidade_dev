<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class ApplicantIdeasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $id = $_SESSION['Auth']['User']['id'];
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'MyEdicts', 'Edicts', 'MyIdeas', 'Ideas', 'Characteristics', 'Interests', 'Specialties', 'Tasks', 'Resumes', 'Verifications'],
        ]);

        $this->set(compact('user'));
        $ideias = $this->Users->MyIdeas->find('list', ['limit' => 200]);

        $this->set(compact('user', 'ideias'));
        $this->set("title_for_layout", "Ideias"); //Titulo da Página
    }
}
