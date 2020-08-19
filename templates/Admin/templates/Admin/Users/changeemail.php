<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager $manager
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Usuários', 'url' => ['controller' => 'users', 'action' => 'index']],
        ['title' => 'Alterar e-mail']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body2">
                        <h3 class="card-title">Alterar senha</h3>
                    </div>
                    <div class="card-body collapse show" id="body2">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('email', ['disabled', 'label' => 'E-mail anterior', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('new_email', ['label' => 'Novo e-mail', 'class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <?= $this->Form->button(__('Alterar e-mail'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
