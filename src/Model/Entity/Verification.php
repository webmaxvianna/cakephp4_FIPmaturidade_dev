<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Verification Entity
 *
 * @property int $id
 * @property string|null $residencia
 * @property string|null $identidade_frente
 * @property string|null $identidade_verso
 * @property string|null $declaracao
 * @property string|null $autorizacao_pais
 * @property string|null $foto_perfil
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Verification extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'residencia' => true,
        'identidade_frente' => true,
        'identidade_verso' => true,
        'declaracao' => true,
        'autorizacao_pais' => true,
        'foto_perfil' => true,
        'recomendacao' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
