<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index']],
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
                            &nbsp;<?= h($idea->descricao) . " / Id: " . h($idea->id) ?>
                            <small class="float-right">Criado em: <?= h($idea->created) ?></small>
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
                                        <th><?= __('Autor Nome') ?></th>
                                        <td><?= h($idea->autor_nome) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Titulo') ?></th>
                                        <td><?= h($idea->titulo) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Link do Video') ?></th>
                                        <td><?= h($idea->link_video) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Edital') ?></th>
                                        <td><?= $idea->has('edict') ? $this->Html->link($idea->edict->id, ['controller' => 'Edicts', 'action' => 'view', $idea->edict->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Candidato') ?></th>
                                        <td><?= $idea->has('applicant') ? $this->Html->link($idea->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $idea->applicant->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Status') ?></th>
                                        <td><?= $this->Number->format($idea->status) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Última modificação') ?></th>
                                        <td><?= h($idea->modified) ?></td>
                                    </tr>
                                </table>
                                <div class="text">
                                    <strong><?= __('Descricao') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->descricao)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Atividades') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_atividades)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Propostas') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_propostas)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Relacionamentos') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_relacionamentos)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Recursos') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_recursos)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Canais') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_canais)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Parceriaschaves') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_parceriaschaves)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Segmentosdemercado') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_segmentosdemercado)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Estruturadecusto') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_estruturadecusto)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas Fontesderenda') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->canvas_fontesderenda)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumario Segredo') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->sumario_segredo)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumario Problema') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->sumario_problema)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumario Solucao') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->sumario_solucao)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumario Oportunidade') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->sumario_oportunidade)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumario Vontadecompetitiva') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->sumario_vontadecompetitiva)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumario Modelo') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->sumario_modelo)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Observacoes') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($idea->observacoes)); ?>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Candidatos Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($idea->appraiser)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($idea->appraisers as $appraiser) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $appraiser->id ?>">
                                                        <?= $this->Html->link($appraiser->nome_completo, ['controller' => 'appraisers', 'action' => 'view', $appraiser->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Avaliadores Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($idea->appraisals)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($idea->appraisals as $appraisals) : ?>
                                                    <li data-toggle="tooltip" data-placement="left" title="<?php "Id: " . $appraisals->id ?>">
                                                        <?php $this->Html->link($appraisals->nome_completo, ['controller' => 'appraisals', 'action' => 'view', $appraisals->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Confidentials Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($idea->confidentials)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($idea->confidentials as $confidentials) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $confidentials->id ?>">
                                                        <?= $this->Html->link($confidentials->idea_id, ['controller' => 'confidentials', 'action' => 'view', $confidentials->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Evid^ncias Relacionadas') ?></h4>
                                    </div>
                                    <?php if (!empty($idea->evidences)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($idea->evidences as $evidences) : ?>
                                                    <li data-toggle="tooltip" data-placement="left" title="<?php "Id: " . $evidences->id ?>">
                                                        <?php $this->Html->link($evidences->nome_completo, ['controller' => 'evidences', 'action' => 'view', $evidences->id]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <h5 class="mx-auto my-3 text-secondary">Nenhum dado encontrado!</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Pitches Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($idea->pitches)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($idea->pitches as $pitches) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $pitches->id ?>">
                                                        <?= $this->Html->link($pitches->nome_completo, ['controller' => 'pitches', 'action' => 'view', $pitches->id]); ?>
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