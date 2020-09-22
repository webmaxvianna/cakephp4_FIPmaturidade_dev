<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pitch[]|\Cake\Collection\CollectionInterface $pitches
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Início', 'url' => ['controller' => 'dashboards', 'action' => 'index']],
    ['title' => 'Ideias', 'url' => ['controller' => 'ideas', 'action' => 'index_jurados', $userLogged['id']]],
    ['title' => 'Notas']
]);
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <?= $this->Html->link(__('Novo Pitch'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
                        <h3 class="card-title"><?='Pitches'?></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('idea_id', 'Ideia') ?></th>
                                    <th><?= $this->Paginator->sort('category_id', 'Critério') ?></th>
                                    <th><?= $this->Paginator->sort('pontuacao', 'Pontuação') ?></th>
                                    <th class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pitches as $pitch): ?>
                                <tr>
                                    <td><?= $pitch->idea->titulo ?></td>
                                    <td><?= $pitch->category->item ?></td>
                                    <td><?= $this->Number->format($pitch->pontuacao) ?></td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Editar'), ['controller' => 'Pitches', 'action' => 'edit', $pitch->id, $pitch->idea->id], ['class' => 'btn btn-warning btn-sm', 'escape' => false]) ?>
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