<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown mr-3">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?= $userLogged->nome_completo ?>&nbsp;&nbsp;<i class="fas fa-chevron-circle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Perfil: <?= strtoupper($userLogged->role->funcao) ?></span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <?= $this->Html->link('<i class="fas fa-envelope mr-2"></i>Editar perfil', ['controller' => 'users', 'action' => 'edit', $userLogged->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <?= $this->Html->link('<i class="fas fa-envelope mr-2"></i>Alterar senha', ['controller' => 'users', 'action' => 'changepass', $userLogged->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
          </a>
          <div class="dropdown-divider"></div>
            <?= $this->Html->link('<i class="fas fa-sign-out-alt"></i> Sair do sistema', ['controller' => 'users', 'action' => 'logout'], ['class' => 'dropdown-item dropdown-footer', 'escape' => false]) ?>
        </div>
      </li>
    </ul>
  </nav>