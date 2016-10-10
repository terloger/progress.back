<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeLoad Model
 *
 * @property \Cake\ORM\Association\HasMany $Loads
 *
 * @method \App\Model\Entity\TypeLoad get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeLoad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeLoad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeLoad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeLoad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeLoad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeLoad findOrCreate($search, callable $callback = null)
 */
class TypeLoadTable extends Table
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

        $this->table('type_load');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Loads', [
            'foreignKey' => 'type_load_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('color');

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
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
