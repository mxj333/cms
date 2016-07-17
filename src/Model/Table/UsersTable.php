<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $Products
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER',
        ]);
        // $this->hasMany('Products', [
        //     'foreignKey' => 'user_id',
        // ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    /*
    public function validationDefault(Validator $validator) {
    $validator
    ->integer('id')
    ->allowEmpty('id', 'create');

    $validator
    ->requirePresence('username', 'create')
    ->notEmpty('username')
    ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

    $validator
    ->requirePresence('password', 'create')
    ->notEmpty('password');

    $validator
    ->allowEmpty('photo');

    $validator
    ->allowEmpty('dir');

    return $validator;
    }
     */

    public function validationDefault(Validator $validator) {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('group_id', 'A group_id is required');
        // ->add('role', 'inList', [
        //     'rule' => ['inList', ['admin', 'author']],
        //     'message' => 'Please enter a valid role',
        // ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    /*
public function buildRules(RulesChecker $rules) {
$rules->add($rules->isUnique(['username']));
$rules->add($rules->existsIn(['group_id'], 'Groups'));
return $rules;
}
 */
}
