<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Especialidades', 'url' => ['controller' => 'specialties', 'action' => 'index']],
        ['title' => 'Vincular-Desvincular Consultores']
    ]);
?>
<!-- /.Breadcrumbs -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $specialty->especialidade ?></h3>
                <?= $this->Form->create($specialty) ?>
              </div>
              <div class="card-body">
              <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>Jurados:</th>
                  </tr>
               </thead>
               <tbody>
                <tr>
                    <th>
                    <fieldset>
                    <?php                    
                        echo $this->Form->control('users._ids', [
                            'options' => $jurados,
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            'label' => false
                            ]);
                    ?>
                    </fieldset>
                    </th>
                </tr>
                <tr>
                    <th><?= $this->Form->button(__('Alterar'),['class'=>'btn btn-primary']) ?></th>
                </tr>
                </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>