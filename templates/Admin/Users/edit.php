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
        ['title' => 'Editar']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <?php  
            $myTemplates = [
                'checkboxWrapper' => '<div class="form-check">{{label}}</div>',
                'nestingLabel' => '{{hidden}}{{input}}<label class="form-check-label">{{text}}</label>',
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
                        <h3 class="card-title">Informações Pessoais</h3>
                    </div>
                    <div class="card-body collapse show" id="body1">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('nome', ['label' => 'Nome', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('sobrenome', ['label' => 'Sobrenome', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('data_nascimento', ['label' => 'Data de nascimento', 'empty' => true, 'class' => 'form-control mb-2']);
                                echo $this->Form->control('sexo', [
                                    'label' => 'Sexo', 
                                    'type' => 'select',
                                    'options' => ['Masculino' => 'Masculino', 'Feminino' => 'Feminino'],
                                    'class' => 'form-control mb-2'
                                    ]);
                                echo $this->Form->control('cpf', ['label' => 'CPF', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('rg', ['label' => 'RG', 'class' => 'form-control mb-2']);
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
                                echo $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('username', ['label' => 'Nome de usuário <small>(username)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('password', ['label' => 'Senha <small>(password)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('role_id', ['label' => 'Função administrativa', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('status', [
                                    'options' => ['1' => 'Ativo', '0' => 'Inativo'],
                                    'type' => 'select',
                                    'label' => 'Status', 
                                    'class' => 'form-control mb-2'
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
                        <h3 class="card-title">Endereço e Informações de Contato</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('telefone1', ['label' => 'Telefone', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('cep', ['label' => 'CEP', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('logradouro', ['label' => 'Endereço', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('numero', ['label' => 'Número', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('complemento', ['label' => 'Complemento <small>(opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('bairro', ['label' => 'Bairro', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('cidade', ['label' => 'Cidade', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('estado', [
                                    'options' => ([
                                        'AC' => 'Acre',
                                        'AL' => 'Alagoas',
                                        'AP' => 'Amapá',
                                        'AM' => 'Amazonas',
                                        'BA' => 'Bahia',
                                        'CE' => 'Ceará',
                                        'DF' => 'Distrito Federal',
                                        'ES' => 'Espírito Santo',
                                        'GO' => 'Goiás',
                                        'MA' => 'Maranhão',
                                        'MT' => 'Mato Grosso',
                                        'MS' => 'Mato Grosso do Sul',
                                        'MG' => 'Minas Gerais',
                                        'PA' => 'Pará',
                                        'PB' => 'Paraíba',
                                        'PR' => 'Paraná',
                                        'PE' => 'Pernambuco',
                                        'PI' => 'Piauí',
                                        'RJ' => 'Rio de Janeiro',
                                        'RN' => 'Rio Grande do Norte',
                                        'RS' => 'Rio Grande do Sul',
                                        'RO' => 'Rondônia',
                                        'RR' => 'Roraima',
                                        'SC' => 'Santa Catarina',
                                        'SP' => 'São Paulo',
                                        'SE' => 'Sergipe',
                                        'TO' => 'Tocantins'
                                    ]),
                                    'type' => 'select',
                                    'label' => 'Estado', 
                                    'class' => 'form-control mb-2'
                                    ]);
                                echo $this->Form->control('pais', ['label' => 'País', 'class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visível apenas para CANDIDATO -->
        <?php if($user->role->funcao == 'Candidato') : ?>
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
                        <h3 class="card-title">Currículo</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('resume.curriculo', ['label' => 'Currículo resumido', 'class' => 'form-control mb-2']);
                                echo $this->Form->control('resume.area_atuacao', ['label' => 'Área de atuação', 'class' => 'form-control mb-2']);
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
                        <h3 class="card-title">Professor Orientador</h3>
                    </div>
                    <div class="card-body collapse show" id="body4">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('professor', ['label' => 'Nome do Professor <small>(opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('professor_lattes', ['label' => 'Currículo Lattes <small>(link) (opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        <?php endif; ?>
        <!-- Visível apenas para CANDIDATO -->
                
        <!-- Visível para AVALIADOR, CONSULTOR E JURADO -->
        <?php if($user->role->funcao == 'Avaliador' || $user->role->funcao == 'Consultor' || $user->role->funcao == 'Jurado') : ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body3">
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
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body3">
                        <h3 class="card-title">Redes Sociais</h3>
                    </div>
                    <div class="card-body collapse show" id="body3">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('facebook', ['label' => 'Facebook <small>(link) (opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('linkedin', ['label' => 'LinkedIn <small>(link) (opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('instagram', ['label' => 'Instagram <small>(link) (opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                                echo $this->Form->control('lattes', ['label' => 'Currículo Lattes <small>(link) (opcional)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= $this->Form->button(__('Salvar Alterações'),['class'=>'btn btn-block btn-primary col-md-6 offset-md-3']) ?>
                    </div>
                </div>
            </div>
        </div>      
        <?= $this->Form->end() ?>
    </div>
</section>
