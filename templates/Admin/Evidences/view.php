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
                <?= $this->Html->link(__('Edit Evidence'), ['action' => 'edit', $evidence->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Evidence'), ['action' => 'delete', $evidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidence->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Evidences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Evidence'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>

            </div>
            <div class=" card-body table-responsive p-0">
                <table>
                    <tr>
                        <th><?= __('Evidencia Link') ?></th>
                        <td><?= h($evidence->evidencia_link) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Idea') ?></th>
                        <td><?= $evidence->has('idea') ? $this->Html->link($evidence->idea->id, ['controller' => 'Ideas', 'action' => 'view', $evidence->idea->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Task') ?></th>
                        <td><?= $evidence->has('task') ? $this->Html->link($evidence->task->id, ['controller' => 'Tasks', 'action' => 'view', $evidence->task->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($evidence->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($evidence->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($evidence->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>