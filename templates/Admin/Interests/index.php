<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Interest[]|\Cake\Collection\CollectionInterface $interests
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Interesses', 'url' => ['controller' => 'interests', 'action' => 'index']]
    ]);
?>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <?= $this->Html->link("Novo Interesse", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <h3 class="card-title">Lista de Interesses</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th><?= $this->Paginator->sort('interesse') ?></th>
                    <th class="actions"><?= 'Ações' ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($interests as $interest) : ?>
                    <tr>
                        <td><?= h($interest->interesse) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $interest->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $interest->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $interest->id], ['confirm' => __("Are you sure you want to delete '".$interest->interesse."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
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