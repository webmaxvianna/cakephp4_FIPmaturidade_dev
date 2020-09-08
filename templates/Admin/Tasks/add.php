<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Atividades', 'url' => ['controller' => 'tasks', 'action' => 'index']],
        ['title' => 'Adicionar Atividade']
    ]);
?>
<!-- Main content --> 
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- column -->
      <div class="col-md-10 offset-md-1">
        <!-- general form elements disabled -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Adicionar Atividade</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php  
                $myTemplates = [
                    'error' => '<div class="error invalid-feedback">{{content}}</div>',
                ];
                $this->Form->setTemplates($myTemplates);
                $this->Form->setConfig('errorClass', 'is-invalid');
            ?>
            <?= $this->Form->create($task) ?>
                <div class="card-body">
                    <div class="form-group">                       
                    <?php
                        echo $this->Form->control('dimensao', [
                            'class' => 'form-control mb-2',
                            'options' => [
                                'Complementar' => 'Complementar',
                                'Finanças' => 'Finanças',
                                'Gestão' => 'Gestão',
                                'Inovação' => 'Inovação',
                                'Mercado' => 'Mercado',
                                'Pessoal' => 'Pessoal' 
                            ],
                            'label' => 'Dimensão'
                        ]);
                        echo $this->Form->control('atividade', [
                            'class' => 'form-control mb-2',
                            'placeholder' => 'Atividade',
                            'label' => ['text' => 'Atividade', 'label' => 'control-label']
                        ]);
                        echo $this->Form->control('tipo', [
                            'class' => 'form-control mb-2',
                            'options' => [
                                'Atitude' => 'Atitude',
                                'Conhecimento' => 'Conhecimento',
                                'Habilidade' => 'Habilidade'
                            ],
                            'label' => 'Tipo'
                        ]);
                    ?>
                    </div>
                </div>
                <div class="card-footer">
                    <?= $this->Form->button(__('Salvar Atividade'),['class'=>'btn btn-block btn-primary col-md-6 offset-md-3']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
</section>