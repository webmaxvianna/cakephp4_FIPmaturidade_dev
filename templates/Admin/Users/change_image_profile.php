<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manager $manager
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => $title_for_layout]
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <?= $this->Form->create($user, ['type' => 'file']) ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header cursor-pointer" data-toggle="collapse" href="#body2">
                        <h3 class="card-title"><?= $title_for_layout ?></h3>
                    </div>
                    <div class="card-body collapse show" id="body2">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('foto perfil', ['class' => 'form-control mb-2', 'type' => 'file', 'name' => 'profile_image']);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <?= $this->Form->button(__('Alterar'),['class'=>'btn btn-block btn-primary my-2 w-15']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
