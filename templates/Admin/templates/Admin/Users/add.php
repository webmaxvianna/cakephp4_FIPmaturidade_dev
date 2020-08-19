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
        ['title' => 'Adicionar']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <?php  
            $myTemplates = [
                'checkboxWrapper' => '<div class="form-check">{{label}}</div>',
                'nestingLabel' => '{{hidden}}{{input}}<label class="form-check-label">{{text}}</label>',
            ];
            $this->Form->setTemplates($myTemplates);
        ?>
        <?= $this->Form->create($user, ['type' => 'file']) ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body1">
                        <h3 class="card-title">Informações Pessoais</h3>
                    </div>
                    <div class="card-body collapse show" id="body1">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('nome', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('sobrenome', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('data_nascimento', ['empty' => true, 'class' => 'form-control mb-2']);
                                echo $this->Form->control('sexo', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('email', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('foto', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('cpf', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('rg', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body2">
                        <h3 class="card-title">Informações de Acesso</h3>
                    </div>
                    <div class="card-body collapse show" id="body2">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('username', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('password', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('confirm_password', ['class' => 'form-control mb-2', 'type' => 'password']);
                                echo $this->Form->control('status', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('confirmacao_email', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('confirmacao_celular', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body3">
                        <h3 class="card-title">Redes Sociais</h3>
                    </div>
                    <div class="card-body collapse show" id="body3">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('facebook', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('linkedin', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('instagram', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('lattes', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Endereço e Informações de Contato</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('telefone1', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('telefone2', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('cep', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('logradouro', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('numero', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('complemento', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('bairro', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('cidade', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('estado', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('pais', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Sobre / Quem é você?</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('characteristics._ids', [
                                    'class' => 'form-check-input',
                                    'options' => $characteristics,
                                    'type' => 'select',
                                    'multiple' => 'checkbox',
                                    'label' => false
                                    ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Conte-nos sobre seus interesses?</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('interests._ids', [
                                    'class' => 'form-check-input',
                                    'options' => $interests,
                                    'type' => 'select',
                                    'multiple' => 'checkbox',
                                    'label' => false
                                    ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Comprovantes</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('verification.residencia', ['type' => 'file', 'label' => 'Comprovante de residência<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.declaracao', ['type' => 'file', 'label' => 'Declaração<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.identidade_frente', ['type' => 'file', 'label' => 'Documento de identidade - frente (RG ou CPF)<small> (imagem .jpg ou .png)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.identidade_verso', ['type' => 'file', 'label' => 'Documento de identidade - verso (RG ou CPF)<small> (imagem .jpg ou .png)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('verification.autorizacao_pais', ['type' => 'file', 'label' => 'Autorização dos pais<small> (imagem ou pdf)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Currículo</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('resume.curriculo', ['class' => 'form-control mb-2']);
                                echo $this->Form->control('resume.area_atuacao', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Função Administrativa</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('role_id', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <?= $this->Form->button(__('Adicionar Usuário'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
