<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="img-fluid"> -->
      <?= $this->Html->image('Logo_Inova_Prudente.png', ['class' => 'img-fluid', 'alt' => 'AdminLTE Logo']) ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          <?= $this->Html->image('/adminlte/dist/img/user2-160x160.jpg', ['url' => ['controller' => 'users', 'action' => 'view', $userLogged['id']], 'class' => 'img-circle elevation-2', 'alt' => 'User Image']) ?>
        </div>
        <div class="info">
          <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $userLogged['id']]); ?>" class="d-block"><?= $userLogged['nome_completo'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-5 pb-5">
        <b>JURADO</b>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>