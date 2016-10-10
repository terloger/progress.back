<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Load Entity
 *
 * @property int $id
 * @property int $type_load_id
 * @property int $day_id
 * @property string $description
 *
 * @property \App\Model\Entity\TypeLoad $type_load
 * @property \App\Model\Entity\Day $day
 */
class Load extends Entity
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
