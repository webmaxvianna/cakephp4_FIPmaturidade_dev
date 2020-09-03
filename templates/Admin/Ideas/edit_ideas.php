<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'indexCandidatos', $userLogged->id]],
        ['title' =>'Editar Ideia']
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
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card1">
                        <h3 class="card-title">Ideia</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?= $this->Form->create($idea) ?>
                    <div class="card-body collapse show" id="card1">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('titulo', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Titulo',
                                'label' => ['text' => 'Título', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('descricao', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Descrição',
                                'label' => ['text' => 'Descrição', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('link_video', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'URL',
                                'label' => ['text' => 'Vídeo', 'label' => 'control-label']
                            ]);

                            ?>
                        </div>

                    </div>
                    <!-- /.card-body -->
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