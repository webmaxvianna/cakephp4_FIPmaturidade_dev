<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Usuários', 'url' => ['controller' => '$managers', 'action' => 'index']]
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= $this->Html->link("Novo Usuário", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                        <h3>Lista de Usuários</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id') ?></th>
                                    <!-- <th><?= $this->Paginator->sort('nome') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('sobrenome') ?></th> -->
                                    <th><?= $this->Paginator->sort('nome_completo') ?></th>
                                    <!-- <th><?= $this->Paginator->sort('data_nascimento') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('sexo') ?></th> -->
                                    <th><?= $this->Paginator->sort('email') ?></th>
                                    <th><?= $this->Paginator->sort('username') ?></th>
                                    <!-- <th><?= $this->Paginator->sort('foto') ?></th> -->
                                    <th><?= $this->Paginator->sort('status') ?></th>
                                    <!-- <th><?= $this->Paginator->sort('confirmacao_email') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('confirmacao_celular') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('cpf') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('rg') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('facebook') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('linkedin') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('instagram') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('lattes') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('telefone1') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('telefone2') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('cep') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('logradouro') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('numero') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('complemento') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('bairro') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('cidade') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('estado') ?></th> -->
                                    <!-- <th><?= $this->Paginator->sort('pais') ?></th> -->
                                    <th><?= $this->Paginator->sort('role_id') ?></th>
                                    <th><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                                    <th><?= $this->Paginator->sort('modified', 'Modificado em') ?></th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $this->Number->format($user->id) ?></td>
                                    <!-- <td><?= h($user->nome) ?></td> -->
                                    <!-- <td><?= h($user->sobrenome) ?></td> -->
                                    <td><?= h($user->nome_completo) ?></td>
                                    <!-- <td><?= h($user->data_nascimento) ?></td> -->
                                    <!-- <td><?= h($user->sexo) ?></td> -->
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->username) ?></td>
                                    <!-- <td><?= h($user->password) ?></td> -->
                                    <!-- <td><?= h($user->foto) ?></td> -->
                                    <td><?= $this->Number->format($user->status) ?></td>
                                    <!-- <td><?= $this->Number->format($user->confirmacao_email) ?></td> -->
                                    <!-- <td><?= $this->Number->format($user->confirmacao_celular) ?></td> -->
                                    <!-- <td><?= h($user->cpf) ?></td> -->
                                    <!-- <td><?= h($user->rg) ?></td> -->
                                    <!-- <td><?= h($user->facebook) ?></td> -->
                                    <!-- <td><?= h($user->linkedin) ?></td> -->
                                    <!-- <td><?= h($user->instagram) ?></td> -->
                                    <!-- <td><?= h($user->lattes) ?></td> -->
                                    <!-- <td><?= h($user->telefone1) ?></td> -->
                                    <!-- <td><?= h($user->telefone2) ?></td> -->
                                    <!-- <td><?= h($user->cep) ?></td> -->
                                    <!-- <td><?= h($user->logradouro) ?></td> -->
                                    <!-- <td><?= h($user->numero) ?></td> -->
                                    <!-- <td><?= h($user->complemento) ?></td> -->
                                    <!-- <td><?= h($user->bairro) ?></td> -->
                                    <!-- <td><?= h($user->cidade) ?></td> -->
                                    <!-- <td><?= h($user->estado) ?></td> -->
                                    <!-- <td><?= h($user->pais) ?></td> -->
                                    <td><?= h($user->role->funcao) ?></td>
                                    <td><?= h($user->created) ?></td>
                                    <td><?= h($user->modified) ?></td>
                                    <td class="actions text-nowrap">
                                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $user->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $user->id], ['confirm' => __("Tem certeza que quer deletar o gestor '".$user->id."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
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