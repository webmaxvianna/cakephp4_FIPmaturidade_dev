<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']],
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
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card1">
                        <h3 class="card-title">Editar Ideia</h3>
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

                    </div>
                    <!-- /.card-body -->
                </div>
                <!--/.card -->
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card2">
                        <h3 class="card-title">Canvas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body collapse show" id="card2">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('canvas_atividades', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Atividades',
                                'label' => ['text' => 'Atividades', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_propostas', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Propostas',
                                'label' => ['text' => 'Propostas', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_relacionamentos', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Relacionamntos',
                                'label' => ['text' => 'Relacionamntos', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_recursos', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Recursos',
                                'label' => ['text' => 'Recursos', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_canais', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Canais',
                                'label' => ['text' => 'Canais', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_parceriaschaves', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Parcerias Chave',
                                'label' => ['text' => 'Parcerias Chave', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_segmentosdemercado', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Segmentos',
                                'label' => ['text' => 'Segmentos de mercado', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_estruturadecusto', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Estrutura',
                                'label' => ['text' => 'Estrutura de Custo', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_fontesderenda', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Fontes de renda',
                                'label' => ['text' => 'Fontes de renda', 'label' => 'control-label']
                            ]);
                            ?>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-secondary">
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card3">
                        <h3 class="card-title">Sumário</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body collapse show" id="card3">
                        <div class="form-group">
                            <?php
                            echo $this->Form->control('sumario_segredo', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Segredo',
                                'label' => ['text' => 'Segredo', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_problema', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Problema',
                                'label' => ['text' => 'Problema', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_solucao', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Solução',
                                'label' => ['text' => 'Solução', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_oportunidade', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Oportunidade',
                                'label' => ['text' => 'Oportunidade', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_vontadecompetitiva', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Vontade Competitiva',
                                'label' => ['text' => 'Vontade Competitiva', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_modelo', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Modelo',
                                'label' => ['text' => 'Modelo', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('observacoes', [
                                'class' => 'form-control col-3 mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Observações',
                                'label' => ['text' => 'Observações', 'label' => 'control-label']
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