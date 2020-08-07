<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EdictsParameters Model
 *
 * @property \App\Model\Table\ParametersTable&\Cake\ORM\Association\BelongsTo $Parameters
 * @property \App\Model\Table\EdictsTable&\Cake\ORM\Association\BelongsTo $Edicts
 *
 * @method \App\Model\Entity\EdictsParameter newEmptyEntity()
 * @method \App\Model\Entity\EdictsParameter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EdictsParameter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EdictsParameter get($primaryKey, $options = [])
 * @method \App\Model\Entity\EdictsParameter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EdictsParameter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EdictsParameter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EdictsParameter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EdictsParameter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EdictsParameter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EdictsParameter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EdictsParameter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EdictsParameter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EdictsParametersTable extends Table
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

        $this->setTable('edicts_parameters');
        $this->setPrimaryKey('id');

        $this->belongsTo('Parameters', [
            'foreignKey' => 'parameter_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Edicts', [
            'foreignKey' => 'edict_id',
            'joinType' => 'INNER',
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
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

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
        $rules->add($rules->existsIn(['parameter_id'], 'Parameters'));
        $rules->add($rules->existsIn(['edict_id'], 'Edicts'));

        return $rules;
    }
}
