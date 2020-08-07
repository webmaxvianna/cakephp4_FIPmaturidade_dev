<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-tasks"></i>
                            &nbsp;Tarefa <?= $this->Number->format($task->id) ?>
                            <small class="float-right">Criado em: <?= h($task->created) ?></small>
                        </h4>
                    </div>                    
                    <div class=" card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= __('Consultores relacionados') ?></h4>
                            </div>
                            <?php if (!empty($task->consultants)) : ?>
                            <div class=" card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Nome') ?></th>
                                        <th><?= __('Sobrenome') ?></th>
                                        <th><?= __('Nome Completo') ?></th>
                                        <th><?= __('Data Nascimento') ?></th>
                                        <th><?= __('Sexo') ?></th>
                                        <th><?= __('Email') ?></th>
                                        <th><?= __('Username') ?></th>
                                        <th><?= __('Password') ?></th>
                                        <th><?= __('Foto') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Confirmacao Email') ?></th>
                                        <th><?= __('Confirmacao Celular') ?></th>
                                        <th><?= __('Cpf') ?></th>
                                        <th><?= __('Rg') ?></th>
                                        <th><?= __('Facebook') ?></th>
                                        <th><?= __('Linkedin') ?></th>
                                        <th><?= __('Instagram') ?></th>
                                        <th><?= __('Lattes') ?></th>
                                        <th><?= __('Telefone1') ?></th>
                                        <th><?= __('Telefone2') ?></th>
                                        <th><?= __('Cep') ?></th>
                                        <th><?= __('Logradouro') ?></th>
                                        <th><?= __('Numero') ?></th>
                                        <th><?= __('Complemento') ?></th>
                                        <th><?= __('Bairro') ?></th>
                                        <th><?= __('Cidade') ?></th>
                                        <th><?= __('Estado') ?></th>
                                        <th><?= __('Pais') ?></th>
                                        <th><?= __('Manager Id') ?></th>
                                        <th><?= __('Criado') ?></th>
                                        <th><?= __('Modificado') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($task->consultants as $consultants) : ?>
                                    <tr>
                                        <td><?= h($consultants->id) ?></td>
                                        <td><?= h($consultants->nome) ?></td>
                                        <td><?= h($consultants->sobrenome) ?></td>
                                        <td><?= h($consultants->nome_completo) ?></td>
                                        <td><?= h($consultants->data_nascimento) ?></td>
                                        <td><?= h($consultants->sexo) ?></td>
                                        <td><?= h($consultants->email) ?></td>
                                        <td><?= h($consultants->username) ?></td>
                                        <td><?= h($consultants->password) ?></td>
                                        <td><?= h($consultants->foto) ?></td>
                                        <td><?= h($consultants->status) ?></td>
                                        <td><?= h($consultants->confirmacao_email) ?></td>
                                        <td><?= h($consultants->confirmacao_celular) ?></td>
                                        <td><?= h($consultants->cpf) ?></td>
                                        <td><?= h($consultants->rg) ?></td>
                                        <td><?= h($consultants->facebook) ?></td>
                                        <td><?= h($consultants->linkedin) ?></td>
                                        <td><?= h($consultants->instagram) ?></td>
                                        <td><?= h($consultants->lattes) ?></td>
                                        <td><?= h($consultants->telefone1) ?></td>
                                        <td><?= h($consultants->telefone2) ?></td>
                                        <td><?= h($consultants->cep) ?></td>
                                        <td><?= h($consultants->logradouro) ?></td>
                                        <td><?= h($consultants->numero) ?></td>
                                        <td><?= h($consultants->complemento) ?></td>
                                        <td><?= h($consultants->bairro) ?></td>
                                        <td><?= h($consultants->cidade) ?></td>
                                        <td><?= h($consultants->estado) ?></td>
                                        <td><?= h($consultants->pais) ?></td>
                                        <td><?= h($consultants->manager_id) ?></td>
                                        <td><?= h($consultants->created) ?></td>
                                        <td><?= h($consultants->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Consultants', 'action' => 'view', $consultants->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Consultants', 'action' => 'edit', $consultants->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Consultants', 'action' => 'delete', $consultants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultants->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4><?= __('Editais relacionados') ?></h4>
                            </div>
                            <?php if (!empty($task->edicts)) : ?>
                            <div class=" card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Numero') ?></th>
                                        <th><?= __('Link') ?></th>
                                        <th><?= __('Edital') ?></th>
                                        <th><?= __('Manager Id') ?></th>
                                        <th><?= __('Criado') ?></th>
                                        <th><?= __('Modificado') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($task->edicts as $edicts) : ?>
                                    <tr>
                                        <td><?= h($edicts->id) ?></td>
                                        <td><?= h($edicts->numero) ?></td>
                                        <td><?= h($edicts->link) ?></td>
                                        <td><?= h($edicts->edital) ?></td>
                                        <td><?= h($edicts->manager_id) ?></td>
                                        <td><?= h($edicts->created) ?></td>
                                        <td><?= h($edicts->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Edicts', 'action' => 'view', $edicts->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Edicts', 'action' => 'edit', $edicts->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Edicts', 'action' => 'delete', $edicts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $edicts->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4><?= __('Evidências relacionadas') ?></h4>
                            </div>
                            <?php if (!empty($task->evidences)) : ?>
                            <div class=" card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Evidencia Link') ?></th>
                                        <th><?= __('Idea Id') ?></th>
                                        <th><?= __('Task Id') ?></th>
                                        <th><?= __('Criado') ?></th>
                                        <th><?= __('Modificado') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($task->evidences as $evidences) : ?>
                                    <tr>
                                        <td><?= h($evidences->id) ?></td>
                                        <td><?= h($evidences->evidencia_link) ?></td>
                                        <td><?= h($evidences->idea_id) ?></td>
                                        <td><?= h($evidences->task_id) ?></td>
                                        <td><?= h($evidences->created) ?></td>
                                        <td><?= h($evidences->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Evidences', 'action' => 'view', $evidences->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Evidences', 'action' => 'edit', $evidences->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Evidences', 'action' => 'delete', $evidences->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidences->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Informações da tarefa</h4>
                            </div>
                            <div class="card-body">
                                <table class="table text-nowrap">
                                    <tr>
                                        <th><?= __('Id: ') ?></th>
                                        <td><?= $this->Number->format($task->id) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Dimensão: ') ?></th>
                                        <td><?= h($task->dimensao) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Tipo: ') ?></th>
                                        <td><?= h($task->tipo) ?></td>
                                    </tr>                
                                    <tr>
                                        <th><?= __('Criado: ') ?></th>
                                        <td><?= h($task->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modificado: ') ?></th>
                                        <td><?= h($task->modified) ?></td>
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
