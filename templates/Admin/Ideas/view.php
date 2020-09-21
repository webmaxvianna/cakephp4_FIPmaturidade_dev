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
    ['title' => 'Visualizar']
]);
?>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h2>
                    <?= h($idea->titulo) ?>                    
                  </h2>
                  <small class="float-right">Criado em: <?= h($idea->created) ?></small>
                  <p>
                    Status: 
                    <?php 
                      switch ($idea->status) {
                        case '0':
                            echo '<span class="badge badge-secondary badge-pill pl-2 pr-2">&nbsp;&nbsp; inativo &nbsp;&nbsp;</span>';
                        break;
                        case '1':
                            echo '<span class="badge badge-warning badge-pill pl-2 pr-2">&nbsp;&nbsp; em edição &nbsp;&nbsp;</span>';
                            break;
                        case '2':
                            echo '<span class="badge badge-success badge-pill pl-2 pr-2">&nbsp;&nbsp; finalizado &nbsp;&nbsp;</span>';
                            break;
                      }
                    ?>
                  </p>
                  <p>Autor(a): <?= $this->Html->link($idea->owner->nome_completo, ['controller' => 'users', 'action' => 'view', $idea->owner->id]) ?></p>
                  <p>Edital: <?= $this->Html->link($idea->edict->numero, $idea->edict->link, ['target' => '_blank']) ?></p>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">              
                <div class="col-sm-12 invoice-col">
                  <h5><i class="fas fa-video"></i> Link do vídeo:</h5>
                  <p><?= $this->Html->link($idea->link_video, $idea->link_video, ['target' => '_blank']) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Descrição:</h5>
                  <p><?= h($idea->descricao) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h2>
                    Canvas                  
                  </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">              
                <div class="col-sm-12 invoice-col">
                  <h5>Atividades principais:</h5>
                  <p><?= h($idea->canvas_atividades) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Propostas de valor:</h5>
                  <p><?= h($idea->canvas_propostas) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->              
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Relacionamento com clientes:</h5>
                  <p><?= h($idea->canvas_relacionamentos) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Recursos principais:</h5>
                  <p><?= h($idea->canvas_recursos) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Canais:</h5>
                  <p><?= h($idea->canvas_canais) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Parcerias Chaves:</h5>
                  <p><?= h($idea->canvas_parceriaschaves) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Segmentos de Mercado:</h5>
                  <p><?= h($idea->canvas_segmentosdemercado) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Estrutura de Custos:</h5>
                  <p><?= h($idea->canvas_estruturadecusto) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Fontes de Renda:</h5>
                  <p><?= h($idea->canvas_fontesderenda) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h2>
                    Sumário Executivo                  
                  </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">              
                <div class="col-sm-12 invoice-col">
                  <h5>Segredo:</h5>
                  <p><?= h($idea->sumario_segredo) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Problema:</h5>
                  <p><?= h($idea->sumario_problema) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->              
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Solução:</h5>
                  <p><?= h($idea->sumario_solucao) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Oportunidade:</h5>
                  <p><?= h($idea->sumario_oportunidade) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Vantagem Competitiva:</h5>
                  <p><?= h($idea->sumario_vontadecompetitiva) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- info row -->
              <hr/>
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <h5>Modelo:</h5>
                  <p><?= h($idea->sumario_modelo) ?></p>                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->