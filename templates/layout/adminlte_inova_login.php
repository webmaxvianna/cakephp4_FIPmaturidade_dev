<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($title_for_layout) ? $title_for_layout : ''; ?> | Sistema de Maturidade</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->

  <?= 
    $this->Html->css([
      '/adminlte/plugins/fontawesome-free/css/all.min', 
      '/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min',
      '/adminlte/dist/css/adminlte',
      '/adminlte/dist/css/ionicons.min'
    ]) 
  ?>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

  <?= $this->fetch('content') ?>

<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<?= 
  $this->Html->script([ 
    '/adminlte/plugins/jquery/jquery.min',
    '/adminlte/plugins/bootstrap/js/bootstrap.bundle.min',
    '/adminlte/dist/js/adminlte'
  ]) 
?>

</body>
</html>