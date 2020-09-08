<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ideas Model
 *
 * @property \App\Model\Table\EdictsTable&\Cake\ORM\Association\BelongsTo $Edicts
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AppraisalsTable&\Cake\ORM\Association\HasMany $Appraisals
 * @property \App\Model\Table\ConfidentialsTable&\Cake\ORM\Association\HasMany $Confidentials
 * @property \App\Model\Table\EvidencesTable&\Cake\ORM\Association\HasMany $Evidences
 * @property \App\Model\Table\PitchesTable&\Cake\ORM\Association\HasMany $Pitches
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Idea newEmptyEntity()
 * @method \App\Model\Entity\Idea newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Idea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Idea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Idea findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Idea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Idea[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Idea|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Idea saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Idea[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Idea[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Idea[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Idea[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IdeasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ideas');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Edicts', [
            'foreignKey' => 'edict_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Owners', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Appraisals', [
            'foreignKey' => 'idea_id',
        ]);
        $this->hasMany('Confidentials', [
            'foreignKey' => 'idea_id',
        ]);
        $this->hasMany('Evidences', [
            'foreignKey' => 'idea_id',
        ]);
        $this->hasMany('Pitches', [
            'foreignKey' => 'idea_id',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'idea_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'ideas_users',
        ]);
        $this->belongsToMany('Jurors', [
            'className' => 'Users',
            'foreignKey' => 'idea_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'ideas_users_jurors',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->allowEmptyString('titulo');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->scalar('sumario')
            ->allowEmptyString('sumario');

        $validator
            ->scalar('link_video')
            ->maxLength('link_video', 255)
            ->allowEmptyString('link_video');

        $validator
            ->scalar('canvas_atividades')
            ->allowEmptyString('canvas_atividades');

        $validator
            ->scalar('canvas_propostas')
            ->allowEmptyString('canvas_propostas');

        $validator
            ->scalar('canvas_relacionamentos')
            ->allowEmptyString('canvas_relacionamentos');

        $validator
            ->scalar('canvas_recursos')
            ->allowEmptyString('canvas_recursos');

        $validator
            ->scalar('canvas_canais')
            ->allowEmptyString('canvas_canais');

        $validator
            ->scalar('canvas_parceriaschaves')
            ->allowEmptyString('canvas_parceriaschaves');

        $validator
            ->scalar('canvas_segmentosdemercado')
            ->allowEmptyString('canvas_segmentosdemercado');

        $validator
            ->scalar('canvas_estruturadecusto')
            ->allowEmptyString('canvas_estruturadecusto');

        $validator
            ->scalar('canvas_fontesderenda')
            ->allowEmptyString('canvas_fontesderenda');

        $validator
            ->scalar('sumario_segredo')
            ->allowEmptyString('sumario_segredo');

        $validator
            ->scalar('sumario_problema')
            ->allowEmptyString('sumario_problema');

        $validator
            ->scalar('sumario_solucao')
            ->allowEmptyString('sumario_solucao');

        $validator
            ->scalar('sumario_oportunidade')
            ->allowEmptyString('sumario_oportunidade');

        $validator
            ->scalar('sumario_vontadecompetitiva')
            ->allowEmptyString('sumario_vontadecompetitiva');

        $validator
            ->scalar('sumario_modelo')
            ->allowEmptyString('sumario_modelo');

        $validator
            ->scalar('observacoes')
            ->allowEmptyString('observacoes');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['edict_id'], 'Edicts'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
