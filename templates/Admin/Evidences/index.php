<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evidence[]|\Cake\Collection\CollectionInterface $evidences
 */
?>
<div class="evidences index content">

    <div class="row">
        <div class=" col-12">
            <div class=" card">
                <div class="card-header">
                    <?= $this->Html->link(__('New Evidence'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                    <h3><?= __('Evidences') ?></h3>
                </div>
                <div class=" card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('evidencia_link') ?></th>
                                <th><?= $this->Paginator->sort('idea_id') ?></th>
                                <th><?= $this->Paginator->sort('task_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evidences as $evidence) : ?>
                                <tr>
                                    <td><?= $this->Number->format($evidence->id) ?></td>
                                    <td><?= h($evidence->evidencia_link) ?></td>
                                    <td><?= $evidence->has('idea') ? $this->Html->link($evidence->idea->id, ['controller' => 'Ideas', 'action' => 'view', $evidence->idea->id]) : '' ?></td>
                                    <td><?= $evidence->has('task') ? $this->Html->link($evidence->task->id, ['controller' => 'Tasks', 'action' => 'view', $evidence->task->id]) : '' ?></td>
                                    <td><?= h($evidence->created) ?></td>
                                    <td><?= h($evidence->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $evidence->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evidence->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidence->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="table-responsive">

    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeiro ')) ?>
            <?= $this->Paginator->prev('<i class="fa fa-arrow-left" aria-hidden="true"></i>' . __(' Anterior'), ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('&nbspPróximo ') . '<i class="fa fa-arrow-right" aria-hidden="true"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last(__(' Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} totais')) ?></p>
    </div>
</div>