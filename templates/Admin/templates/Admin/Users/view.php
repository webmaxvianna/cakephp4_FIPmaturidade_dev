<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\user $user
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Candidatos', 'url' => ['controller' => 'users', 'action' => 'index']],
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
                            &nbsp;<?= h($user->nome_completo) . " / Id: " . h($user->id) ?>
                            <small class="float-right">Criado em: <?= h($user->created) ?></small>
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
                                        <th><?= __('Nome') ?></th>
                                        <td><?= h($user->nome) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Sobrenome') ?></th>
                                        <td><?= h($user->sobrenome) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Sexo') ?></th>
                                        <td><?= h($user->sexo) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Email') ?></th>
                                        <td><?= h($user->email) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Username') ?></th>
                                        <td><?= h($user->username) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Password') ?></th>
                                        <td><?= h($user->password) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Foto') ?></th>
                                        <td><?= h($user->foto) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Cpf') ?></th>
                                        <td><?= h($user->cpf) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Rg') ?></th>
                                        <td><?= h($user->rg) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Facebook') ?></th>
                                        <td><?= h($user->facebook) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Linkedin') ?></th>
                                        <td><?= h($user->linkedin) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Instagram') ?></th>
                                        <td><?= h($user->instagram) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Lattes') ?></th>
                                        <td><?= h($user->lattes) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Telefone 1') ?></th>
                                        <td><?= h($user->telefone1) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Telefone 2') ?></th>
                                        <td><?= h($user->telefone2) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Cep') ?></th>
                                        <td><?= h($user->cep) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Logradouro') ?></th>
                                        <td><?= h($user->logradouro) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Numero') ?></th>
                                        <td><?= h($user->numero) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Complemento') ?></th>
                                        <td><?= h($user->complemento) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Bairro') ?></th>
                                        <td><?= h($user->bairro) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Cidade') ?></th>
                                        <td><?= h($user->cidade) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Estado') ?></th>
                                        <td><?= h($user->estado) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Pais') ?></th>
                                        <td><?= h($user->pais) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Função') ?></th>
                                        <td><?= h($user->role->funcao) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Status') ?></th>
                                        <td><?= $this->Number->format($user->status) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Data Nascimento') ?></th>
                                        <td><?= h($user->data_nascimento) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Última modificação') ?></th>
                                        <td><?= h($user->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= __('Ideias Relacionadas') ?></h4>
                                    </div>
                                    <?php if (!empty($user->ideas)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($user->ideas as $ideas) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $ideas->id ?>">
                                                        <?= $this->Html->link($ideas->titulo, ['controller' => 'ideas', 'action' => 'view', $ideas->id]); ?>
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
                                        <h4><?= __('Editais Relacionados') ?></h4>
                                    </div>
                                    <?php if (!empty($user->resumes)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($user->resumes as $resumes) : ?>
                                                    <li data-toggle="tooltip" data-placement="left" title="<?php "Id: " . $resumes->id ?>">
                                                        <?php $this->Html->link($resumes->curriculo, ['controller' => 'resumes', 'action' => 'view', $resumes->id]); ?>
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
                                        <h4><?= __('Verificações relacionadas') ?></h4>
                                    </div>
                                    <?php if (!empty($user->verifications)) : ?>
                                        <div class=" card-body">
                                            <ul>
                                                <?php foreach ($user->verifications as $verifications) : ?>
                                                    <li data-toggle="tooltip" data-placement="top" title="<?= "Id: " . $verifications->id ?>">
                                                        <?= $this->Html->link($verifications->id, ['controller' => 'verifications', 'action' => 'view', $verifications->id]); ?>
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


