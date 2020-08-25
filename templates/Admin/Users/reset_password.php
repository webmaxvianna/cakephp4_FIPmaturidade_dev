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
    <div class="alert alert-info alert-dismissible">
        <div class="">
            <i class="fas fa-info-circle"></i>&nbsp;Alterar senha do username:<br/>"<?= $username ?>"
        </div> 
    </div>
      <p class="login-box-msg lead">Alterar senha</p>

      <?= $this->Form->create($user) ?>
        <div class="">
          <?php
              
              echo $this->Form->control('id', ['type' => 'hidden', 'value' => $id, 'class' => 'form-control mb-2']);
              echo $this->Form->control('password', ['label' => 'Senha <small>(password)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
          ?>
          <div class="mb-4"><small><code>a senha deverá ter 6 ou mais caracteres</code></small></div>
          <div class="col-md-6 offset-md-3">
              <?= $this->Form->button(__('Alterar'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
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