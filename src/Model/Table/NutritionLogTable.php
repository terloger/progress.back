<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NutritionLog Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SportNutrition
 * @property \Cake\ORM\Association\BelongsTo $Days
 *
 * @method \App\Model\Entity\NutritionLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\NutritionLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NutritionLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NutritionLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NutritionLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NutritionLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NutritionLog findOrCreate($search, callable $callback = null)
 */
class NutritionLogTable extends Table
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

        $this->table('nutrition_log');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('SportNutrition', [
            'foreignKey' => 'sport_nutrition_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Days', [
            'foreignKey' => 'day_id',
            'joinType' => 'INNER'
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
            ->time('time')
            ->allowEmpty('time');

        $validator
            ->allowEmpty('value');

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
        $rules->add($rules->existsIn(['sport_nutrition_id'], 'SportNutrition'));
        $rules->add($rules->existsIn(['day_id'], 'Days'));

        return $rules;
    }
}
