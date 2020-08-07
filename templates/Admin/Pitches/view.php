<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitch $pitch
 */
?>
<div class="column">
    <div class=" col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Pitch'), ['action' => 'edit', $pitch->id], ['class' => 'side-nav-item']) ?>
                |
                <?= $this->Form->postLink(__('Delete Pitch'), ['action' => 'delete', $pitch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pitch->id), 'class' => 'side-nav-item']) ?>
                |
                <?= $this->Html->link(__('List Pitches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                |
                <?= $this->Html->link(__('New Pitch'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <table class="table text-nowrap">
                    <tr>
                        <th><?= __('Categoria') ?></th>
                        <td><?= $pitch->has('category') ? $this->Html->link($pitch->category->id, ['controller' => 'Categories', 'action' => 'view', $pitch->category->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Jurado') ?></th>
                        <td><?= $pitch->has('juror') ? $this->Html->link($pitch->juror->id, ['controller' => 'Jurors', 'action' => 'view', $pitch->juror->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Idéia') ?></th>
                        <td><?= $pitch->has('idea') ? $this->Html->link($pitch->idea->id, ['controller' => 'Ideas', 'action' => 'view', $pitch->idea->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($pitch->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Pontuação') ?></th>
                        <td><?= $this->Number->format($pitch->pontuacao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado') ?></th>
                        <td><?= h($pitch->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado') ?></th>
                        <td><?= h($pitch->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
