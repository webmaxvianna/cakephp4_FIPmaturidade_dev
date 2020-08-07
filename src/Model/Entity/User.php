<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $sobrenome
 * @property string|null $nome_completo
 * @property \Cake\I18n\FrozenDate|null $data_nascimento
 * @property string|null $sexo
 * @property string|null $email
 * @property string|null $username
 * @property string|null $password
 * @property string|null $foto
 * @property int|null $status
 * @property int|null $confirmacao_email
 * @property int|null $confirmacao_celular
 * @property string|null $cpf
 * @property string|null $rg
 * @property string|null $facebook
 * @property string|null $linkedin
 * @property string|null $instagram
 * @property string|null $lattes
 * @property string|null $telefone1
 * @property string|null $telefone2
 * @property string|null $cep
 * @property string|null $logradouro
 * @property string|null $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $pais
 * @property int $role_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Edict[] $edicts
 * @property \App\Model\Entity\Idea[] $ideas
 * @property \App\Model\Entity\Resume[] $resumes
 * @property \App\Model\Entity\Verification[] $verifications
 * @property \App\Model\Entity\Characteristic[] $characteristics
 * @property \App\Model\Entity\Interest[] $interests
 * @property \App\Model\Entity\Specialty[] $specialties
 * @property \App\Model\Entity\Task[] $tasks
 */
class User extends Entity
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
        'nome' => true,
        'sobrenome' => true,
        'nome_completo' => true,
        'data_nascimento' => true,
        'sexo' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'foto' => true,
        'status' => true,
        'confirmacao_email' => true,
        'confirmacao_celular' => true,
        'cpf' => true,
        'rg' => true,
        'facebook' => true,
        'linkedin' => true,
        'instagram' => true,
        'lattes' => true,
        'telefone1' => true,
        'telefone2' => true,
        'cep' => true,
        'logradouro' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'pais' => true,
        'role_id' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'edicts' => true,
        'ideas' => true,
        'resume' => true,
        'verification' => true,
        'characteristics' => true,
        'interests' => true,
        'specialties' => true,
        'tasks' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
