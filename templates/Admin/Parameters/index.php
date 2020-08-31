<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parameter[]|\Cake\Collection\CollectionInterface $parameters
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= $this->Html->link("Novo Parâmetro", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                        <h3 class="card-title">Lista de Parâmetros de Avaliação</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('item') ?></th>
                                    <th class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($parameters as $parameter): ?>
                                <tr>
                                    <td><?= h($parameter->item) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $parameter->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $parameter->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $parameter->id], ['confirm' => __("Tem certeza que deseja deletar '".$parameter->item."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
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
