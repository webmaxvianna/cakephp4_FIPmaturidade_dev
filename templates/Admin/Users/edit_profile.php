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
        ['title' => $title_for_layout]
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
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body1">
                        <h3 class="card-title">Comprovantes de Documentos</h3>
                    </div>
                    <div class="card-body collapse show" id="body1">
                        <div class="form-group">
                            <p>
                                Documento de Identidade - frente (RG ou CPF): 
                                <?php
                                    if(isset($user->verification->identidade_frente)) {
                                        echo $this->Html->link('Ver documento', $user->verification->identidade_frente, ['fullBase' => true, 'target' => '_blank']);
                                    } else {
                                        echo "Não enviado!";
                                    }
                                ?>
                            </p>                            
                            <p>
                                Documento de Identidade - verso (RG ou CPF): 
                                <?php
                                    if(isset($user->verification->identidade_verso)) {
                                        echo $this->Html->link('Ver documento', $user->verification->identidade_verso, ['fullBase' => true, 'target' => '_blank']);
                                    } else {
                                        echo "Não enviado!";
                                    }
                                ?>
                            </p>
                            <p>
                                Comprovante de Residência: 
                                <?php
                                    if(isset($user->verification->residencia)) {
                                        echo $this->Html->link('Ver documento', $user->verification->residencia, ['fullBase' => true, 'target' => '_blank']);
                                    } else {
                                        echo "Não enviado!";
                                    }
                                ?>
                            </p>
                            <p>
                                Declaração: 
                                <?php
                                    if(isset($user->verification->declaracao)) {
                                        echo $this->Html->link('Ver documento', $user->verification->declaracao, ['fullBase' => true, 'target' => '_blank']);
                                    } else {
                                        echo "Não enviado!";
                                    }
                                ?>
                            </p>
                            <p>
                                Autorização do responsável: 
                                <?php
                                    if(isset($user->verification->autorizacao_pais)) {
                                        echo $this->Html->link('Ver documento', $user->verification->autorizacao_pais, ['fullBase' => true, 'target' => '_blank']);
                                    } else {
                                        echo "Não enviado!";
                                    }
                                ?>
                            </p>
                            <a class="btn btn-default" href="<?= $this->Url->build(['action' => 'verification_documents',$userLogged->id])  ?>">Atualizar comprovantes de documentos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visível apenas para GESTOR -->
        <?php if($userLogged->role->funcao == 'Gestor') : ?>
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
                                echo $this->Form->control('status', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Visível apenas para GESTOR -->
        
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

        <!-- Visível apenas para CANDIDATO -->
        <?php if($userLogged->role->funcao == 'Candidato') : ?>
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
                                echo $this->Form->control( 'interests._ids', [
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
        <?php endif; ?>
        <!-- Visível apenas para CANDIDATO -->
                
        <!-- Visível para AVALIADOR, CONSULTOR E JURADO -->
        <?php if($userLogged->role->funcao == 'Avaliador' || $userLogged->role->funcao == 'Consultor' || $userLogged->role->funcao == 'Jurado') : ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                        <h3 class="card-title">Suas especialidades?</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('specialties._ids', [
                                    'class' => 'form-check-input',
                                    'options' => $specialties,
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
        <?php endif; ?>
        <!-- Visível para AVALIADOR, CONSULTOR E JURADO -->

        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse">
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
                <div class="col-md-6 offset-md-3">
                    <?= $this->Form->button(__('Editar Perfil'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
                </div>
            </div>
        </div>      
        <?= $this->Form->end() ?>
    </div>
</section>
