<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitch $pitch
 */
?>
<div class="column">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $pitch->id],
                ['confirm' => __('Você tem certeza que deseja deletar o pitch # {0}?', $pitch->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar pitches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <br>
    <div class="column-responsive column-80">
        <div class="pitches form content">
            <?= $this->Form->create($pitch) ?>
            <div class="card">
                <div class="card-body">
                    <fieldset class="form-group" style="padding-left: 0;" >
                        <legend><?= __('Editar Pitch') ?></legend>
                        <?php
                            echo $this->Form->control('pontuacao', [
                                'class' => 'form-control mb-2' 
                            ]);
                            echo $this->Form->control('category_id', ['class'=>'form-control mb-2','options' => $categories]);
                            echo $this->Form->control('juror_id', ['class'=>'form-control mb-2','options' => $jurors]);
                            echo $this->Form->control('idea_id', ['class'=>'form-control mb-2','options' => $ideas]);
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
