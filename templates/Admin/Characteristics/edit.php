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
        ['title' =>'Editar']
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= $this->Form->button(__('Salvar Alterações'),['class'=>'btn btn-primary col-md-6 offset-md-3']) ?>                    
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