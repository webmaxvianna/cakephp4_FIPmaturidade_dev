<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appraisal $appraisal
 */
?>
<div class="row">
    <div class="card w-100">
        <div class="card-header">
            <h4><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appraisal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appraisal->id)]
            ) ?>
            <?= $this->Html->link(__('List Appraisals'), ['action' => 'index']) ?>
        </div>
        <div class="card-body">
            <div class="appraisals form content">
                <?= $this->Form->create($appraisal) ?>
                <fieldset class="p-0">
                    <legend><?= __('Edit Appraisal') ?></legend>
                    <?php
                    echo $this->Form->control('pontuacao', ['class' => 'form-control mb-2']);
                    echo $this->Form->control('idea_id', ['options' => $ideas, 'class' => 'form-control mb-2']);
                    echo $this->Form->control('appraiser_id', ['options' => $appraisers, 'class' => 'form-control mb-2']);
                    echo $this->Form->control('parameter_id', ['options' => $parameters, 'class' => 'form-control mb-2']);
                ?>
                </fieldset>
                <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary mt-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>