<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Edicts Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\IdeasTable&\Cake\ORM\Association\HasMany $Ideas
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsToMany $Categories
 * @property \App\Model\Table\ParametersTable&\Cake\ORM\Association\BelongsToMany $Parameters
 * @property \App\Model\Table\TasksTable&\Cake\ORM\Association\BelongsToMany $Tasks
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Edict newEmptyEntity()
 * @method \App\Model\Entity\Edict newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Edict[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Edict get($primaryKey, $options = [])
 * @method \App\Model\Entity\Edict findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Edict patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Edict[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Edict|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Edict saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Edict[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Edict[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Edict[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Edict[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EdictsTable extends Table
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

        $this->setTable('edicts');
        $this->setDisplayField('numero');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Owners', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Ideas', [
            'foreignKey' => 'edict_id',
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'edict_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'categories_edicts',
        ]);
        $this->belongsToMany('Parameters', [
            'foreignKey' => 'edict_id',
            'targetForeignKey' => 'parameter_id',
            'joinTable' => 'edicts_parameters',
        ]);
        $this->belongsToMany('Tasks', [
            'foreignKey' => 'edict_id',
            'targetForeignKey' => 'task_id',
            'joinTable' => 'edicts_tasks',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'edict_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'edicts_users',
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
            ->notEmptyString('id', null, 'create');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 20)
            ->notEmptyString('numero');

        $validator
            ->scalar('link')
            ->notEmptyString('link');

        $validator
            ->scalar('edital')
            ->allowEmptyString('edital');

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
        $rules->add($rules->isUnique(['numero']), [
            'errorField' => 'numero', 
            'message' => 'Este número de edital já encontra-se em uso.'
            ]);
            
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
