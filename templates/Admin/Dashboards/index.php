<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <h3>Olá, <?= $userLogged->nome_completo ?>!</h3>
                <p class="lead">Seja <?= ($userLogged->sexo == 'Masculino') ? 'bem-vindo' : 'bem-vinda' ?> ao Sistema de Maturidade.</p>
                <p class="lead">
                  Aqui você pode cadastrar sua ideia de negócio e consultar os editais publicados.
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
                <li><?= $documentos ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Envie seus comprovantes de documentos</li>
                <li><?= $ideia ? '<i class="text-success fas fa-check-square"></i>&nbsp;&nbsp;' : '<i class="text-default far fa-square"></i>&nbsp;&nbsp;' ?>Crie e preencha todos os campos referentes a sua ideia</li>
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