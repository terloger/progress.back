<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SportNutrition Model
 *
 * @property \Cake\ORM\Association\HasMany $NutritionLog
 *
 * @method \App\Model\Entity\SportNutrition get($primaryKey, $options = [])
 * @method \App\Model\Entity\SportNutrition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SportNutrition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SportNutrition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SportNutrition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SportNutrition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SportNutrition findOrCreate($search, callable $callback = null)
 */
class SportNutritionTable extends Table
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

        $this->table('sport_nutrition');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('NutritionLog', [
            'foreignKey' => 'sport_nutrition_id'
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
            ->requirePresence('color', 'create')
            ->notEmpty('color');

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
