<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitch $pitch
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index_jurados', $userLogged['id']]],
    ['title' => 'Editar nota']
]);
?>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><?= __('Editar pontuação') ?></h3>
                </div>
                <div class="card-body">
                    <div class="pitches form content">
                        <?= $this->Form->create($pitch) ?>
                            <?php
                            echo $this->Form->control('idea_id', ['options' => $ideas, 'class' => 'form-control mb-2', 'label' => ['text' => 'Ideia'] , 'disabled' => true]);
                            echo $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control mb-2', 'label' => ['text' => 'Item'] , 'disabled' => true]);
                            echo $this->Form->control('pontuacao', ['class' => 'form-control mb-2', 'label' => ['text' => 'Pontuação'], 'type'=> 'number', 'min'=>"0", 'max'=>"5", 'step'=>"0.01"]);
                        ?>
                    </div>
                </div>
                <div class="card-footer">
                    <?= $this->Form->button(__('Alterar nota'), ['class' => 'btn btn-block btn-primary col-md-6 offset-md-3']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>