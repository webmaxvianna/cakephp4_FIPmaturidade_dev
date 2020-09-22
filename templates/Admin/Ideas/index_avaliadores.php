<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IdeaUsers[]|\Cake\Collection\CollectionInterface $ideasUser
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
                        <h2 class="card-title">Lista de ideias para serem avaliadas</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('Ideas.titulo', 'Título') ?></th>
                                <th><?= $this->Paginator->sort('Users.nome_completo', 'Autor') ?></th>
                                <th><?= $this->Paginator->sort('Ideas.status', 'Status') ?></th>
                                <th class="actions"><?= 'Ações' ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ideasUsers as $ideasUser): ?>
                            <tr>
                                <td><?= $ideasUser->has('idea') ? h($ideasUser->idea->titulo) : '' ?></td>
                                <td><?= $ideasUser->has('user') ? h($ideasUser->user->nome_completo) : '' ?></td>
                                <td>
                                    <?php 
                                        switch ($ideasUser->idea->status) {
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
                                    ?>
                                </td>
                                <td class="actions text-nowrap">
                                    <?= $this->Html->link('<i class="far fa-eye"></i> Visualizar', ['action' => 'view', $ideasUser->idea->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                                    <?= $this->Html->link('<i class="fas fa-gavel"></i> Adicionar Nota', ['controller' => 'Appraisals', 'action' => 'add', $ideasUser->idea_id], ['class' => 'btn btn-secondary btn-sm', 'escape' => false]) ?>
                                    <?= $this->Html->link('<i class="fas fa-gavel"></i> Listar Notas', ['controller' => 'Appraisals', 'action' => 'index', $ideasUser->idea_id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>   
                <?= $this->element('pagination') ?>
            </div>
        </div>
    </div>
</section>



