<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parameter $parameter
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Parâmetros', 'url' => ['controller' => 'parameters', 'action' => 'index']],
        ['title' => 'Adicionar']
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
                <h3 class="card-title">Adicionar Parâmetro</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= $this->Form->create($parameter) ?>
                <div class="card-body">
                    <div class="form-group" >
                        <?php
                            echo $this->Form->control('item', [
                                'class' => 'form-control mb-2' 
                            ]);
                        ?>  
                        </div>                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?= $this->Form->button(__('Salvar Parâmetro'),['class'=>'btn btn-primary col-md-6 offset-3']) ?>
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