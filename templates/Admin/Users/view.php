<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Usuários', 'url' => ['controller' => 'users', 'action' => 'index']],
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
            <div class="col-12 mb-2">
            <?php
              if ($user->status) {
                $class = 'profile-user-img img-fluid img-circle border-2 border-success';
              } else {
                $class = 'profile-user-img img-fluid img-circle border-2 border-default';
              }
              echo $this->Html->image($user->foto ? $user->foto : 'usuarios/padrao.png', ['fullBase' => true, 'class' => $class, 'alt' => 'User profile picture']);
            ?>
              <h2><?= h($user->nome_completo) ?></h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info mb-4">
            <div class="col-sm-4 invoice-col">
              <b>Nome de usuário:</b> <?= h($user->username) ?><br>
              <b>Função:</b> <?= h($user->role->funcao) ?><br>
              <?php if ($user->role->funcao == 'Candidato') : ?>
                <b>Modalidade:</b> <?= h($user->modalidade) ?><br>
              <?php endif; ?>
              <b>Email:</b> <?= $user->email ?> <?= h($user->confirmacao_email) ? '<i class="text-success fas fa-check"></i>' : '' ?><br>
              <b>Data de nascimento:</b> <?= h($user->data_nascimento) ?><br>
              <b>Sexo:</b> <?= h($user->sexo) ?><br>
              <b>RG:</b> <?= h($user->rg) ?><br>
              <b>CPF:</b> <?= h($user->cpf) ?><br>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Telefone 1:</b> <?= h($user->telefone1) ?><br>
              <b>Telefone 2:</b> <?= h($user->telefone2) ?><br>
              <b>Facebook:</b> <?= h($user->facebook) ?><br>
              <b>LinkedIn:</b> <?= h($user->linkedin) ?><br>
              <b>Instagram:</b> <?= h($user->instagram) ?><br>              
              <b>Currículo Lattes:</b> <?= h($user->lattes) ?><br>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <address>
                <b>CEP:</b> <?= h($user->cep) ?><br>
                <b>Endereço:</b> <?= h($user->logradouro) ?><br>
                <b>Número:</b> <?= h($user->numero) ?><br>
                <b>Complemento:</b> <?= h($user->complemento) ?><br>
                <b>Bairro:</b> <?= h($user->bairro) ?><br>                
                <b>Cidade:</b> <?= h($user->cidade) ?><br>
                <b>Estado:</b> <?= h($user->estado) ?><br>
                <b>País:</b> <?= h($user->pais) ?><br>
              </address>
            </div>
            <!-- /.col -->

            <?php if ($user->role->funcao == 'Candidato') : ?>
              <div class="col-sm-12 invoice-col">              
                <b>Professor Orientador:</b> <?= h($user->professor) ?><br>
                <b>Currículo Lattes do Professor:</b> <?= h($user->professor_lattes) ?><br>
              </div>
            <?php endif; ?>

            <!-- /.col -->
            <?php if ($user->role->funcao == 'Candidato') : ?>
              <div class="col-sm-12 invoice-col">              
                <b>Nome dos integrantes:</b> <?= str_replace('<br />', ' / ', nl2br(h($user->integrantes))) ?><br>
              </div>
            <?php endif; ?>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <?php if ($user->role->funcao == 'Candidato') : ?>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-md-8 invoice-col pr-3 mb-2">
              <h4><u>Área de atuação</u></h4>
              <p><?= h($user->resume->area_atuacao) ?></p>
              <h4><u>Currículo resumido</u></h4>
              <p><?= h($user->resume->curriculo) ?></p>
            </div>
            <!-- /.col -->
            <div class="col-md-4 invoice-col mb-2">
              <h4 class="mb-3"><u>Comprovantes</u></h4>
              <p class="ml-3">
                Documento de Identidade (frente)<br/>
                <?php
                  if (isset($user->verification->identidade_frente)) {
                    echo $this->Html->link('Visualizar<i class="far fa-file ml-1"></i>', $user->verification->identidade_frente, ['fullBase' => true, 'class' => 'btn btn-success btn-sm mr-1', 'target' => '_blank', 'escape' => false]); 
                  } else {
                    echo '<button class="btn btn-default btn-sm mr-1" disabled="disabled">Visualizar<i class="far fa-file ml-1"></i></button>';
                  }
                ?>                
              </p>
              <hr/>
              <p class="ml-3">
                Documento de Identidade (verso)<br/>
                <?php
                  if (isset($user->verification->identidade_verso)) {
                    echo $this->Html->link('Visualizar<i class="far fa-file ml-1"></i>', $user->verification->identidade_verso, ['fullBase' => true, 'class' => 'btn btn-success btn-sm mr-1', 'target' => '_blank', 'escape' => false]); 
                  } else {
                    echo '<button class="btn btn-default btn-sm mr-1" disabled="disabled">Visualizar<i class="far fa-file ml-1"></i></button>';
                  }
                ?> 
              </p>
              <hr/>
              <p class="ml-3">
                Comprovante de Residência<br/>
                <?php
                  if (isset($user->verification->residencia)) {
                    echo $this->Html->link('Visualizar<i class="far fa-file ml-1"></i>', $user->verification->residencia, ['fullBase' => true, 'class' => 'btn btn-success btn-sm mr-1', 'target' => '_blank', 'escape' => false]); 
                  } else {
                    echo '<button class="btn btn-default btn-sm mr-1" disabled="disabled">Visualizar<i class="far fa-file ml-1"></i></button>';
                  }
                ?> 
              </p>
              <hr/>
              <p class="ml-3">
                Autorização dos Pais ou Responsável<br/>
                <?php
                  if (isset($user->verification->autorizacao_pais)) {
                    echo $this->Html->link('Visualizar<i class="far fa-file ml-1"></i>', $user->verification->autorizacao_pais, ['fullBase' => true, 'class' => 'btn btn-success btn-sm mr-1', 'target' => '_blank', 'escape' => false]); 
                  } else {
                    echo '<button class="btn btn-default btn-sm mr-1" disabled="disabled">Visualizar<i class="far fa-file ml-1"></i></button>';
                  }
                ?> 
              </p>
            </div>
            <!-- /.col -->
          </div>
          <?php endif; ?>
          
          <!-- /.row -->
          <div class="row mt-4">
            <?php if ($user->role->funcao == 'Candidato') : ?>
              <div class="col-sm-6 px-4 mb-2">
                <h4><u>Interesses</u></h4>
                <div class="table-responsive">
                  <table class="table">
                  <?php foreach ($user->interests as $interest) : ?>
                    <tr>
                      <td><?= h($interest['interesse']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </table>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 px-4 mb-2">
                <h4><u>Sobre</u></h4>
                <div class="table-responsive">
                  <table class="table">
                  <?php foreach ($user->characteristics as $characteristic) : ?>
                    <tr>
                      <td><?= h($characteristic['sobre']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            <?php elseif (($user->role->funcao != 'Candidato') && ($user->role->funcao != 'Gestor')): ?>
              <div class="col-sm-12">
                <h4>Especialidades</h4>
                <div class="table-responsive">
                  <table class="table">
                  <?php foreach ($user->specialties as $specialty) : ?>
                    <tr>
                      <td><?= h($specialty['especialidade']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            <?php endif; ?>         
          </div>
          <!-- /.row -->
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->  
    
    <?php if ($user->role->funcao == 'Candidato') : ?>
    <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Lista de Ideias do Candidato</h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th><?= 'Título' ?></th>
                      <th><?= 'Status' ?></th>
                      <th class="actions"><?= 'Ações' ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user->my_ideas as $idea): ?>
                    <tr>
                        <td><?= h($idea->titulo) ?></td>
                        <td>
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
                                if ($idea->status) 
                            ?>
                        </td>
                        <td class="actions">
                          <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['controller' => 'ideas', 'action' => 'view', $idea->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->        
            </div>
            <!-- /.col -->
        </div>
    <!-- /.row -->  
    <?php endif; ?> 
    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
