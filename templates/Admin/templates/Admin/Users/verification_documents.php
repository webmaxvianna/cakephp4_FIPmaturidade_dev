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
        ['title' => 'Editar Perfil', 'url' => ['controller' => 'users', 'action' => 'edit_profile', $userLogged->id]],
        ['title' => 'Documentação']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <?= $this->Form->create($user, ['type' => 'file']) ?>
       
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title"><?= $title_for_layout ?></h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('verification.residencia', ['type' => 'file', 'label' => 'Comprovante de residência<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.declaracao', ['type' => 'file', 'label' => 'Declaração<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.identidade_frente', ['type' => 'file', 'label' => 'Documento de identidade - frente (RG ou CPF)<small> (imagem .jpg ou .png)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.identidade_verso', ['type' => 'file', 'label' => 'Documento de identidade - verso (RG ou CPF)<small> (imagem .jpg ou .png)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.recomendacao', ['type' => 'file', 'label' => 'Carta de recomendação<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.autorizacao_pais', ['type' => 'file', 'label' => 'Autorização dos pais<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <?= $this->Form->button(__('Enviar Arquivos'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
