<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']],
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
                        <h3 class="card-title">Editar Ideia</h3>
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
                            echo $this->Form->control('status', [
                                'options' => ['0' => 'Inativo', '1' => 'Em edição', '2' => 'Finalizado'],
                                'type' => 'select',
                                'class' => 'form-control mb-2',
                                'label' => 'Status'
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
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Atividades principais',
                                'label' => ['text' => 'Atividades principais', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_propostas', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Propostas de valor',
                                'label' => ['text' => 'Propostas de valor', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_relacionamentos', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Relacionamento com clientes',
                                'label' => ['text' => 'Relacionamento com clientes', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_recursos', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Recursos principais',
                                'label' => ['text' => 'Recursos principais', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_canais', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Canais',
                                'label' => ['text' => 'Canais', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_parceriaschaves', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Parcerias Chave',
                                'label' => ['text' => 'Parcerias Chave', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_segmentosdemercado', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Segmentos de mercado',
                                'label' => ['text' => 'Segmentos de mercado', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_estruturadecusto', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Estrutura de Custos',
                                'label' => ['text' => 'Estrutura de Custos', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_fontesderenda', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Fontes de renda',
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
                        <h3 class="card-title">Sumário Executivo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body collapse show" id="card3">
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
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Vantagem Competitiva',
                                'label' => ['text' => 'Vantagem Competitiva', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_modelo', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Modelo',
                                'label' => ['text' => 'Modelo', 'label' => 'control-label']
                            ]);
                            ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?= $this->Form->button(__('Salvar Ideia'), ['class' => 'btn btn-block btn-primary col-md-6 offset-md-3']) ?>
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