<?php
namespace App\Model\Table;

use App\Model\Entity\Column;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Columns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentColumns
 * @property \Cake\ORM\Association\HasMany $Articles
 * @property \Cake\ORM\Association\HasMany $ChildColumns
 */
class ColumnsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('columns');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentColumns', [
            'className' => 'Columns',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'column_id'
        ]);
        $this->hasMany('ChildColumns', [
            'className' => 'Columns',
            'foreignKey' => 'parent_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('lft')
            ->allowEmpty('lft');

        $validator
            ->integer('rght')
            ->allowEmpty('rght');

        $validator
            ->allowEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentColumns'));
        return $rules;
    }
}
