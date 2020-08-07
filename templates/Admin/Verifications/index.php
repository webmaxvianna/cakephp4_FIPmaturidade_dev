<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verification[]|\Cake\Collection\CollectionInterface $verifications
 */
?>
<div class="verifications index content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?= $this->Html->link(__('Nova verificação'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                    <h3><?= __('Verificações') ?></h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('residencia') ?></th>
                                <th><?= $this->Paginator->sort('identidade') ?></th>
                                <th><?= $this->Paginator->sort('declaracao') ?></th>
                                <th><?= $this->Paginator->sort('autorizacao_pais') ?></th>
                                <th><?= $this->Paginator->sort('foto') ?></th>
                                <th><?= $this->Paginator->sort('applicant_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($verifications as $verification): ?>
                            <tr>
                                <td><?= $this->Number->format($verification->id) ?></td>
                                <td><?= h($verification->residencia) ?></td>
                                <td><?= h($verification->identidade) ?></td>
                                <td><?= h($verification->declaracao) ?></td>
                                <td><?= h($verification->autorizacao_pais) ?></td>
                                <td><?= h($verification->foto) ?></td>
                                <td><?= $verification->has('applicant') ? $this->Html->link($verification->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $verification->applicant->id]) : '' ?></td>
                                <td><?= h($verification->created) ?></td>
                                <td><?= h($verification->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver '), ['action' => 'view', $verification->id]) ?>
                                    <?= $this->Html->link(__('Editar '), ['action' => 'edit', $verification->id]) ?>
                                    <?= $this->Form->postLink(__('Deletar '), ['action' => 'delete', $verification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $verification->id)]) ?>
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
