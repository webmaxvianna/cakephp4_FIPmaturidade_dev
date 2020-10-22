<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Verifications Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Verification newEmptyEntity()
 * @method \App\Model\Entity\Verification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Verification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Verification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Verification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Verification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Verification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Verification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Verification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Verification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Verification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Verification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Verification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VerificationsTable extends Table
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

        $this->setTable('verifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('residencia')
            ->maxLength('residencia', 255)
            ->allowEmptyString('residencia');

        $validator
            ->scalar('identidade_frente')
            ->maxLength('identidade_frente', 255)
            ->allowEmptyString('identidade_frente');

        $validator
            ->scalar('identidade_verso')
            ->maxLength('identidade_verso', 255)
            ->allowEmptyString('identidade_verso');

        $validator
            ->scalar('declaracao')
            ->maxLength('declaracao', 255)
            ->allowEmptyString('declaracao');

        $validator
            ->scalar('autorizacao_pais')
            ->maxLength('autorizacao_pais', 255)
            ->allowEmptyString('autorizacao_pais');

        $validator
            ->scalar('foto_perfil')
            ->maxLength('foto_perfil', 255)
            ->allowEmptyString('foto_perfil');

        $validator
            ->scalar('recomendacao')
            ->maxLength('recomendacao', 255)
            ->allowEmptyString('recomendacao');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
