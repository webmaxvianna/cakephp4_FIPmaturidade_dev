<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CategoriesEdict Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $edict_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Edict $edict
 */
class CategoriesEdict extends Entity
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
        'category_id' => true,
        'edict_id' => true,
        'category' => true,
        'edict' => true,
    ];
}
