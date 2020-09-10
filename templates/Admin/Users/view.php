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
              <h2><?= $user->nome_completo ?></h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info mb-4">
            <div class="col-sm-4 invoice-col">
              <b>Nome de usuário:</b> <?= $user->username ?><br>
              <b>Função:</b> <?= $user->role->funcao ?><br>
              <b>Email:</b> <?= $user->email ?> <?= $user->confirmacao_email ? '<i class="text-success fas fa-check"></i>' : '' ?><br>
              <b>Data de nascimento:</b> <?= $user->data_nascimento ?><br>
              <b>Sexo:</b> <?= $user->sexo ?><br>
              <b>RG:</b> <?= $user->rg ?><br>
              <b>CPF:</b> <?= $user->cpf ?><br>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Telefone 1:</b> <?= $user->telefone1 ?><br>
              <b>Telefone 2:</b> <?= $user->telefone2 ?><br>
              <b>Facebook:</b> <?= $user->facebook ?><br>
              <b>LinkedIn:</b> <?= $user->linkedin ?><br>
              <b>Instagram:</b> <?= $user->instagram ?><br>              
              <b>Currículo Lattes:</b> <?= $user->lattes ?><br>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <address>
                <b>CEP:</b> <?= $user->cep ?><br>
                <b>Endereço:</b> <?= $user->logradouro ?><br>
                <b>Número:</b> <?= $user->numero ?><br>
                <b>Complemento:</b> <?= $user->complemento ?><br>
                <b>Bairro:</b> <?= $user->bairro ?><br>                
                <b>Cidade:</b> <?= $user->cidade ?><br>
                <b>Estado:</b> <?= $user->estado ?><br>
                <b>País:</b> <?= $user->pais ?><br>
              </address>
            </div>
            <!-- /.col -->

            <?php if ($user->role->funcao == 'Candidato') : ?>
              <div class="col-sm-12 invoice-col">              
                <b>Professor Orientador:</b> <?= $user->professor ?><br>
                <b>Currículo Lattes do Professor:</b> <?= $user->professor_lattes ?><br>
              </div>
            <?php endif; ?>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <?php if ($user->role->funcao == 'Candidato') : ?>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
              <h4>Área de atuação</h4>
              <p><?= $user->resume->area_atuacao ?></p>
              <h4>Currículo resumido</h4>
              <p><?= $user->resume->curriculo ?></p>
            </div>
            <!-- /.col -->
          </div>
          <?php endif; ?>
          
          <!-- /.row -->
          <div class="row mt-4">
            <?php if ($user->role->funcao == 'Candidato') : ?>
              <div class="col-sm-6 px-4">
                <h4>Interesses</h4>
                <div class="table-responsive">
                  <table class="table">
                  <?php foreach ($user->interests as $interest) : ?>
                    <tr>
                      <td><?= $interest['interesse'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </table>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 px-4 ">
                <h4>Sobre</h4>
                <div class="table-responsive">
                  <table class="table">
                  <?php foreach ($user->characteristics as $characteristic) : ?>
                    <tr>
                      <td><?= $characteristic['sobre'] ?></td>
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
                      <td><?= $specialty['especialidade'] ?></td>
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
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
