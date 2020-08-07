<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EdictsUser Entity
 *
 * @property int $id
 * @property int $edict_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Edict $edict
 * @property \App\Model\Entity\User $user
 */
class EdictsUser extends Entity
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
        'id' => true,
        'edict_id' => true,
        'user_id' => true,
        'edict' => true,
        'user' => true,
    ];
}
