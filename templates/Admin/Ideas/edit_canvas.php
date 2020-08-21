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
                        <h3 class="card-title"><i class="fas fa-briefcase"></i>Canvas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?= $this->Form->create($idea) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('canvas_atividades', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Atividades',
                                    'label' => ['text' => 'Atividades', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_propostas', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Propostas',
                                    'label' => ['text' => 'Propostas', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_relacionamentos', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Relacionamntos',
                                    'label' => ['text' => 'Relacionamntos', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_recursos', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Recursos',
                                    'label' => ['text' => 'Recursos', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_canais', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Canais',
                                    'label' => ['text' => 'Canais', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_parceriaschaves', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Parcerias Chave',
                                    'label' => ['text' => 'Parcerias Chave', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_segmentosdemercado', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Segmentos',
                                    'label' => ['text' => 'Segmentos de mercado', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_estruturadecusto', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Estrutura',
                                    'label' => ['text' => 'Estrutura de Custo', 'label' => 'control-label']
                                ]);
                                echo $this->Form->control('canvas_fontesderenda', [
                                    'class' => 'form-control col-12 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Fontes de renda',
                                    'label' => ['text' => 'Fontes de renda', 'label' => 'control-label']
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