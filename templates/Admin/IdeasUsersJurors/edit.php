<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IdeasUsersJuror $ideasUsersJuror
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ideasUsersJuror->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ideasUsersJuror->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ideas Users Jurors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ideasUsersJurors form content">
            <?= $this->Form->create($ideasUsersJuror) ?>
            <fieldset>
                <legend><?= __('Edit Ideas Users Juror') ?></legend>
                <?php
                    echo $this->Form->control('idea_id', ['options' => $ideas]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
