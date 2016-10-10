<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SportNutrition Entity
 *
 * @property int $id
 * @property string $name
 * @property string $color
 *
 * @property \App\Model\Entity\NutritionLog[] $nutrition_log
 */
class SportNutrition extends Entity
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
        '*' => true,
        'id' => false
    ];
}
