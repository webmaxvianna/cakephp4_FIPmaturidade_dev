<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Especialidades', 'url' => ['controller' => 'specialties', 'action' => 'index']]
    ]);
?>
<!-- /.Breadcrumbs -->
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                        <?= $this->Html->link("Nova Especialidade", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                <h3 class="card-title">Lista de Especialidades</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><?= $this->Paginator->sort('especialidade') ?></th>
                    <th class="actions"><?= 'Vincular / Desvincular' ?></th>
                    <th class="actions"><?= 'Ações' ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($specialties as $specialty): ?>
                    <tr>
                        <td><?= h($specialty->especialidade) ?></td>
                        <td>
                            <?= $this->Html->link(__('Avaliadores'), ['action' => 'vincularAvaliadores', $specialty->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                            <?= $this->Html->link(__('Consultores'), ['action' => 'vincularConsultores', $specialty->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                            <?= $this->Html->link(__('Jurados'), ['action' => 'vincularJurados', $specialty->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $specialty->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $specialty->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $specialty->id], ['confirm' => __("Are you sure you want to delete '".$specialty->especialidade."'?"), 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>
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
