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
      <p class="login-box-msg lead">Cadastrar novo candidato</p> 
      <?php  
        $myTemplates = [
            'checkboxWrapper' => '<div class="form-check">{{label}}</div>',
            'nestingLabel' => '{{hidden}}{{input}}<label class="form-check-label">{{text}}</label>',
            'error' => '<div class="error invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);
        $this->Form->setConfig('errorClass', 'is-invalid');
      ?>
      <?= $this->Form->create($user) ?>
        <div class="">
          <?php
              
              echo $this->Form->control('nome', ['label' => 'Nome', 'class' => 'form-control mb-2']);
              echo $this->Form->control('sobrenome', ['label' => 'Sobrenome', 'class' => 'form-control mb-2']);
              echo $this->Form->control('username', ['label' => 'Nome de usuário <small>(username)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
              echo $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control mb-2']);
              echo $this->Form->control('password', ['label' => 'Senha <small>(password)</small>', 'class' => 'form-control mb-2', 'escape' => false]);
              echo $this->Form->control('confirm_password', ['label' => 'Confirmar senha', 'class' => 'form-control mb-2', 'type' => 'password']);
          ?>
          <div class="col-md-6 offset-md-3">
              <?= $this->Form->button(__('Registrar'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
          </div>
        </div>
        <?= $this->Form->end() ?>

      <hr/>
      <?= $this->Html->link('Eu já tenho um cadastro de candidato', ['action' => 'login'], ['class' => 'text-center']) ?>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->