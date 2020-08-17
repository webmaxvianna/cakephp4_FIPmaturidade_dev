<body class="hold-transition login-page">
<!-- login-box -->
<div class="login-box">
  <div class="login-logo">
    <?= $this->Html->image('Logo_Inova_Prudente.png') ?>
  </div>
  <!-- /.login-logo -->
  <div>
    <?= $this->Flash->render() ?>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?= $this->Form->create() ?>
        <div class="">
          <?php
              echo $this->Form->control('username', ['class' => 'form-control mb-2']);
              echo $this->Form->control('password', ['class' => 'form-control mb-2']);
          ?>
          <div class="col-md-6 offset-md-3">
              <?= $this->Form->button(__('Acessar'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
          </div>
        </div>
      <?= $this->Form->end() ?>
    <hr/>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <?= $this->Html->link('Register a new membership', ['action' => 'registerApplicant'], ['class' => 'text-center']) ?>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->