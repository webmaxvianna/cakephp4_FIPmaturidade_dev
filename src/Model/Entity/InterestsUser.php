<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InterestsUser Entity
 *
 * @property int $id
 * @property int $interest_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Interest $interest
 * @property \App\Model\Entity\User $user
 */
class InterestsUser extends Entity
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
        'interest_id' => true,
        'user_id' => true,
        'interest' => true,
        'user' => true,
    ];
}
