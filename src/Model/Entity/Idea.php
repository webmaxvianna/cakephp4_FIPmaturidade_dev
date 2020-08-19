<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Idea Entity
 *
 * @property int $id
 * @property int|null $status
 * @property string|null $titulo
 * @property string|null $descricao
 * @property string|null $sumario
 * @property string|null $link_video
 * @property string|null $canvas_atividades
 * @property string|null $canvas_propostas
 * @property string|null $canvas_relacionamentos
 * @property string|null $canvas_recursos
 * @property string|null $canvas_canais
 * @property string|null $canvas_parceriaschaves
 * @property string|null $canvas_segmentosdemercado
 * @property string|null $canvas_estruturadecusto
 * @property string|null $canvas_fontesderenda
 * @property string|null $sumario_segredo
 * @property string|null $sumario_problema
 * @property string|null $sumario_solucao
 * @property string|null $sumario_oportunidade
 * @property string|null $sumario_vontadecompetitiva
 * @property string|null $sumario_modelo
 * @property string|null $observacoes
 * @property int $edict_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Edict $edict
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Appraisal[] $appraisals
 * @property \App\Model\Entity\Confidential[] $confidentials
 * @property \App\Model\Entity\Evidence[] $evidences
 * @property \App\Model\Entity\Pitch[] $pitches
 */
class Idea extends Entity
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
        'status' => true,
        'titulo' => true,
        'descricao' => true,
        'sumario' => true,
        'link_video' => true,
        'canvas_atividades' => true,
        'canvas_propostas' => true,
        'canvas_relacionamentos' => true,
        'canvas_recursos' => true,
        'canvas_canais' => true,
        'canvas_parceriaschaves' => true,
        'canvas_segmentosdemercado' => true,
        'canvas_estruturadecusto' => true,
        'canvas_fontesderenda' => true,
        'sumario_segredo' => true,
        'sumario_problema' => true,
        'sumario_solucao' => true,
        'sumario_oportunidade' => true,
        'sumario_vontadecompetitiva' => true,
        'sumario_modelo' => true,
        'observacoes' => true,
        'edict_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'edict' => true,
        'owner' => true,
        'users' => true,
        'appraisals' => true,
        'confidentials' => true,
        'evidences' => true,
        'pitches' => true,
    ];
}
