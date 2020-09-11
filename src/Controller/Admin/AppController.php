<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Controller;

define('EDITAL_ATUAL', 1);  //CONSTANTE DO EDITAL ATUAL

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authError'    => false,
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username', 
                        'password' => 'password'
                        ]
                    ]
                ],
                'loginRedirect' => [
                    'controller' => 'Dashboards',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ]
            ]);

        $this->Auth->allow([
            'registerApplicant', 
            'recoveryPassword',
            'resetPassword',
            'confirmEmail'
            ]);

        $loggedId = $this->Auth->user('id');        
        if (isset($loggedId)) {
            $this->loadModel('Users');
            $this->set('userLogged', $this->Users->get($loggedId, [
                'contain' => ['Roles'],
            ]));
        } else {
            $this->Auth->logout();
        }        
        
        $this->viewBuilder()->setlayout('adminlte_inova');
    }
}