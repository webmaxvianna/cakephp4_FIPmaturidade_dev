<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edict $edict
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Editais', 'url' => ['controller' => 'edicts', 'action' => 'index']],
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
                <h3 class="card-title">Adicionar Edital</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php  
                $myTemplates = [
                    'error' => '<div class="error invalid-feedback">{{content}}</div>',
                ];
                $this->Form->setTemplates($myTemplates);
                $this->Form->setConfig('errorClass', 'is-invalid');
            ?>
            <?= $this->Form->create($edict, ['type' => 'file']) ?>
                <div class="card-body">
                    <div class="form-group">
                        <?php
                            echo $this->Form->control('numero', ['class' => 'form-control mb-2', 
                            'id' => 'exampleInputEmail1',
                            'placeholder' => 'Número',
                            'label' => ['text' => 'Número do edital', 'label' => 'control-label']]);
                            echo $this->Form->control('link', [
                                'type' => 'file',
                                'class' => 'form-control mb-2', 
                                'id' => 'exampleInputEmail1',
                                'placeholder' => 'Link',
                                'label' => ['text' => 'Arquivo do edital <small>(Apenas arquivos PDF)</small>', 'label' => 'control-label'],
                                'escape' => false]);
                        ?>    
                    </div>                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= $this->Form->button(__('Salvar Edital'),['class'=>'btn btn-primary col-md-6 offset-md-3']) ?>
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
