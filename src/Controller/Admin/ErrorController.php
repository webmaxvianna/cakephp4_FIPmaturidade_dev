<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\EventInterface;

class ErrorController extends AppController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadComponent('RequestHandler');
    }

    /**
     * beforeRender callback.
     *
     * @param \Cake\Event\EventInterface $event Event.
     * @return void
     */
    public function beforeRender(EventInterface $event)
    {
        $this->viewBuilder()->setlayout('adminlte_inova_login');
        $this->viewBuilder()->setTemplatePath('Error');

        // debug($event);exit;

        session_unset();
    }
}