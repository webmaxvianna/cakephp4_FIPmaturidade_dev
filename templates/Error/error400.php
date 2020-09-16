<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

// $this->layout = 'error';
$this->layout = 'adminlte_inova_login';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.php');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php

$this->end();
endif;
?>
<!-- <h2><?= h($message) ?></h2>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
</p> -->
<section class="content">
    <div class="error-page mt-5 text-center">
        <h2 class="headline text-warning mr-3">Error</h2>
    
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Aconteceu algo errado.</h3>

            <p>
            Por favor, tente acessar novamente o sistema inserindo seu nome de usuário e sua senha.
            </p>

        </div>
    </div>

    <div class="error-page mt-5 text-center">
        <p>
            <a href="javascript:history.back()">Retornar ao sistema</a>
        </p>
    </div>
</section>
