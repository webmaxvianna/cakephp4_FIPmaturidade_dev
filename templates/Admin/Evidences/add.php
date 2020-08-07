<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evidence $evidence
 */
?>
<div class="row">
    <div class=" col-12">
        <div class=" card">
            <div class="card-header">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Evidences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <div class="evidences form content">
                    <?= $this->Form->create($evidence) ?>
                    <fieldset>
                        <legend><?= __('Add Evidence') ?></legend>
                        <?php
                        echo $this->Form->control('evidencia_link');
                        echo $this->Form->control('idea_id', ['options' => $ideas, 'class' => 'form-control col-3 mb-2']);
                        echo $this->Form->control('task_id', ['options' => $tasks, 'class' => 'form-control col-3 mb-2']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>

            </div>
        </div>
    </div>
</div>