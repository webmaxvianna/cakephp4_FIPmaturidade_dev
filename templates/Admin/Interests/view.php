<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic $characteristic
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Interesses', 'url' => ['controller' => 'interests', 'action' => 'index']],
        ['title' =>'Visualizar']
    ]);
?>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Visualizar Interesse</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p class="">
                    <h5>Interesse:</h5>
                    <h4>"<?= h($interest->interesse) ?>"</h4>
                    <table id="example1" class="table table-bordered table-striped">                
                </p>
                <hr/>
                <p class="mt-5">
                    <h5>Candidatos relacionados</h5>
                </p>
                <table id="example1" class="table table-bordered table-striped">
                  <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>                        
                        <td>
                        <?php
                            if ($user->user->status) {
                                $class = 'img-fluid img-circle border border-success';
                            } else {
                                $class = 'img-fluid img-circle border-2 border-default';
                            }
                            echo $this->Html->image($user->user->foto ? $user->user->foto : 'usuarios/padrao.png', ['fullBase' => true, 'class' => $class, 'alt' => 'User profile picture', 'style' => 'height: 50px; ']);
                            ?>
                        </td>
                        <td>
                            <p class="lead">
                                <?= h($user->user->nome_completo) ?>    
                            </p>                            
                        </td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="far fa-eye"></i> visualizar', ['controller' => 'users', 'action' => 'view', $user->user->id], ['class' => 'btn btn-info btn-sm', 'escape' => false]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <?= $this->element('pagination') ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->