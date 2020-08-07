<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic $characteristic
 */
?>
<?php
    $this->Breadcrumbs->add([
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
                <h3 class="card-title">Adicionar Característica</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= $this->Form->create($characteristic) ?>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                            echo $this->Form->control('sobre', ['class' => 'form-control col-3 mb-2', 'rows' => '3',
                            'placeholder' => 'Sobre',
                            'label' => ['text' => 'Sobre', 'label' => 'control-label']]);
                        ?>    
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <?= $this->Form->button(__('Adicionar Característica'),['class'=>'btn btn-primary btn-block']) ?>                    
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