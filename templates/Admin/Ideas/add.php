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
                    <div class="card-header cursor-pointer"data-toggle="collapse" href="#card1">
                        <h3 class="card-title">Adicionar Ideia</h3>
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
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Atividades',
                                'label' => ['text' => 'Atividades', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_propostas', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Propostas',
                                'label' => ['text' => 'Propostas', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_relacionamentos', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Relacionamntos',
                                'label' => ['text' => 'Relacionamntos', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_recursos', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Recursos',
                                'label' => ['text' => 'Recursos', 'label' => 'control-label']
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
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Segmentos',
                                'label' => ['text' => 'Segmentos de mercado', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('canvas_estruturadecusto', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Estrutura',
                                'label' => ['text' => 'Estrutura de Custo', 'label' => 'control-label']
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
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Vontade Competitiva',
                                'label' => ['text' => 'Vontade Competitiva', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('sumario_modelo', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Modelo',
                                'label' => ['text' => 'Modelo', 'label' => 'control-label']
                            ]);
                            echo $this->Form->control('observacoes', [
                                'class' => 'form-control mb-2', 'id' => 'exampleInputEmail1', 'placeholder' => 'Observações',
                                'label' => ['text' => 'Observações', 'label' => 'control-label']
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