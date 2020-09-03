<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IdeaUsers[]|\Cake\Collection\CollectionInterface $ideasUser
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'ideasusers', 'action' => 'index', $userLogged['id']]]
    ]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Lista de ideias para serem avaliadas</h2>
                <?= $this->Html->link("Listar notas", ['controller' => 'Appraisals', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
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
                <?php foreach ($ideasUsers as $ideasUser): ?>
                <tr>
                    <td><?= $ideasUser->has('idea') ? h($ideasUser->idea->titulo) : '' ?></td>
                    <td><?= $ideasUser->has('user') ? h($ideasUser->idea->descricao) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> Visualizar', ['action' => 'view', $ideasUser->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-gavel"></i> Adicionar Nota', ['controller' => 'Appraisals', 'action' => 'add', $ideasUser->idea_id], ['class' => 'btn btn-secondary btn-sm', 'escape' => false]) ?>
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



