<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']],
        ['title' => 'Vincular-Desvincular Jurados']
    ]);
?>
<!-- /.Breadcrumbs -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Título da ideia: <?= $idea->titulo ?></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= $this->Form->create($idea) ?>
                <fieldset>
                    <legend>Jurados:</legend>
                    <?php                    
                        echo $this->Form->control('jurors._ids', [
                            'options' => $jurados,
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            'label' => false
                            ]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Designar'), ['class' => 'btn btn-primary w-15']) ?>
                <?= $this->Form->end() ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->