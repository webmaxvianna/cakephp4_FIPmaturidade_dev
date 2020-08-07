<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
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
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Especialidade</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div> -->
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
                    <?= $this->Form->button(__('Adicionar Especialidade'),['class'=>'btn btn-primary']) ?>
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
