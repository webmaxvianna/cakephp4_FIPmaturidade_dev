<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resume $resume
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-user-tie"></i>
                            &nbsp;<?= h($user->nome_completo) . " / Id: " . h($user->id) ?>
                            <small class="float-right">Criado em: <?= h($user->created) ?></small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Currículo</h4>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <tr>
                                        <th><?= __('Área de Atuação') ?></th>
                                        <td><?= h($user->resume->area_atuacao) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Currículo Resumido') ?></th>
                                        <td><?= h($user->resume->curriculo) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>