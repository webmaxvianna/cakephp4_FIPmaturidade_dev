<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verification $verification
 */
?>
<div class="column">
    <div class=" col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading"><?= __('Ações') ?></h4>
                <?= $this->Html->link(__('Editar verificação'), ['action' => 'edit', $verification->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Deletar verificação'), ['action' => 'delete', $verification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $verification->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Listar verificações'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Nova verificação'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <table class="table text-nowrap">
                    <tr>
                        <th><?= __('Residencia: ') ?>&nbsp;</th>
                        <td><?= h($verification->residencia) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Identidade: ') ?>&nbsp;</th>
                        <td><?= h($verification->identidade) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Declaração: ') ?>&nbsp;</th>
                        <td><?= h($verification->declaracao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Autorização Pais: ') ?>&nbsp;</th>
                        <td><?= h($verification->autorizacao_pais) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Foto: ') ?>&nbsp;</th>
                        <td><?= h($verification->foto) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Candidato: ') ?>&nbsp;</th>
                        <td><?= $verification->has('applicant') ? $this->Html->link($verification->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $verification->applicant->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id: ') ?>&nbsp;</th>
                        <td><?= $this->Number->format($verification->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado: ') ?>&nbsp;</th>
                        <td><?= h($verification->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado: ') ?>&nbsp;</th>
                        <td><?= h($verification->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
