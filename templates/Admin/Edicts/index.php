<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edict[]|\Cake\Collection\CollectionInterface $edicts
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => $title_for_layout]
    ]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?php if($userLogged->role_id == 1) { ?>
                    <?= $this->Html->link("Novo Edital", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <?php } ?>
                <h3 class="card-title">Lista de Editais</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><?= $this->Paginator->sort('numero', 'Número') ?></th>
                <th><?= $this->Paginator->sort('link') ?></th>
                <th><?= $this->Paginator->sort('data_inicial') ?></th>
                <th><?= $this->Paginator->sort('data_final') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($edicts as $edict) : ?>
                <tr>
                    <td><?= h($edict->numero) ?></td>
                    <td><?= h($edict->link) ?></td>  
                    <td><?= $edict->data_inicial ?></td>
                    <td><?= $edict->data_final ?></td>                  
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', $edict->link, ['class' => 'btn btn-info btn-sm', 'target' => '_blank', 'escape' => false]) ?>
                        <?php if($userLogged->role_id == 1) { ?>
                            <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $edict->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $edict->id], ['confirm' => __("Are you sure you want to delete '".$edict->numero."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <?= $this->element('pagination') ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->