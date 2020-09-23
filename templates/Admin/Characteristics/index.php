<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic[]|\Cake\Collection\CollectionInterface $characteristics
 */
?>
<?php
    $this->Breadcrumbs->add([
      ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
      ['title' => 'Características']
    ]);
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
                    <?= $this->Html->link("Nova Característica", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
            <h3 class="card-title">Lista de Características</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
              <th><?= $this->Paginator->sort('sobre') ?></th>
                <th class="actions"><?= 'Ações' ?></th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($characteristics as $characteristic): ?>
                <tr>
                    <td><?= h($characteristic->sobre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $characteristic->id], ['class' => 'btn btn-info btn-sm mb-1', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $characteristic->id], ['class' => 'btn btn-warning btn-sm mb-1', 'escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $characteristic->id], ['confirm' => __("Are you sure you want to delete '".$characteristic->sobre."'?"), 'class' => 'btn btn-danger btn-sm mb-1', 'escape' => false]) ?>
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