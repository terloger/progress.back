<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NutritionLogFixture
 *
 */
class NutritionLogFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'nutrition_log';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sport_nutrition_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'day_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'time' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'value' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_nutrition_log_sport_nutrition_idx' => ['type' => 'index', 'columns' => ['sport_nutrition_id'], 'length' => []],
            'fk_nutrition_log_days_idx' => ['type' => 'index', 'columns' => ['day_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_UNIQUE' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'fk_nutrition_log_1' => ['type' => 'foreign', 'columns' => ['day_id'], 'references' => ['days', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_nutrition_log_sport_nutrition' => ['type' => 'foreign', 'columns' => ['sport_nutrition_id'], 'references' => ['sport_nutrition', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'sport_nutrition_id' => 1,
            'day_id' => 1,
            'time' => '13:50:03',
            'value' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
