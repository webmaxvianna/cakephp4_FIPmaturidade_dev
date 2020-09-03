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
                        <h3 class="card-title">Comprovante de Documentos</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('verification.identidade_verso', ['type' => 'file', 'label' => 'Comprovante de identidade - verso (RG ou CPF)<small> (válido arquivos de imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <?= $this->Form->button(__('Enviar Arquivo'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
