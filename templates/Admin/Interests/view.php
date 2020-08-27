<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Interest $interest
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Interesses', 'url' => ['controller' => 'interests', 'action' => 'index']],
    ['title' => 'Detalhes']
]);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-user-tie"></i>
                            &nbsp;<?= h($interest->interesse) ?>
                            <small class="float-right">Criado em: <?= h($interest->created) ?></small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Detalhes</h4>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <tr>
                                        <th><?= __('Interesse') ?></th>
                                        <td><?= h($interest->interesse) ?></td>
                                    </tr>                                    
                                    <tr>
                                        <th><?= __('Última modificação') ?></th>
                                        <td><?= h($interest->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Candidatos Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($interest->users)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($interest->users as $applicants) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $applicants->id ?>">
                                                        <?= $applicants->nome_completo ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

