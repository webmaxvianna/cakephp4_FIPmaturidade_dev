<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<!-- Breadcrumbs -->
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Categorias', 'url' => ['controller' => 'categories', 'action' => 'index']],
        ['title' => 'Adicionar']
    ]);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Adicionar Categoria</h3>
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create($category) ?>
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('item', ['class' => 'form-control mb-2']);
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= $this->Form->button(__('Editar'),['class'=>'btn btn-primary w-15']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>