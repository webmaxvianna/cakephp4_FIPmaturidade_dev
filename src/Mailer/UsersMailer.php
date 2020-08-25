<?php
declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Users mailer.
 */
class UsersMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Users';

    public function newApplicant($user)
    {
        $this
            ->setTo($user->email)
            ->setProfile('email_profile')
            ->setEmailFormat('html')
            ->setSubject(sprintf('Bem-vindo! (Sistema de Maturidade)'))
            ->setViewVars(['nome' => $user->nome_completo, 'username' => $user->username, 'email' => $user->email])
            ->viewBuilder()
                ->setLayout('default')
                ->setTemplate('tpl_new_applicant'); 
    }

    public function recoveryPassword($user)
    {
        $this        
            ->setTo($user[0]['email'])
            ->setProfile('email_profile')
            ->setEmailFormat('html')
            ->setSubject(sprintf('Recuperação de senha (Sistema de Maturidade)'))
            ->setViewVars(['username' => $user[0]['username'], 'hash' => substr($user[0]['password'], 0, 30), 'email' => $user[0]['email']])
            ->viewBuilder()
                ->setLayout('default')
                ->setTemplate('tpl_recovery_password'); 
    }

    public function sendConfirmationEmail($user)
    {
        $this        
            ->setTo($user['email'])
            ->setProfile('email_profile')
            ->setEmailFormat('html')
            ->setSubject(sprintf('Confirmação de email (Sistema de Maturidade)'))
            ->setViewVars(['username' => $user['username'], 'email' => $user['email']])
            ->viewBuilder()
                ->setLayout('default')
                ->setTemplate('tpl_confirmation_email');
    }
}
