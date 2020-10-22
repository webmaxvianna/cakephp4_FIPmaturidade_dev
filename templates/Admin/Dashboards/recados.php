<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' =>'Recados']
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
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card2">
                        <h3 class="card-title">Mural de recados</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?= $this->Form->create($recados) ?>
                    <div class="card-body collapse show" id="card2">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('candidatos', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Mensagem',
                                'label' => ['text' => 'Para os candidatos:', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('avaliadores', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Mensagem',
                                'label' => ['text' => 'Para os avaliadores:', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('jurados', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Mensagem',
                                'label' => ['text' => 'Para os jurados:', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('consultores', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Mensagem',
                                'label' => ['text' => 'Para os consultores:', 'label' => 'control-label']
                            ]);
                            ?>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?= $this->Form->button(__('Salvar recados'), ['class' => 'btn btn-block btn-primary col-md-6 offset-md-3']) ?>
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