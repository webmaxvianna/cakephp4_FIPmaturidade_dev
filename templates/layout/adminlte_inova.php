<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($title_for_layout) ? $title_for_layout : ''; ?> | Sistema de Maturidade</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/plugins/summernote/summernote-bs4.css"> -->
  <?= 
    $this->Html->css([
      '/adminlte/plugins/fontawesome-free/css/all.min', 
      '/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min',
      '/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min',
      '/adminlte/plugins/jqvmap/jqvmap.min',
      '/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min',
      '/adminlte/plugins/daterangepicker/daterangepicker'
    ]) 
  ?>
  <!-- <?= $this->Html->css(['/adminlte/plugins/summernote/summernote-bs4']) ?> -->

  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../webroot/adminlte/dist/css/adminlte.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <?= 
    $this->Html->css([
      '/adminlte/dist/css/adminlte',
      '/adminlte/dist/css/ionicons.min'
    ]) 
  ?>
  <?= 
    $this->Html->css([
      'custom-style'
    ]) 
  ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?= $this->element('adminlte_navbar_inova') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php switch ($userLogged->role->funcao) {
      case 'Gestor':
        echo $this->element('adminlte_sidebar_inova_gestor');
      break;
      case 'Candidato':
        echo $this->element('adminlte_sidebar_inova_candidato');
      break;
      case 'Avaliador':
        echo $this->element('adminlte_sidebar_inova_avaliador');
      break;
      case 'Consultor':
        echo $this->element('adminlte_sidebar_inova_consultor');
      break;
      case 'Jurado':
        echo $this->element('adminlte_sidebar_inova_jurado');
      break;
    } 
  ?>

  
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark"></h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- Breadcrumbs -->
            <?php
              $this->Breadcrumbs->setTemplates([
                'wrapper' => '<ol class="breadcrumb float-sm-right">{{content}}</ol>',
                'item' => '<li class="breadcrumb-item"><a href="{{url}}">{{title}}</a></li>',
                'itemWithoutLink' => '<li class="breadcrumb-item">{{title}}</li>'
              ]); 
              echo $this->Breadcrumbs->render(); 
            ?><!-- /.Breadcrumbs -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Flash message -->
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <?php
          if (empty($userLogged->confirmacao_email)) : ?>
            <div class="alert alert-info alert-dismissible">
            <div class="lead">
                    <i class="fas fa-info-circle"></i>&nbsp;Confirmação de email.
                </div>
                <div class="">
                    Verifique sua conta de email e faça a confirmação do endereço de email cadastrado no sistema.<br/>
                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'sendConfirmationEmail', $userLogged->id]) ?>">Clique aqui para enviar outro email de confirmação.</a>
                </div> 
            </div>
          <?php endif; ?>
        <?= $this->Flash->render() ?>
      </div>
    </div>
    <!-- /.flash message -->

    <!-- Main content -->
      <?= $this->fetch('content') ?>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->  

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="../../webroot/adminlte/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="../../webroot/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<?= 
  $this->Html->script([
    '/adminlte/plugins/jquery/jquery.min', 
    '/adminlte/plugins/jquery-ui/jquery-ui.min'
  ]) 
?>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<!-- <script src="../../webroot/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../../webroot/adminlte/dist/js/adminlte.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../../webroot/adminlte/dist/js/pages/dashboard.js"></script> -->
<?= 
  $this->Html->script([ 
    '/adminlte/plugins/bootstrap/js/bootstrap.bundle.min',
    '/adminlte/dist/js/adminlte',
    '/adminlte/dist/js/pages/dashboard'
  ]) 
?>

<!-- ChartJS -->
<!-- <script src="../../webroot/adminlte/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="../../webroot/adminlte/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="../../webroot/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="../../webroot/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="../../webroot/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="../../webroot/adminlte/plugins/moment/moment.min.js"></script> -->
<!-- <script src="../../webroot/adminlte/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="../../webroot/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="../../webroot/adminlte/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="../../webroot/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<?= 
  $this->Html->script([ 
    '/adminlte/plugins/chart.js/Chart.min',
    '/adminlte/plugins/sparklines/sparkline',
    '/adminlte/plugins/jqvmap/jquery.vmap.min',
    '/adminlte/plugins/jqvmap/maps/jquery.vmap.usa',
    '/adminlte/plugins/jquery-knob/jquery.knob.min',
    '/adminlte/plugins/moment/moment.min',
    '/adminlte/plugins/daterangepicker/daterangepicker',
    '/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min',
    '/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min'
  ]) 
?>
<!-- <?= $this->Html->script(['/adminlte/plugins/summernote/summernote-bs4.min']) ?> -->

</body>
</html>
