<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Day Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $date
 * @property int $user_id
 * @property string $description
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Load[] $loads
 * @property \App\Model\Entity\NutritionLog[] $nutrition_log
 * @property \App\Model\Entity\ValuesLog[] $values_log
 */
class Day extends Entity
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
	
	protected function _getDate($date) {
		if (is_object($date)) {
			return $date->i18nFormat('yyyy-MM-dd');
		} else {
			return $date;
		}
    }
}
