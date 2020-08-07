<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verification $verification
 */
?>
<div class="column">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $verification->id],
                ['confirm' => __('Você tem certeza que deseja deletar a verificação # {0}?', $verification->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar verificações'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <br>
    <div class="column-responsive column-80">
        <div class="verifications form content">
            <?= $this->Form->create($verification) ?>
            <div class="card">
                <div class="card-body">
                    <fieldset class="form-group" style="padding-left: 0;" >
                        <legend><?= __('Edit Verification') ?></legend>
                        <?php
                            echo $this->Form->control('residencia', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('identidade', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('declaracao', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('autorizacao_pais', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('foto', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('applicant_id', ['class' => 'form-control mb-2', 'options' => $applicants]);
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
