<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Edict $edict
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
                            &nbsp;<?= h($user->edicts->numero) . " / Id: " . h($user->edicts->id) ?>
                            <small class="float-right">Criado em: <?= h($user->edicts->created) ?></small>
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
                                        <th><?= __('Link') ?></th>
                                        <td><?= h($edicts->link) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Última Modificação') ?></th>
                                        <td><?= h($edicts->modified) ?></td>
                                    </tr>
                                </table>
                                <div class="text">
                                    <strong><?= __('Edital') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($edicts->edital)); ?>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>