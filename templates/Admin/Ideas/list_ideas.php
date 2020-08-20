<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ideas[]|\Cake\Collection\CollectionInterface $ideas
 */
?>
<?php

$filteredEdicts;

foreach ($ideas as $idea) {
    foreach ($edicts as $edict) {
        if ($idea->edict_id == $edict->id)
            $filteredEdicts[$idea->id] = $edict;
    }
}

$this->Breadcrumbs->add([
    ['title' => 'Minhas Ideias']
]);
?>
<!-- Main content -->
<section class="content" id="ApplicantIdeas">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= $this->Html->link("Nova Ideia", ['action' => 'add'], ['class' => 'btn btn-sm btn-primary float-right']) ?>
                        <h3 class="mb-0">Minhas Ideias</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                    <?php
                                    $first = true;
                                    foreach ($ideas as $idea) {
                                    ?>
                                        <a class="nav-link <?php if ($first) {
                                                                $first = false;
                                                                echo 'active';
                                                            } ?> " id="vert-tabs-<?= $idea->titulo ?>-tab" data-toggle="pill" href="#vert-tabs-<?= $idea->titulo ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><?= $idea->titulo ?> <span class="badge badge-pill badge-<?php if ($idea->status == 1) echo 'primary'; ?>"><?= $idea->status ?></span></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-9">
                                <div class="tab-content py-2 px-4" id="vert-tabs-tabContent">
                                    <?php
                                    $first = true;
                                    foreach ($ideas as $idea) { ?>
                                        <div class="tab-pane fade <?php if ($first) {
                                                                        $first = false;
                                                                        echo 'active show';
                                                                    } ?> " id="vert-tabs-<?= $idea->titulo ?>" role="tabpanel" aria-labelledby="vert-tabs-<?= $idea->titulo ?>-tab">
                                            <div class="row">
                                                <div class="col-12 col-sm-8">
                                                    <h3 class="mb-3">
                                                        <?= $idea->titulo ?> - Edital <?= $filteredEdicts[$idea->id]->numero ?>
                                                        <span class="badge badge-pill badge-<?php if ($idea->status == 1) echo 'primary'; ?>" style="transform: translateY(-3px); font-size: 1rem;"><?= $idea->status ?></span>
                                                    </h3>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <h3><a href="<?= $idea->link_video ?>" target="_blank" class="float-left float-sm-right mb-3" style="font-size: 1.5rem;"><i class="fab fa-youtube"></i> Vídeo</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p><?= $idea->descricao ?></p>
                                            <span><b>Observações:</b> <?= !empty($idea->observacoes) ? $idea->observacoes : "Sem observações" ?></span>
                                            <div class="row py-4">
                                                <div class=" col-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h4 class="mb-0">
                                                                <i class="fas fa-table"></i> Canvas
                                                            </h4>
                                                        </div>
                                                        <div class="card-body table-responsive">
                                                            <table class="table table-sm">
                                                                <tr>
                                                                    <th>Atividades</th>
                                                                    <td><?= $idea->canvas_atividades ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Propostas</th>
                                                                    <td><?= $idea->canvas_propostas ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Relacionamentos</th>
                                                                    <td><?= $idea->canvas_relacionamentos ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Recursos</th>
                                                                    <td><?= $idea->canvas_recursos ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Canais</th>
                                                                    <td><?= $idea->canvas_canais ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Parcerias Chaves</th>
                                                                    <td><?= $idea->canvas_parceriaschaves ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Segmentos de Mercado</th>
                                                                    <td><?= $idea->canvas_segmentosdemercado ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Estrutura de Custo</th>
                                                                    <td><?= $idea->canvas_estruturadecusto ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Fontes de Renda</th>
                                                                    <td><?= $idea->canvas_fontesderenda ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <h4>
                                                                        <i class="fas fa-briefcase"></i> Sumário Executivo
                                                                    </h4>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <?= $this->Html->link('<i class="far fa-edit"></i> Editar', ['controller'=> 'Ideas','action' => 'editSumario', $idea->id], ['class' => 'btn btn-warning btn-sm float-left float-sm-right', 'escape' => false]) ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body table-responsive">
                                                            <table class="table table-sm">
                                                                <tr>
                                                                    <th>Segredo</th>
                                                                    <td><?= $idea->sumario_segredo ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Problema</th>
                                                                    <td><?= $idea->sumario_problema ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Solução</th>
                                                                    <td><?= $idea->sumario_solucao ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Oportunidade</th>
                                                                    <td><?= $idea->sumario_oportunidade ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Vontade Competitiva</th>
                                                                    <td><?= $idea->sumario_vontadecompetitiva ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Modelo</th>
                                                                    <td><?= $idea->sumario_modelo ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
<!-- /.content -->