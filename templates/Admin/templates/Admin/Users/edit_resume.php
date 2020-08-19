<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resume $resume
 */
?>
<?= $this->Form->create($user, ['type' => 'file']) ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card card-secondary">
            <div class="card-header cursor-pointer" data-toggle="collapse" href="#body4">
                <h3 class="card-title">Editar Currículo</h3>
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
        <div class="col-md-6 offset-md-3">
            <?= $this->Form->button(__('Editar Currículo'), ['class' => 'btn btn-block btn-primary my-2 w-15']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>