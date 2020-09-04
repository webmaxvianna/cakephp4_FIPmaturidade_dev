<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="img-fluid"> -->
      <?= $this->Html->image('Logo_Inova_Prudente.png', ['class' => 'img-fluid', 'alt' => 'AdminLTE Logo']) ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-5 pb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'dashboards', 'action' => 'index']) ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Início
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'edicts', 'action' => 'listEdicts']) ?>" class="nav-link">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                Editais
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'ideasusers', 'action' => 'index', $userLogged['id']]); ?>" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                Ideias
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?= $this->Url->build(['controller' => 'appraisals', 'action' => 'index']); ?>" class="nav-link">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                Avaliações
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>