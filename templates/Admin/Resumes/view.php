<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resume $resume
 */
?>
<div class="column">
    <div class=" col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="heading"><?= __('Ações') ?></h4>
                <?= $this->Html->link(__('Editar currículo'), ['action' => 'edit', $resume->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Deletar currículo'), ['action' => 'delete', $resume->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resume->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Listar currículos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Novo currículo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
            <div class=" card-body table-responsive p-0">
                <table class="table text-nowrap">
                    <tr>
                        <th><?= __('Área de Atuação') ?></th>
                        <td><?= h($resume->area_atuacao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Candidato') ?></th>
                        <td><?= $resume->has('applicant') ? $this->Html->link($resume->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $resume->applicant->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($resume->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado') ?></th>
                        <td><?= h($resume->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado') ?></th>
                        <td><?= h($resume->modified) ?></td>
                    </tr>
                </table>
                <div class="text">
                    <strong><?= __('Curriculo') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($resume->curriculo)); ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
