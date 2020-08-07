<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Confidential $confidential
 */
?>
<div class="row">
    <div class="card w-100">
        <div class="card-header">
            <h4><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $confidential->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $confidential->id)]
            ) ?>
            <?= $this->Html->link(__('List Confidentials'), ['action' => 'index']) ?>
        </div>
        <div class="card-body">
            <div class="confidentials form content">
                <?= $this->Form->create($confidential) ?>
                <fieldset class="p-0">
                    <legend><?= __('Edit Confidential') ?></legend>
                    <?php
                    echo $this->Form->control('idea_id', ['options' => $ideas, 'class' => 'form-control mb-2']);
                    echo $this->Form->control('id_usuario', ['class' => 'form-control mb-2']);
                ?>
                </fieldset>
                <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary mt-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>