<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'Ideas', 'action' => 'listIdeas', $userLogged->id]],
        ['title' =>'Editar']
    ]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col">
                <!-- general form elements disabled -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-briefcase"></i> Sumário Executivo</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?= $this->Form->create($idea) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('sumario_segredo', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Segredo',
                                'label' => ['text' => 'Segredo', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_problema', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Problema',
                                'label' => ['text' => 'Problema', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_solucao', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Solução',
                                'label' => ['text' => 'Solução', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_oportunidade', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Oportunidade',
                                'label' => ['text' => 'Oportunidade', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_vontadecompetitiva', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Vontade Competitiva',
                                'label' => ['text' => 'Vontade Competitiva', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_modelo', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Modelo',
                                'label' => ['text' => 'Modelo', 'label' => 'control-label']
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary w-15']) ?>
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