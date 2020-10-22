<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parameter $parameter
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
        ['title' => 'Recados']
    ]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Escrever Recado</h3>
                    </div>
                    <?= $this->Form->create($message) ?>
                        <div class="card-body">
                            <div class="form-group" >
                                <?php
                                    echo $this->Form->control('candidatos', [
                                        'class' => 'form-control',
                                        'label' => ['text' => 'Recado para Candidatos', 'label' => 'control-label', 'class' => 'mt-3']
                                    ]);
                                    echo $this->Form->control('avaliadores', [
                                        'class' => 'form-control',
                                        'label' => ['text' => 'Recado para Avaliadores', 'label' => 'control-label', 'class' => 'mt-3']
                                    ]);
                                    echo $this->Form->control('consultores', [
                                        'class' => 'form-control',
                                        'label' => ['text' => 'Recado para Consultores', 'label' => 'control-label', 'class' => 'mt-3']
                                    ]);
                                    echo $this->Form->control('jurados', [
                                        'class' => 'form-control', 
                                        'label' => ['text' => 'Recado para Jurados', 'label' => 'control-label', 'class' => 'mt-3']
                                    ]);
                                ?>  
                            </div>                        
                        </div>
                        <div class="card-footer">
                            <?= $this->Form->button(__('Salvar Alteração'),['class'=>'btn btn-primary col-md-6 offset-3']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>