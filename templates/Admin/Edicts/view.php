<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edict $edict
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Editais', 'url' => ['controller' => 'edicts', 'action' => 'index']],
        ['title' =>'Visualizar']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-user-tie"></i>
                            &nbsp;<?= h($edict->numero) . " / Id: " . h($edict->id) ?>
                            <small class="float-right">Criado em: <?= h($edict->created) ?></small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Detalhes</h4>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <tr>
                                        <th><?= __('Link') ?></th>
                                        <td><?= h($edict->link) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Gestor') ?></th>
                                        <td><?= $edict->has('owner') ? $this->Html->link($edict->owner->nome_completo, ['controller' => 'Managers', 'action' => 'view', $edict->owner->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Última Modificação') ?></th>
                                        <td><?= h($edict->modified) ?></td>
                                    </tr>
                                </table>
                                <div class="text">
                                    <strong><?= __('Edital') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($edict->edital)); ?>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Avaliadores Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($edict->users)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($edict->users as $user) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $user->id ?>">
                                                        <?= $this->Html->link($user->nome_completo, ['controller' => 'users', 'action' => 'view', $user->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Categorias Relacionadas') ?></h4>
                                    </div>
                                    <?php if (!empty($edict->categories)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($edict->categories as $categories) : ?>
                                                    <li data-toggle="tooltip" data-placement="left" title="<?php "Id: " . $categories->id ?>">
                                                        <?php $this->Html->link($categories->item, ['controller' => 'categories', 'action' => 'view', $categories->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Parâmetros Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($edict->parameters)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($edict->parameters as $parameters) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $parameters->id ?>">
                                                        <?= $this->Html->link($parameters->item, ['controller' => 'parameters', 'action' => 'view', $parameters->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Tarefas Relacionadas') ?></h4>
                                    </div>
                                    <?php if (!empty($edict->tasks)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($edict->tasks as $tasks) : ?>
                                                    <li data-toggle="tooltip" data-placement="left" title="<?php "Id: " . $tasks->id ?>">
                                                        <?php $this->Html->link($tasks->atividade, ['controller' => 'tasks', 'action' => 'view', $tasks->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Ideias Relacionadas') ?></h4>
                                    </div>
                                    <?php if (!empty($edict->ideas)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($edict->ideas as $ideas) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $ideas->id ?>">
                                                        <?= $this->Html->link($ideas->titulo, ['controller' => 'ideas', 'action' => 'view', $ideas->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>