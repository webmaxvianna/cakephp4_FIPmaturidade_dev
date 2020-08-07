<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appraisals Model
 *
 * @property \App\Model\Table\IdeasTable&\Cake\ORM\Association\BelongsTo $Ideas
 * @property \App\Model\Table\ParametersTable&\Cake\ORM\Association\BelongsTo $Parameters
 *
 * @method \App\Model\Entity\Appraisal newEmptyEntity()
 * @method \App\Model\Entity\Appraisal newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Appraisal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appraisal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appraisal findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Appraisal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appraisal[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appraisal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appraisal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appraisal[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Appraisal[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Appraisal[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Appraisal[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AppraisalsTable extends Table
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

        $this->setTable('appraisals');
        $this->setDisplayField('pontuacao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ideas', [
            'foreignKey' => 'idea_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Parameters', [
            'foreignKey' => 'parameter_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->numeric('pontuacao')
            ->allowEmptyString('pontuacao');

        $validator
            ->integer('id_avaliador')
            ->allowEmptyString('id_avaliador');

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
        $rules->add($rules->existsIn(['idea_id'], 'Ideas'));
        $rules->add($rules->existsIn(['parameter_id'], 'Parameters'));

        return $rules;
    }
}
