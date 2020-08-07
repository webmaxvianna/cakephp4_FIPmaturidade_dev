<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edict $edict
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Editais', 'url' => ['controller' => 'edicts', 'action' => 'index']],
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
                <h3 class="card-title">Adicionar Edital</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= $this->Form->create($edict) ?>
                <div class="card-body">

                    <div class="form-group">
                        <?php
                            echo $this->Form->control('numero', ['class' => 'form-control col-3 mb-2', 
                            'id' => 'exampleInputEmail1',
                            'placeholder' => 'Número',
                            'label' => ['text' => 'Número', 'label' => 'control-label']]);
                            echo $this->Form->control('link', ['class' => 'form-control col-3 mb-2', 
                            'id' => 'exampleInputEmail1',
                            'placeholder' => 'Link',
                            'label' => ['text' => 'Link', 'label' => 'control-label']]);
                            echo $this->Form->control('edital', ['class' => 'form-control col-3 mb-2', 
                            'id' => 'exampleInputEmail1',
                            'placeholder' => 'Edital',
                            'label' => ['text' => 'Edital', 'label' => 'control-label']]);
                            echo $this->Form->control('manager_id', ['class' => 'form-control col-3 mb-2', 
                            'options' => $users,
                            'placeholder' => 'Manager',
                            'label' => ['text' => 'Gerente', 'label' => 'control-label']]);
                        ?>    
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= $this->Form->button(__('Salvar Alterações'),['class'=>'btn btn-primary w-15']) ?>
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
