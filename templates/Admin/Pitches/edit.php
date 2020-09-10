<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitch $pitch
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Ideias', 'url' => ['controller' => 'ideasusersjurors', 'action' => 'index', $userLogged['id']]],
    ['title' => 'Editar nota']
]);
?>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4><?= __('Editar pontuação') ?></h4>
        </div>
        <div class="card-body">
            <div class="pitches form content">
                <?= $this->Form->create($pitch) ?>
                <fieldset class="p-0">
                    <?php
                    echo $this->Form->control('id_jurado', ['options' => $jurado, 'class' => 'form-control mb-2', 'label' => ['text' => 'Jurado']]);
                    echo $this->Form->control('idea_id', ['options' => $ideas, 'class' => 'form-control mb-2', 'label' => ['text' => 'Ideia']]);
                    echo $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control mb-2', 'label' => ['text' => 'Critério']]);
                    echo $this->Form->control('pontuacao', ['class' => 'form-control mb-2', 'label' => ['text' => 'Pontuação'], 'type'=> 'number', 'min'=>"0", 'max'=>"5", 'step'=>"0.01"]);
                ?>
                </fieldset>
                <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary mt-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</section>