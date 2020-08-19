<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ideas[]|\Cake\Collection\CollectionInterface $ideas
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Minhas Ideias', 'url' => ['controller' => 'Users', 'action' => 'applicantIdeas', $user->id]]
]);

$ideas = $user->my_ideas;
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= $this->Html->link("Nova Ideia", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                        <h3 class="mb-0">Minhas Ideias</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                    <?php
                                    $first = true;
                                    foreach ($ideas as $idea) {
                                    ?>
                                        <a class="nav-link <?php if ($first) {
                                                                $first = false;
                                                                echo 'active';
                                                            } ?> " id="vert-tabs-<?= $idea->titulo ?>-tab" data-toggle="pill" href="#vert-tabs-<?= $idea->titulo ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><?= $idea->titulo ?> <span class="badge badge-<?php if ($idea->status == 1) echo 'primary'; ?>"><?= $idea->status ?></span></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content py-2" id="vert-tabs-tabContent">
                                    <?php
                                    $first = true;
                                    foreach ($ideas as $idea) { ?>
                                        <div class="tab-pane fade <?php if ($first) {
                                                                        $first = false;
                                                                        echo 'active show';
                                                                    } ?> " id="vert-tabs-<?= $idea->titulo ?>" role="tabpanel" aria-labelledby="vert-tabs-<?= $idea->titulo ?>-tab">
                                            <?= $idea->descricao ?>
                                        </div>
                                    <?php } ?>


                                </div>
                            </div>
                        </div>
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