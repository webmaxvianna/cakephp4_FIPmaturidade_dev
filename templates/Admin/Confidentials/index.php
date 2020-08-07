<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Confidential[]|\Cake\Collection\CollectionInterface $confidentials
 */
?>
<div class="confidentials index content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?= $this->Html->link(__('New Confidential'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                    <h3><?= __('Confidentials') ?></h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('idea_id') ?></th>
                                <th><?= $this->Paginator->sort('id_usuario') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($confidentials as $confidential): ?>
                            <tr>
                                <td><?= $this->Number->format($confidential->id) ?></td>
                                <td><?= $confidential->has('idea') ? $this->Html->link($confidential->idea->id, ['controller' => 'Ideas', 'action' => 'view', $confidential->idea->id]) : '' ?>
                                </td>
                                <td><?= $this->Number->format($confidential->id_usuario) ?></td>
                                <td><?= h($confidential->created) ?></td>
                                <td><?= h($confidential->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $confidential->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $confidential->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $confidential->id], ['confirm' => __('Are you sure you want to delete # {0}?', $confidential->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= $this->element('paginator') ?>
</div>