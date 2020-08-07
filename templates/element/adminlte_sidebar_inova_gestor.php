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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'roles', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Funções
              </p>
            </a>
          </li>
                    
          <li class="nav-header"></li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'ideas', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Ideias
              </p>
            </a>
          </li>
          
          <li class="nav-header"></li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'edicts', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Editais
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'tasks', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Atividades
              </p>
            </a>
          </li>
          
          <li class="nav-header"></li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'characteristics', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Características
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'interests', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Interesses
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'specialties', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Especialidades
              </p>
            </a>
          </li>
          
          <li class="nav-header">Parâmetros</li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'parameters', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Avaliação
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'categories', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pitching
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>