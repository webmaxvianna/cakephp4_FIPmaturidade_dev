<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h3>Olá, <?= h($userLogged->nome_completo) ?>!</h3>
                <?php
                  switch ($userLogged->sexo) {
                    case 'Masculino':
                      $sexo = 'o';
                      break;
                    case 'Feminino':
                      $sexo = 'a';
                      break;
                    default:
                      $sexo = 'o(a)';
                      break;
                  }
                ?>
                <p class="lead">Seja bem-vind<?= h($sexo) ?> ao Sistema de Maturidade.</p>
                <p class="lead">
                <?php
                  switch ($userLogged->role->funcao) {
                    case 'Candidato':
                      echo 'Aqui você pode cadastrar sua ideia de negócio e consultar os editais publicados.';
                      break;
                    case 'Gestor':
                      echo 'Aqui você pode ver todos os usuários cadastrados, publicar editais e ter controle total das ideias e atividades.';
                      break;
                    case 'Avaliador':
                      echo 'Texto para avaliador';
                      break;
                    case 'Consultor':
                      echo 'Texto para consultor';
                      break;
                    case 'Jurado':
                      echo 'Texto para jurado';
                      break;
                  }
                ?>
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="callout callout-info">
              <h5>Primeiros passos:</h5>
              <ul class="list-unstyled">
                <li><?= ($userLogged->confirmacao_email == 1) ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Confirme seu endereço de email</li>
                <li><?= $dados_pessoais ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Complete o preenchimento dos seus dados pessoais</li>
                <li><?= $userLogged->foto ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Insira uma foto de perfil</li>
                <?php if ($userLogged->role->funcao == 'Candidato') : ?>
                  <li><?= $documentos ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Envie seus comprovantes de documentos</li>
                  <li><?= $ideia ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Crie e preencha todos os campos referentes a sua ideia</li>
                <?php endif; ?>
              </ul>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->