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
    ['title' => 'Adicionar nota']
]);
?>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><?= __('Adicionar pontuação') ?></h3>
                </div>
                <div class="card-body">
                    <div class="appraisals form content">
                    <?php  
                        $myTemplates = [
                            'radioWrapper' => '<div class="form-check">{{label}}</div>',
                            'nestingLabel' => '{{hidden}}{{input}}<label class="form-check-label">{{text}}</label>',
                            'error' => '<div class="error invalid-feedback">{{content}}</div>',
                        ];
                        $this->Form->setTemplates($myTemplates);
                        $this->Form->setConfig('errorClass', 'is-invalid');
                    ?>
                        <?= $this->Form->create($appraisal) ?>
                        <?php
                            if ($parameters == null) {
                                echo '<p class="lead text-center mt-5 mb-5">Todos os itens já foram avaliados!</p>';
                            } else {
                                echo $this->Form->control('parameter_id', [
                                    'options' => $parameters, 
                                    'type' => 'radio',
                                    'class' => 'form-check-input', 
                                    'label' => 'Item',
                                ]);
                                echo $this->Form->control('pontuacao', ['class' => 'form-control', 'label' => ['text' => 'Pontuação', 'class' => 'mt-4'], 'type'=> 'number', 'min'=>"0", 'max'=>"5", 'step'=>"0.01"]);
                            }                    
                        ?>
                    </div>
                </div>
                <div class="card-footer">                
                    <?php
                        if ($parameters != null) {
                            echo $this->Form->button(__('Adicionar nota'), ['class' => 'btn btn-block btn-primary col-md-6 offset-md-3']); 
                        }
                    ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>