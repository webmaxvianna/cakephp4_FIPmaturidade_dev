<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evidence Entity
 *
 * @property int $id
 * @property string|null $evidencia_link
 * @property int $idea_id
 * @property int $task_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Idea $idea
 * @property \App\Model\Entity\Task $task
 */
class Evidence extends Entity
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
        'evidencia_link' => true,
        'idea_id' => true,
        'task_id' => true,
        'created' => true,
        'modified' => true,
        'idea' => true,
        'task' => true,
    ];
}
