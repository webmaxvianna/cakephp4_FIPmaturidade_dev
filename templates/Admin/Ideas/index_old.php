<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea[]|\Cake\Collection\CollectionInterface $ideas
 */
?>

<div class="ideas index content">
    <div class="row">
        <div class=" col-12">
            <div class=" card">
                <div class="card-header">
                    <?= $this->Html->link(__('New Idea'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                    <h3><?= __('Ideas') ?></h3>
                </div>
                <div class=" card-body table-responsive p-0">
                    <table class="table tabl-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('autor_nome') ?></th>
                                <th><?= $this->Paginator->sort('titulo') ?></th>
                                <th><?= $this->Paginator->sort('link_video') ?></th>
                                <th><?= $this->Paginator->sort('edict_id') ?></th>
                                <th><?= $this->Paginator->sort('applicant_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ideas as $idea) : ?>
                                <tr>
                                    <td><?= $this->Number->format($idea->id) ?></td>
                                    <td><?= $this->Number->format($idea->status) ?></td>
                                    <td><?= h($idea->autor_nome) ?></td>
                                    <td><?= h($idea->titulo) ?></td>
                                    <td><?= h($idea->link_video) ?></td>
                                    <td><?= $idea->has('edict') ? $this->Html->link($idea->edict->id, ['controller' => 'Edicts', 'action' => 'view', $idea->edict->id]) : '' ?></td>
                                    <td><?= $idea->has('applicant') ? $this->Html->link($idea->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $idea->applicant->id]) : '' ?></td>
                                    <td><?= h($idea->created) ?></td>
                                    <td><?= h($idea->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $idea->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $idea->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $idea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $idea->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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