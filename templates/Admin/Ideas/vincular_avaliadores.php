<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']],
        ['title' =>'Vincular Avaliadores']
    ]);
?>
<!-- /.Breadcrumbs -->

<!-- Main content -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-md-8 offset-md-2">
                <!-- general form elements disabled -->
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card3">
                        <h3 class="card-title">Vincular ou Desvincular Avaliadores</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php  
                        $myTemplates = [
                            'checkboxWrapper' => '<div class="form-check">{{label}}</div>',
                            'nestingLabel' => '{{hidden}}{{input}}<label class="form-check-label">{{text}}</label>',
                            'error' => '<div class="error invalid-feedback">{{content}}</div>',
                        ];
                        $this->Form->setTemplates($myTemplates);
                        $this->Form->setConfig('errorClass', 'is-invalid');
                    ?>
                    <?= $this->Form->create($idea) ?>
                    <div class="card-body collapse show" id="card1">
                        <div>
                            <h2><?= $idea->titulo ?></h2>
                            <p class="lead">Lista de avaliadores:</p>
                        </div>
                        <div class="form-group">
                        <?php                    
                            echo $this->Form->control('users._ids', [
                                'options' => $avaliadores,
                                'class' => 'form-check-input',
                                'type' => 'select',
                                'multiple' => 'checkbox',
                                'label' => false
                                ]);
                        ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?= $this->Form->button(__('Salvar vínculos'), ['class' => 'btn btn-primary col-md-6 offset-md-3']) ?>
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