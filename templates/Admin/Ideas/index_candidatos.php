<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea[]|\Cake\Collection\CollectionInterface $ideas
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Ideias']
    ]);
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?= $this->Html->link("Nova Ideia", ['action' => 'addIdeas', $userLogged->id], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <h2 class="card-title">Lista de Ideias</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><?= $this->Paginator->sort('numero','Edital') ?></th>
                <th><?= $this->Paginator->sort('titulo','Título') ?></th>
                <th><?= $this->Paginator->sort('titulo','Status') ?></th>
                <th class="actions"><?= 'Editar' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ideas as $idea): ?>
                <tr>
                    <td><?= h($idea->edict->numero) ?></td>
                    <td><?= h($idea->titulo) ?></td>
                    <td>
                        <?php 
                            switch ($idea->status) {
                                case '0':
                                    echo '<span class="badge badge-secondary badge-pill pl-2 pr-2">&nbsp;&nbsp; inativo &nbsp;&nbsp;</span>';
                                break;
                                case '1':
                                    echo '<span class="badge badge-warning badge-pill pl-2 pr-2">&nbsp;&nbsp; em edição &nbsp;&nbsp;</span>';
                                    break;
                                case '2':
                                    echo '<span class="badge badge-success badge-pill pl-2 pr-2">&nbsp;&nbsp; finalizado &nbsp;&nbsp;</span>';
                                    break;
                            }
                            if ($idea->status) 
                        ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link('&nbsp;<i class="far fa-edit"></i> Ideia &nbsp;', ['action' => 'editIdeas', $idea->id], ['class' => 'btn btn-outline-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('&nbsp;<i class="far fa-edit"></i> Canvas &nbsp;', ['action' => 'editCanvas', $idea->id], ['class' => 'btn btn-outline-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('&nbsp;<i class="far fa-edit"></i> Sumário &nbsp;', ['action' => 'editSumario', $idea->id], ['class' => 'btn btn-outline-info btn-sm', 'escape' => false]) ?>
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