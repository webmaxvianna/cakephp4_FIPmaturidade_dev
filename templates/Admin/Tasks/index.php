<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Atividades']
    ]);
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= $this->Html->link("Nova Atividade", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                        <h3 class="card-title">Lista de Atividades</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('dimensao', 'Dimensão') ?></th>
                                    <th><?= $this->Paginator->sort('atividade') ?></th>
                                    <th><?= $this->Paginator->sort('tipo') ?></th>
                                    <th class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <td><?= h($task->dimensao) ?></td>
                                    <td><?= h($task->atividade) ?></td>
                                    <td><?= h($task->tipo) ?></td>
                                    <td class="text-nowrap actions">
                                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $task->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $task->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $task->id], ['confirm' => __("Tem certeza que deseja deletar o registro 'ID: ".$task->id."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->element('pagination') ?>
    </div>
</div>
