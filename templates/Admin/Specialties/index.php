<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Especialidades']
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
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-striped table-hover">
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
                        <?= $this->Html->link(__('Avaliadores'), ['action' => 'vincularAvaliadores', $specialty->id], ['class' => 'btn btn-outline-primary btn-sm mb-1']) ?>
                        <?= $this->Html->link(__('Consultores'), ['action' => 'vincularConsultores', $specialty->id], ['class' => 'btn btn-outline-primary btn-sm mb-1']) ?>
                        <?= $this->Html->link(__('Jurados'), ['action' => 'vincularJurados', $specialty->id], ['class' => 'btn btn-outline-primary btn-sm mb-1']) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['action' => 'view', $specialty->id], ['class' => 'btn btn-info btn-sm mb-1', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="far fa-edit"></i> editar', ['action' => 'edit', $specialty->id], ['class' => 'btn btn-warning btn-sm mb-1', 'escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="far fa-trash-alt"></i> excluir', ['action' => 'delete', $specialty->id], ['confirm' => __("Are you sure you want to delete '".$specialty->especialidade."'?"), 'class' => 'btn btn-danger btn-sm mb-1', 'escape' => false]) ?>
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
