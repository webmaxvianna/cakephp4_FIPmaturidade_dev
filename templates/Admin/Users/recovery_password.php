<body class="hold-transition register-page">
<div class="register-box mb-5">
  <div class="register-logo mt-5">
    <?= $this->Html->image('Logo_Inova_Prudente.png') ?>
  </div>

  <div>
    <?= $this->Flash->render() ?>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg lead">Recuperar acesso ao sistema</p>
      <p>
        Informe seu email ou nome de usuário(username) cadastrado que enviaremos, para sua conta de email, 
        um link permitindo a alteração de sua senha. 
      </p>

      <?= $this->Form->create() ?>
        <div class="">
          <?php
              echo $this->Form->control('keyword', ['label' => 'Email ou Username', 'class' => 'form-control mb-2']);
          ?>
          <div class="col-md-6 offset-md-3">
              <?= $this->Form->button(__('Enviar'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
          </div>
        </div>
        <?= $this->Form->end() ?>

      <hr/>
      <?= $this->Html->link('Retornar para a tela de login', ['action' => 'login'], ['class' => 'text-center']) ?>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->