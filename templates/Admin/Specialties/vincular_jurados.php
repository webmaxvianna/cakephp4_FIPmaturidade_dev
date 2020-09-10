<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Especialidades', 'url' => ['controller' => 'specialties', 'action' => 'index']],
        ['title' =>'Vincular Jurados']
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
                        <h3 class="card-title">Vincular ou Desvincular Jurados</h3>
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
                    <?= $this->Form->create($specialty) ?>
                    <div class="card-body collapse show" id="card1">
                        <div>
                            <h2><?= $specialty->titulo ?></h2>
                            <p class="lead">Lista de jurados:</p>
                        </div>
                        <div class="form-group">
                        <?php                    
                            echo $this->Form->control('users._ids', [
                                'options' => $jurados,
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