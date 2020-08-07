<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appraisal[]|\Cake\Collection\CollectionInterface $appraisals
 */
?>
<div class="appraisals index content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?= $this->Html->link(__('New Appraisal'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                    <h3><?= __('Appraisals') ?></h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('pontuacao') ?></th>
                                <th><?= $this->Paginator->sort('idea_id') ?></th>
                                <th><?= $this->Paginator->sort('appraiser_id') ?></th>
                                <th><?= $this->Paginator->sort('parameter_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appraisals as $appraisal): ?>
                            <tr>
                                <td><?= $this->Number->format($appraisal->id) ?></td>
                                <td><?= $this->Number->format($appraisal->pontuacao) ?></td>
                                <td><?= $appraisal->has('idea') ? $this->Html->link($appraisal->idea->id, ['controller' => 'Ideas', 'action' => 'view', $appraisal->idea->id]) : '' ?>
                                </td>
                                <td><?= $appraisal->has('appraiser') ? $this->Html->link($appraisal->appraiser->id, ['controller' => 'Appraisers', 'action' => 'view', $appraisal->appraiser->id]) : '' ?>
                                </td>
                                <td><?= $appraisal->has('parameter') ? $this->Html->link($appraisal->parameter->id, ['controller' => 'Parameters', 'action' => 'view', $appraisal->parameter->id]) : '' ?>
                                </td>
                                <td><?= h($appraisal->created) ?></td>
                                <td><?= h($appraisal->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $appraisal->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appraisal->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appraisal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appraisal->id)]) ?>
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