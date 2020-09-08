<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Especialidades', 'url' => ['controller' => 'specialties', 'action' => 'index']],
        ['title' => 'Adicionar']
    ]);
?>
<!-- /.Breadcrumbs -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- column -->
      <div class="col-md-10 offset-md-1">
        <!-- general form elements disabled -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Adicionar Especialidade</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= $this->Form->create($specialty) ?>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                            echo $this->Form->control('especialidade',[
                                'class' => 'form-control',
                                'label' => ['text' => 'Especialidade', 'label' => 'control-label']
                            ]);
                        ?>    
                    </div>                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= $this->Form->button(__('Salvar Especialidade'),['class'=>'btn btn-primary col-md-6 offset-3']) ?>
                </div>
            <?= $this->Form->end() ?>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
