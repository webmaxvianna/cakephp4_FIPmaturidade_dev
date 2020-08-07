<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resume[]|\Cake\Collection\CollectionInterface $resumes
 */
?>
<div class="resumes index content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?= $this->Html->link(__('Novo currículo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                    <h3><?= __('Currículos') ?></h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('area_atuacao') ?></th>
                                <th><?= $this->Paginator->sort('applicant_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Ações') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resumes as $resume): ?>
                            <tr>
                                <td><?= $this->Number->format($resume->id) ?></td>
                                <td><?= h($resume->area_atuacao) ?></td>
                                <td><?= $resume->has('applicant') ? $this->Html->link($resume->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $resume->applicant->id]) : '' ?></td>
                                <td><?= h($resume->created) ?></td>
                                <td><?= h($resume->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $resume->id]) ?>
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $resume->id]) ?>
                                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $resume->id], ['confirm' => __('Você tem certeza que deseja deletar o currículo # {0}?', $resume->id)]) ?>
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
