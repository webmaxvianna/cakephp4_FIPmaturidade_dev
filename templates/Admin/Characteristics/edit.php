<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic $characteristic
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Características', 'url' => ['controller' => 'characteristics', 'action' => 'index']],
        ['title' =>'Adicionar']
    ]);
?>
<!-- Main content --> 
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- column -->
      <div class="col-md-10 offset-md-1">
        <!-- general form elements disabled -->
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Editar Característica</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= $this->Form->create($characteristic) ?>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                            echo $this->Form->control('sobre', [
                                'class' => 'form-control mb-2', 
                                'rows' => '5',
                                'placeholder' => 'Sobre',
                                'label' => 'Sobre'
                            ]);
                        ?>    
                    </div>
                    <div class="col-md-3 offset-md-0">
                        <?= $this->Form->button(__('Editar Característica'),['class'=>'btn btn-primary btn-block']) ?>                    
                    </div>
                </div>
                <!-- /.card-body -->
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