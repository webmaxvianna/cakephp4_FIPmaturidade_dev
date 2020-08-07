<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Categorias', 'url' => ['controller' => 'managers', 'action' => 'index']],
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
                            <i class="fas fa-list-ul"></i>
                            &nbsp;<?= h($category->item) . " / Id: ". h($category->id) ?>
                            <small class="float-right">Criado em: <?= h($category->created) ?></small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edições Relacionadas</h4>
                                    </div>
                                    <?php if (!empty($category->edicts)) : ?>
                                    <div class=" card-body">
                                        <ul>
                                            <?php foreach ($category->edicts as $edict) : ?>
                                            <li data-toggle="tooltip" data-placement="top"
                                                title="<?= "Id: ".$edict->id ?>">
                                                <?= $this->Html->link("Edição nº ".$edict->numero, ['controller' => 'edicts', 'action' => 'view', $edict->id]); ?>
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
                                        <h4>Pitches Relacionados</h4>
                                    </div>
                                    <?php if (!empty($category->pitches)) : ?>
                                    <div class=" card-body">
                                        <ul>
                                            <?php foreach ($category->pitches as $pitch) : ?>
                                            <li data-toggle="tooltip" data-placement="left"
                                                title="<?php "Id: ".$pitch->id ?>">
                                                <?php $this->Html->link($pitch->idea->titulo, ['controller' => 'pitches', 'action' => 'view', $pitch->id]); ?>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Dados da Categoria</h4>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <tr>
                                        <th><?= __('Item') ?></th>
                                        <td><?= h($category->item) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <td><?= $this->Number->format($category->id) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created') ?></th>
                                        <td><?= h($category->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified') ?></th>
                                        <td><?= h($category->modified) ?></td>
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