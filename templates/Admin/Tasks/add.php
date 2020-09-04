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
<div class="column">
    <div class="col-md-10 offset-md-1">
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
            <div class="card card-secondary">
                <div class='card-header'>
                    <h3 class='card-title'><?= __('Adicionar Atividade') ?></h3>
                </div>
                <div class="card-body">
                    <fieldset class="form-group" style="padding-left: 0;" >                       
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
                    </fieldset>
                    <?= $this->Form->button(__('Enviar'), [
                        'class' => 'btn btn-primary' 
                    ]) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>