<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IdeasUsersJuror $ideasUsersJuror
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'ideasusersjurors', 'action' => 'index', $userLogged['id']]]
    ]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Lista de ideias no pitching</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><?= $this->Paginator->sort('Ideas.titulo', 'Título') ?></th>
                <th><?= $this->Paginator->sort('Ideas.descricao', 'Descrição') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ideasUsersJurors as $ideasUsersJuror): ?>
                <tr>
                    <td><?= $ideasUsersJuror->has('idea') ? h($ideasUsersJuror->idea->titulo) : '' ?></td>
                    <td><?= $ideasUsersJuror->has('user') ? h($ideasUsersJuror->idea->descricao) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> Visualizar', ['action' => 'view', $ideasUsersJuror->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-gavel"></i> Adicionar Nota', ['controller' => 'Pitches', 'action' => 'add', $ideasUsersJuror->idea_id], ['class' => 'btn btn-secondary btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-gavel"></i> Listar Notas', ['controller' => 'Pitches', 'action' => 'index', $ideasUsersJuror->idea_id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
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
