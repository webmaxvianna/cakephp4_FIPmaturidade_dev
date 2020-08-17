<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edict[]|\Cake\Collection\CollectionInterface $edicts
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Editais', 'url' => ['controller' => 'edicts', 'action' => 'index']]
    ]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?= $this->Html->link("Novo Edital", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <h3 class="card-title">Lista de Editais</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('link') ?></th>
                <th><?= $this->Paginator->sort('owner') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($edicts as $edict) : ?>
                <tr>
                    <td><?= h($edict->numero) ?></td>
                    <td><?= h($edict->link) ?></td>                    
                    <td><?= h($edict->owner->nome_completo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $edict->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $edict->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $edict->id], ['confirm' => __("Are you sure you want to delete '".$edict->numero."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('link') ?></th>
                <th><?= $this->Paginator->sort('owner') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->