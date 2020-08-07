<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
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
                            echo $this->Form->control('atividade', [
                                'class' => 'textarea', 
                                'templates' => ['inputContainer' => '<div>{{content}}</div>'],
                                ]);
                            echo $this->Form->control('dimensao', [
                                'class' => 'form-control mb-2',
                                'empty' => ['0' => 'Escolha uma opção'],
                                'options' => [
                                    'Complementar' => 'Complementar',
                                    'Finanças' => 'Finanças',
                                    'Gestão' => 'Gestão',
                                    'Inovação' => 'Inovação',
                                    'Mercado' => 'Mercado',
                                    'Pessoal' => 'Pessoal' 
                                ]
                            ]);
                            echo $this->Form->control('tipo', [
                                'class' => 'form-control mb-2',
                                'empty' => ['0' => 'Escolha uma opção'],
                                'options' => [
                                    'Atitude' => 'Atitude',
                                    'Conhecimento' => 'Conhecimento',
                                    'Habilidade' => 'Habilidade'
                                ]
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