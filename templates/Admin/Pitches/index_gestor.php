<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appraisal[]|\Cake\Collection\CollectionInterface $appraisals
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Pitching']
]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Notas dos pitches realizados</h2>
                </div>
                <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('idea_id', 'Ideia') ?></th>
                                <th><?= $this->Paginator->sort('category_id', 'Critério') ?></th>
                                <th><?= $this->Paginator->sort('pontuacao', 'Pontuação') ?></th>
                                <th><?= $this->Paginator->sort('id_jurado', 'ID Jurado') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pitches as $pitch): ?>
                            <tr>
                                <td><?=$pitch->idea->titulo?></td>
                                <td><?=$pitch->category->item?></td>
                                <td><?= $this->Number->format($pitch->pontuacao) ?></td>
                                <td><?=$pitch->id_jurado?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= $this->element('pagination') ?>
</div>
</section>