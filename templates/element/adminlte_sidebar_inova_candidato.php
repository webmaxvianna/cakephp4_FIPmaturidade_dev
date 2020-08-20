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
          <?= $this->Html->image($userLogged->foto ? $userLogged->foto : 'usuarios/padrao.png', ['url' => ['controller' => 'users', 'action' => 'view', $userLogged->id], 'fullBase' => true, 'class' => 'img-circle elevation-2', 'alt' => 'User Image']) ?>
        </div>
        <div class="info">
          <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $userLogged['id']]); ?>" class="d-block"><?= $userLogged['nome_completo'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-5 pb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= $this->Url->build(['controller' => 'dashboards', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Início
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $userLogged->id]) ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Perfil
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'Ideas', 'action' => 'listIdeas', $userLogged->id]) ?>" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                Ideias
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'resumes', 'action' => 'view', $userLogged->resume]) ?>" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Currículo
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'verificationDocuments', $userLogged->id]) ?>" class="nav-link">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>
                Comprovantes
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'edicts', 'action' => 'view', $userLogged->edicts]) ?>" class="nav-link">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                Editais
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>