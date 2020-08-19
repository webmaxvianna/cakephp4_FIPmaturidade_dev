<!-- Main content -->
<div class="container">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row mt-3">
            <div class="col-12">
                <h4>
                <i class="fas fa-globe"></i> <?= h($specialty->especialidade) ?>
                <small class="float-right">Criado em: <?= h($specialty->created) ?></small>
                </h4>
            </div>
        </div>

        <!-- Table row -->
        <div class="row mt-4">
            <div class="col-4">
                <p class="lead">Avaliadores</p>
                <div class="table-responsive">
                    <table class="table">
                        <?php foreach ($specialty->users as $users) : ?>
                            <tr>
                                <td><?= h($users->nome_completo) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <p class="lead">Consultores</p>
                <div class="table-responsive">
                    <table class="table">
                        <?php foreach ($specialty->consultants as $consultants) : ?>
                            <tr>
                                <td><?= h($consultants->nome)." ".h($consultants->sobrenome) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <p class="lead">Jurados</p>
                <div class="table-responsive">
                    <table class="table">
                        <?php foreach ($specialty->jurors as $jurors) : ?>
                            <tr>
                                <td><?= h($jurors->nome)." ".h($jurors->sobrenome) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.Table row -->
    </div>
</div>
<!-- /.invoice -->