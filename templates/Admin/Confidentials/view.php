<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Confidential $confidential
 */
?>
<div class="row">
    <div class=" col-12">
        <div class="card">
            <div class="card-header">
                <h4><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Confidential'), ['action' => 'edit', $confidential->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Confidential'), ['action' => 'delete', $confidential->id], ['confirm' => __('Are you sure you want to delete # {0}?', $confidential->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Confidentials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Confidential'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <h3><?= h($confidential->id) ?></h3>
                <table class="table text-nowrap">
                    <tr>
                        <th><?= __('Idea') ?></th>
                        <td><?= $confidential->has('idea') ? $this->Html->link($confidential->idea->id, ['controller' => 'Ideas', 'action' => 'view', $confidential->idea->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($confidential->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id Usuario') ?></th>
                        <td><?= $this->Number->format($confidential->id_usuario) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($confidential->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($confidential->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>