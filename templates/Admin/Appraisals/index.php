<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appraisal[]|\Cake\Collection\CollectionInterface $appraisals
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Ideias', 'url' => ['controller' => 'ideasusers', 'action' => 'index', $userLogged['id']]],
    ['title' => 'Notas']
]);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Lista de avaliações realizadas</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('idea_id', 'Ideia') ?></th>
                                <th><?= $this->Paginator->sort('parameter_id', 'Critério') ?></th>
                                <th><?= $this->Paginator->sort('pontuacao', 'Pontuação') ?></th>
                                <th class="actions"><?= __('Ações') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appraisals as $appraisal): ?>
                            <tr>
                                <td><?=$appraisal->idea->titulo?>
                                </td>
                                <td><?=$appraisal->parameter->item?>
                                </td>
                                <td><?= $this->Number->format($appraisal->pontuacao) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Editar'), ['controller' => 'Appraisals', 'action' => 'edit', $appraisal->id, $appraisal->idea->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
                                </td>
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