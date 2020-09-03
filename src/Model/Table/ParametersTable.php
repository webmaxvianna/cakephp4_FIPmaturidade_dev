<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parameters Model
 *
 * @property \App\Model\Table\AppraisalsTable&\Cake\ORM\Association\HasMany $Appraisals
 * @property \App\Model\Table\EdictsTable&\Cake\ORM\Association\BelongsToMany $Edicts
 *
 * @method \App\Model\Entity\Parameter newEmptyEntity()
 * @method \App\Model\Entity\Parameter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Parameter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parameter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parameter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Parameter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parameter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parameter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parameter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parameter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parameter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parameter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parameter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParametersTable extends Table
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

        $this->setTable('parameters');
        $this->setDisplayField('item');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Appraisals', [
            'foreignKey' => 'parameter_id',
        ]);
        $this->belongsToMany('Edicts', [
            'foreignKey' => 'parameter_id',
            'targetForeignKey' => 'edict_id',
            'joinTable' => 'edicts_parameters',
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
            ->scalar('item')
            ->maxLength('item', 45)
            ->allowEmptyString('item');

        return $validator;
    }
}
