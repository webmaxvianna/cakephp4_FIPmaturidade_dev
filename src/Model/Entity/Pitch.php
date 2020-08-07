<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pitch Entity
 *
 * @property int $id
 * @property float|null $pontuacao
 * @property int|null $id_jurado
 * @property int $category_id
 * @property int $idea_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Idea $idea
 */
class Pitch extends Entity
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
        'pontuacao' => true,
        'id_jurado' => true,
        'category_id' => true,
        'idea_id' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'idea' => true,
    ];
}
