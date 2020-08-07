<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\EdictsTable&\Cake\ORM\Association\HasMany $Edicts
 * @property \App\Model\Table\IdeasTable&\Cake\ORM\Association\HasMany $Ideas
 * @property \App\Model\Table\ResumesTable&\Cake\ORM\Association\HasMany $Resumes
 * @property \App\Model\Table\VerificationsTable&\Cake\ORM\Association\HasMany $Verifications
 * @property \App\Model\Table\CharacteristicsTable&\Cake\ORM\Association\BelongsToMany $Characteristics
 * @property \App\Model\Table\EdictsTable&\Cake\ORM\Association\BelongsToMany $Edicts
 * @property \App\Model\Table\IdeasTable&\Cake\ORM\Association\BelongsToMany $Ideas
 * @property \App\Model\Table\InterestsTable&\Cake\ORM\Association\BelongsToMany $Interests
 * @property \App\Model\Table\SpecialtiesTable&\Cake\ORM\Association\BelongsToMany $Specialties
 * @property \App\Model\Table\TasksTable&\Cake\ORM\Association\BelongsToMany $Tasks
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('nome_completo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasOne('Edicts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Ideas', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('Resumes', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('Verifications', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Characteristics', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'characteristic_id',
            'joinTable' => 'characteristics_users',
        ]);
        $this->belongsToMany('Edicts', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'edict_id',
            'joinTable' => 'edicts_users',
        ]);
        $this->belongsToMany('Ideas', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'idea_id',
            'joinTable' => 'ideas_users',
        ]);
        $this->belongsToMany('Interests', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'interest_id',
            'joinTable' => 'interests_users',
        ]);
        $this->belongsToMany('Specialties', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'specialty_id',
            'joinTable' => 'specialties_users',
        ]);
        $this->belongsToMany('Tasks', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'task_id',
            'joinTable' => 'tasks_users',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        $validator
            ->scalar('sobrenome')
            ->maxLength('sobrenome', 255)
            ->allowEmptyString('sobrenome');

        $validator
            ->scalar('nome_completo')
            ->maxLength('nome_completo', 255)
            ->allowEmptyString('nome_completo');

        $validator
            ->date('data_nascimento')
            ->allowEmptyDate('data_nascimento');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 20)
            ->allowEmptyString('sexo');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->allowEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');
        
        $validator
            ->add(
                'confirm_password',
                'compareWith', [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Senhas não são iguais.'
                ]
            );

        $validator
            ->scalar('foto')
            ->maxLength('foto', 255)
            ->allowEmptyString('foto');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->integer('confirmacao_email')
            ->allowEmptyString('confirmacao_email');

        $validator
            ->integer('confirmacao_celular')
            ->allowEmptyString('confirmacao_celular');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 20)
            ->allowEmptyString('cpf');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 20)
            ->allowEmptyString('rg');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 255)
            ->allowEmptyString('facebook');

        $validator
            ->scalar('linkedin')
            ->maxLength('linkedin', 255)
            ->allowEmptyString('linkedin');

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 255)
            ->allowEmptyString('instagram');

        $validator
            ->scalar('lattes')
            ->maxLength('lattes', 255)
            ->allowEmptyString('lattes');

        $validator
            ->scalar('telefone1')
            ->maxLength('telefone1', 20)
            ->allowEmptyString('telefone1');

        $validator
            ->scalar('telefone2')
            ->maxLength('telefone2', 20)
            ->allowEmptyString('telefone2');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->allowEmptyString('cep');

        $validator
            ->scalar('logradouro')
            ->maxLength('logradouro', 255)
            ->allowEmptyString('logradouro');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 20)
            ->allowEmptyString('numero');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 45)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 100)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 100)
            ->allowEmptyString('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 45)
            ->allowEmptyString('estado');

        $validator
            ->scalar('pais')
            ->maxLength('pais', 45)
            ->allowEmptyString('pais');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
