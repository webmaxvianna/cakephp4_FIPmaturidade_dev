<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Especialidades', 'url' => ['controller' => 'specialties', 'action' => 'index']],
        ['title' => 'Vincular-Desvincular Avaliadores']
    ]);
?>
<!-- /.Breadcrumbs -->

<h3><?= $specialty->especialidade ?></h3>
<?= $this->Form->create($specialty) ?>
<fieldset>
    <legend>Avaliadores</legend>
    <?php                    
        echo $this->Form->control('appraisers._ids', [
            'options' => $avaliadores,
            'type' => 'select',
            'multiple' => 'checkbox',
            'label' => false
            ]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>