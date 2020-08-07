<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles view content">
            <h3><?= h($role->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Funcao') ?></th>
                    <td><?= h($role->funcao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($role->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($role->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($role->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Sobrenome') ?></th>
                            <th><?= __('Nome Completo') ?></th>
                            <th><?= __('Data Nascimento') ?></th>
                            <th><?= __('Sexo') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Foto') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Confirmacao Email') ?></th>
                            <th><?= __('Confirmacao Celular') ?></th>
                            <th><?= __('Cpf') ?></th>
                            <th><?= __('Rg') ?></th>
                            <th><?= __('Facebook') ?></th>
                            <th><?= __('Linkedin') ?></th>
                            <th><?= __('Instagram') ?></th>
                            <th><?= __('Lattes') ?></th>
                            <th><?= __('Telefone1') ?></th>
                            <th><?= __('Telefone2') ?></th>
                            <th><?= __('Cep') ?></th>
                            <th><?= __('Logradouro') ?></th>
                            <th><?= __('Numero') ?></th>
                            <th><?= __('Complemento') ?></th>
                            <th><?= __('Bairro') ?></th>
                            <th><?= __('Cidade') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Pais') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->nome) ?></td>
                            <td><?= h($users->sobrenome) ?></td>
                            <td><?= h($users->nome_completo) ?></td>
                            <td><?= h($users->data_nascimento) ?></td>
                            <td><?= h($users->sexo) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->foto) ?></td>
                            <td><?= h($users->status) ?></td>
                            <td><?= h($users->confirmacao_email) ?></td>
                            <td><?= h($users->confirmacao_celular) ?></td>
                            <td><?= h($users->cpf) ?></td>
                            <td><?= h($users->rg) ?></td>
                            <td><?= h($users->facebook) ?></td>
                            <td><?= h($users->linkedin) ?></td>
                            <td><?= h($users->instagram) ?></td>
                            <td><?= h($users->lattes) ?></td>
                            <td><?= h($users->telefone1) ?></td>
                            <td><?= h($users->telefone2) ?></td>
                            <td><?= h($users->cep) ?></td>
                            <td><?= h($users->logradouro) ?></td>
                            <td><?= h($users->numero) ?></td>
                            <td><?= h($users->complemento) ?></td>
                            <td><?= h($users->bairro) ?></td>
                            <td><?= h($users->cidade) ?></td>
                            <td><?= h($users->estado) ?></td>
                            <td><?= h($users->pais) ?></td>
                            <td><?= h($users->role_id) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
