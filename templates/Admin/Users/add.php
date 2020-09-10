<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager $manager
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Usuários', 'url' => ['controller' => 'users', 'action' => 'index']],
        ['title' => 'Adicionar']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <?php  
            $myTemplates = [
                'error' => '<div class="error invalid-feedback">{{content}}</div>',
            ];
            $this->Form->setTemplates($myTemplates);
            $this->Form->setConfig('errorClass', 'is-invalid');
        ?>
        <?= $this->Form->create($user, ['type' => 'file']) ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body1">
                        <h3 class="card-title">Novo usuário</h3>
                    </div>
                    <div class="card-body collapse show" id="body1">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('nome', ['label' => 'Nome', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('sobrenome', ['label' => 'Sobrenome','class' => 'form-control mb-2']);
                                echo $this->Form->control('username', ['label' => 'Nome de usuário <small>(username)</small>','class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('password', ['label' => 'Senha <small>(password)</small>','class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('confirm_password', ['label' => 'Confirmar senha','class' => 'form-control mb-2', 'type' => 'password']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body1">
                        <h3 class="card-title">Função administrativa</h3>
                    </div>
                    <div class="card-body collapse show" id="body1">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('role_id', ['label' => 'Função', 'class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= $this->Form->button(__('Adicionar Usuário'),['class'=>'btn btn-block btn-primary col-md-6 offset-md-3']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
