<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Characteristic $characteristic
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Características', 'url' => ['controller' => 'characteristic', 'action' => 'index']],
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
                            &nbsp;<?="Id: " . h($characteristic->id) ?>
                            <small class="float-right">Criado em: <?= h($characteristic->created) ?></small>
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
                                        <th><?= __('Sobre') ?></th>
                                        <td><?= h($characteristic->sobre) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Última modificação') ?></th>
                                        <td><?= h($characteristic->modified) ?></td>
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
                                    <?php if (!empty($characteristic->applicants)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($characteristic->applicants as $applicants) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $applicants->id ?>">
                                                        <?= $this->Html->link($applicants->nome_completo, ['controller' => 'applicants', 'action' => 'view', $applicants->id]); ?>
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