<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appraisal $appraisal
 */
?>
<div class="row">
    <div class=" col-12">
        <div class="card">
            <div class="card-header">
                <h4><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Appraisal'), ['action' => 'edit', $appraisal->id], ['class' => 'nav-link d-inline']) ?>
                <?= $this->Form->postLink(__('Delete Appraisal'), ['action' => 'delete', $appraisal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appraisal->id), 'class' => 'nav-link d-inline']) ?>
                <?= $this->Html->link(__('List Appraisals'), ['action' => 'index'], ['class' => 'nav-link d-inline']) ?>
                <?= $this->Html->link(__('New Appraisal'), ['action' => 'add'], ['class' => 'nav-link d-inline']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <h3><?= h($appraisal->id) ?></h3>
                <table class="table text-nowrap">
                    <tr>
                        <th><?= __('Idea') ?></th>
                        <td><?= $appraisal->has('idea') ? $this->Html->link($appraisal->idea->id, ['controller' => 'Ideas', 'action' => 'view', $appraisal->idea->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Appraiser') ?></th>
                        <td><?= $appraisal->has('appraiser') ? $this->Html->link($appraisal->appraiser->id, ['controller' => 'Appraisers', 'action' => 'view', $appraisal->appraiser->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Parameter') ?></th>
                        <td><?= $appraisal->has('parameter') ? $this->Html->link($appraisal->parameter->id, ['controller' => 'Parameters', 'action' => 'view', $appraisal->parameter->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($appraisal->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Pontuacao') ?></th>
                        <td><?= $this->Number->format($appraisal->pontuacao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($appraisal->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($appraisal->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>