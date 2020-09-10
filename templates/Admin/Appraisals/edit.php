<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appraisal $appraisal
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Ideias', 'url' => ['controller' => 'ideasusers', 'action' => 'index', $userLogged['id']]],
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
            <div class="appraisals form content">
                <?= $this->Form->create($appraisal) ?>
                <fieldset class="p-0">
                    <?php
                    echo $this->Form->control('id_avaliador', ['options' => $avaliador, 'class' => 'form-control mb-2', 'label' => ['text' => 'Avaliador']]);
                    echo $this->Form->control('idea_id', ['options' => $ideas, 'class' => 'form-control mb-2', 'label' => ['text' => 'Ideia']]);
                    echo $this->Form->control('parameter_id', ['options' => $parameters, 'class' => 'form-control mb-2', 'label' => ['text' => 'Critério']]);
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