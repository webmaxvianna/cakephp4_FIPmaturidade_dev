<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Especialidades', 'url' => ['controller' => 'specialties', 'action' => 'index']],
        ['title' => 'Vincular-Desvincular Consultores']
    ]);
?>
<!-- /.Breadcrumbs -->

<h3><?= $specialty->especialidade ?></h3>
<?= $this->Form->create($specialty) ?>
<fieldset>
    <legend>Consultores</legend>
    <?php                    
        echo $this->Form->control('users._ids', [
            'options' => $jurados,
            'type' => 'select',
            'multiple' => 'checkbox',
            'label' => false
            ]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>