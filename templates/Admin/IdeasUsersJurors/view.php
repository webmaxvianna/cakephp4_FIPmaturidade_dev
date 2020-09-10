<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Idea $idea
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Ideias', 'url' => ['controller' => 'ideasUsersJurors', 'action' => 'index', $userLogged['id']]],
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
                            <i class="fas fa-lightbulb"></i>
                            &nbsp;<?= h($ideasUsersJuror->idea->descricao) ?>
                            <small class="float-right">Criado em: <?= h($ideasUsersJuror->idea->created) ?></small>
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
                                        <td><?= h($ideasUsersJuror->idea->autor_nome) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Titulo') ?></th>
                                        <td><?= h($ideasUsersJuror->idea->titulo) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Link do Video') ?></th>
                                        <td><?= h($ideasUsersJuror->idea->link_video) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Última modificação') ?></th>
                                        <td><?= h($ideasUsersJuror->idea->modified) ?></td>
                                    </tr>
                                </table>
                                <div class="text">
                                    <strong><?= __('Descrição') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->descricao)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Atividades') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_atividades)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Propostas') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_propostas)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Relacionamentos') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_relacionamentos)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Recursos') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_recursos)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Canais') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_canais)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Parcerias Chaves') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_parceriaschaves)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Segmentos De Mercado') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_segmentosdemercado)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Estrutura De Custo') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_estruturadecusto)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Canvas: Fontes De Renda') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->canvas_fontesderenda)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumário: O Segredo') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->sumario_segredo)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumário: O Problema') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->sumario_problema)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumário: A Solução') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->sumario_solucao)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumário: A Oportunidade') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->sumario_oportunidade)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumário: Sua Vantagem Competitiva') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->sumario_vontadecompetitiva)); ?>
                                    </blockquote>
                                </div>
                                <div class="text">
                                    <strong><?= __('Sumário: O Modelo') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($ideasUsersJuror->idea->sumario_modelo)); ?>
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