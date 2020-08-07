<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parameter $parameter
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-cogs"></i>
                            &nbsp;Item <?= $parameter->item ?>
                            <small class="float-right">Criado em: <?= h($parameter->created) ?></small>
                        </h4>
                    </div>                    
                    <div class=" card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= __('Editais relacionados') ?></h4>
                            </div>
                            <?php if (!empty($parameter->edicts)) : ?>
                            <div class=" card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Número') ?></th>
                                        <th><?= __('Link') ?></th>
                                        <th><?= __('Edital') ?></th>
                                        <th><?= __('Id do Gestor') ?></th>
                                        <th><?= __('Criado') ?></th>
                                        <th><?= __('Modificado') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($parameter->edicts as $edicts) : ?>
                                    <tr>
                                        <td><?= h($edicts->id) ?></td>
                                        <td><?= h($edicts->numero) ?></td>
                                        <td><?= h($edicts->link) ?></td>
                                        <td><?= h($edicts->edital) ?></td>
                                        <td><?= h($edicts->manager_id) ?></td>
                                        <td><?= h($edicts->created) ?></td>
                                        <td><?= h($edicts->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Ver'), ['controller' => 'Edicts', 'action' => 'view', $edicts->id]) ?>
                                            <?= $this->Html->link(__('Editar'), ['controller' => 'Edicts', 'action' => 'edit', $edicts->id]) ?>
                                            <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Edicts', 'action' => 'delete', $edicts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $edicts->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4><?= __('Avaliações relacionadas') ?></h4>
                            </div>
                            <?php if (!empty($parameter->appraisals)) : ?>
                            <div class=" card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Pontuação') ?></th>
                                        <th><?= __('Idea Id') ?></th>
                                        <th><?= __('Id da avaliação') ?></th>
                                        <th><?= __('Id do parâmetro') ?></th>
                                        <th><?= __('Criado') ?></th>
                                        <th><?= __('Modificado') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($parameter->appraisals as $appraisals) : ?>
                                    <tr>
                                        <td><?= h($appraisals->id) ?></td>
                                        <td><?= h($appraisals->pontuacao) ?></td>
                                        <td><?= h($appraisals->idea_id) ?></td>
                                        <td><?= h($appraisals->appraiser_id) ?></td>
                                        <td><?= h($appraisals->parameter_id) ?></td>
                                        <td><?= h($appraisals->created) ?></td>
                                        <td><?= h($appraisals->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Ver'), ['controller' => 'Appraisals', 'action' => 'view', $appraisals->id]) ?>
                                            <?= $this->Html->link(__('Editar'), ['controller' => 'Appraisals', 'action' => 'edit', $appraisals->id]) ?>
                                            <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Appraisals', 'action' => 'delete', $appraisals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appraisals->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4><?= __('Sobre o item') ?></h4>
                            </div>
                            <div class="card-body">
                                <table class="table text-nowrap">
                                    <tr>
                                        <th><?= __('Item') ?></th>
                                        <td><?= h($parameter->item) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <td><?= $this->Number->format($parameter->id) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Criado') ?></th>
                                        <td><?= h($parameter->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modificado') ?></th>
                                        <td><?= h($parameter->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
