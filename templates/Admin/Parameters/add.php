<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parameter $parameter
 */
?>
<div class="column">
    <div class="col-md-10 offset-md-1">
        <div class="verifications form content">
            <?= $this->Form->create($parameter) ?>
            <div class="card card-secondary">
                <div class='card-header'>
                    <h3 class='card-title'><?= __('Adicionar Parâmetro') ?></h3>
                </div>
                <div class="card-body">
                    <fieldset class="form-group" style="padding-left: 0;" >
                        <?php
                            echo $this->Form->control('item', [
                                'class' => 'form-control mb-2' 
                            ]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>