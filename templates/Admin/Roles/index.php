<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Funções') ?></h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('funcao','Função') ?></th>
                    <th><?= $this->Paginator->sort('created','Criado em') ?></th>
                    <th><?= $this->Paginator->sort('modified','Modificado em') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= h($role->funcao) ?></td>
                    <td><?= h($role->created) ?></td>
                    <td><?= h($role->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
