<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Usuários']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= $this->Html->link("Novo Usuário", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                        <h3 class="card-title">Lista de Usuários</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('nome_completo') ?></th>
                                    <th><?= $this->Paginator->sort('email') ?></th>
                                    <th><?= $this->Paginator->sort('username') ?></th>
                                    <th><?= $this->Paginator->sort('status') ?></th>
                                    <th><?= $this->Paginator->sort('role_id', 'Função') ?></th>
                                    <th><?= $this->Paginator->sort('modalidade', 'Modalidade') ?></th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= h($user->nome_completo) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= $user->status == 1 ? '<span class="badge badge-success badge-pill pl-2 pr-2">&nbsp;&nbsp; ativo &nbsp;&nbsp;</span>' : '<span class="badge badge-secondary badge-pill pl-2 pr-2">&nbsp; inativo &nbsp;</span>'; ?></td>
                                    <td><?= h($user->role->funcao) ?></td>
                                    <td><?= h($user->modalidade) ?></td>
                                    <td class="actions text-nowrap">
                                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $user->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $user->id], ['confirm' => __("Tem certeza que quer deletar o gestor '".$user->username."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
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