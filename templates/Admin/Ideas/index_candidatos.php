<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea[]|\Cake\Collection\CollectionInterface $ideas
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']]
    ]);
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?= $this->Html->link("Nova Ideia", ['action' => 'add', $userLogged->id], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <h2 class="card-title">Lista de Ideias</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><?= $this->Paginator->sort('titulo','Título') ?></th>
                <th><?= $this->Paginator->sort('user_id', 'Autor') ?></th>         
                <th><?= $this->Paginator->sort('numero','Número do edital') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ideas as $idea): ?>
                <tr>
                    <td><?= h($idea->titulo) ?></td>
                    <td><?= h($idea->owner->nome_completo) ?></td>
                    <td><?= h($idea->edict->numero) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $idea->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $idea->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
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