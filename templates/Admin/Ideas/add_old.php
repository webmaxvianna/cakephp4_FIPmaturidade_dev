<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>

<div class="row">
    <div class=" col-12">
        <div class=" card">
            <div class="card-header">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Ideas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <div class="ideas form content">
                    <?= $this->Form->create($idea) ?>
                    <fieldset>
                        <legend><?= __('Add Idea') ?></legend>
                        <?php
                        echo $this->Form->control('status', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('autor_nome', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('titulo', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('descricao', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('link_video', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_atividades', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_propostas', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_relacionamentos', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_recursos', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_canais', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_parceriaschaves', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_segmentosdemercado', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_estruturadecusto', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('canvas_fontesderenda', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('sumario_segredo', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('sumario_problema', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('sumario_solucao', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('sumario_oportunidade', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('sumario_vontadecompetitiva', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('sumario_modelo', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('observacoes', ['class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('edict_id', ['options' => $edicts, 'type' => 'hidden', 'class' => 'form-control col-3 mb-2']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>

            </div>
        </div>
    </div>
</div>