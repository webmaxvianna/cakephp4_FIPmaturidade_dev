<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitch[]|\Cake\Collection\CollectionInterface $pitches
 */
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <?= $this->Html->link(__('Novo Pitch'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
                        <h3><?= __('Pitches') ?></h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id') ?></th>
                                    <th><?= $this->Paginator->sort('pontuacao', 'Pontuação') ?></th>
                                    <th><?= $this->Paginator->sort('category_id', 'Categoria') ?></th>
                                    <th><?= $this->Paginator->sort('juror_id', 'Jurado') ?></th>
                                    <th><?= $this->Paginator->sort('idea_id', 'Ideia') ?></th>
                                    <th class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pitches as $pitch): ?>
                                <tr>
                                    <td><?= $this->Number->format($pitch->id) ?></td>
                                    <td><?= $this->Number->format($pitch->pontuacao) ?></td>
                                    <td><?= $pitch->has('category') ? $this->Html->link($pitch->category->id, ['controller' => 'Categories', 'action' => 'view', $pitch->category->id]) : '' ?></td>
                                    <td><?= $pitch->has('juror') ? $this->Html->link($pitch->juror->id, ['controller' => 'Jurors', 'action' => 'view', $pitch->juror->id]) : '' ?></td>
                                    <td><?= $pitch->has('idea') ? $this->Html->link($pitch->idea->id, ['controller' => 'Ideas', 'action' => 'view', $pitch->idea->id]) : '' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $pitch->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $pitch->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $pitch->id], ['confirm' => __("Tem certeza que deseja deletar '".$pitch->especialidade."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->element('paginator') ?>
    </div>
</div>
