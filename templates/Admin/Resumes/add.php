<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resume $resume
 */
?>
<div class="column">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Resumos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <br>
    <div class="column-responsive column-80">
        <div class="verifications form content">
            <?= $this->Form->create($resume) ?>
            <div class="card">
                <div class="card-body">
                    <fieldset class="form-group" style="padding-left: 0;" >
                        <legend><?= __('Adicionar Currículo') ?></legend>
                        <?php
                            echo $this->Form->control('curriculo', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('area_atuacao', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('applicant_id', ['class'=>'form-control mb-2', 'options' => $applicants]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
