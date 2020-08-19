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
      <p class="login-box-msg">Register a new membership</p>

      <?= $this->Form->create($user) ?>
        <div class="">
          <?php
              
              echo $this->Form->control('nome', ['class' => 'form-control mb-2']);
              echo $this->Form->control('sobrenome', ['class' => 'form-control mb-2']);
              echo $this->Form->control('username', ['class' => 'form-control mb-2']);
              echo $this->Form->control('email', ['class' => 'form-control mb-2']);
              echo $this->Form->control('password', ['class' => 'form-control mb-2']);
              echo $this->Form->control('confirm_password', ['class' => 'form-control mb-2', 'type' => 'password']);
          ?>
          <div class="col-md-6 offset-md-3">
              <?= $this->Form->button(__('Registrar'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
          </div>
        </div>
        <?= $this->Form->end() ?>

      <hr/>
      <?= $this->Html->link('I already have a membership', ['action' => 'login'], ['class' => 'text-center']) ?>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->