<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Edict Entity
 *
 * @property int $id
 * @property string|null $numero
 * @property string|null $link
 * @property string|null $edital
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Idea[] $ideas
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Parameter[] $parameters
 * @property \App\Model\Entity\Task[] $tasks
 */
class Edict extends Entity
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
        'numero' => true,
        'link' => true,
        'edital' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'users' => true,
        'ideas' => true,
        'categories' => true,
        'parameters' => true,
        'tasks' => true,
    ];
}
