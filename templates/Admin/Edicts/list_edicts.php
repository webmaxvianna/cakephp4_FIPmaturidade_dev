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
                    <th><?= $this->Paginator->sort('numero') ?></th>
                    <th><?= $this->Paginator->sort('data_inicial', 'Início em') ?></th>
                    <th><?= $this->Paginator->sort('data_final', 'Expira em') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($edicts as $edict) : ?>
                <tr>
                    <td><?= $this->Html->link('<i class="far fa-eye"></i> visualizar', $edict->link, ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'target' => 'blank']) ?>&nbsp;&nbsp;<?= 'Edital: ' . $edict->numero ?></td>
                    <td><?= $edict->data_inicial ?></td>
                    <td><?= $edict->data_final ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
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