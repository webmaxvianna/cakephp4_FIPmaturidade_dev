<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Adicionar Ideias']
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
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#card1">
                        <h3 class="card-title">Adicionar Ideia</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?= $this->Form->create($idea) ?>
                    <div class="card-body collapse show" id="card1">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('titulo', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Titulo',
                                'label' => ['text' => 'Título', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('status', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Status',
                                'label' => ['text' => 'Status', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('descricao', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Descrição',
                                'label' => ['text' => 'Descrição', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('link_video', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'URL',
                                'label' => ['text' => 'Vídeo', 'label' => 'control-label']
                            ]);

                            ?>
                        </div>
                        <div>
                            <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary w-15']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!--/.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->