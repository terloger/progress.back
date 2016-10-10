<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ValuesLogFixture
 *
 */
class ValuesLogFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'values_log';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'unit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'day_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'time' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'value' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_values_log_units_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
            'fk_values_log_days_idx' => ['type' => 'index', 'columns' => ['day_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_UNIQUE' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'fk_values_log_days' => ['type' => 'foreign', 'columns' => ['day_id'], 'references' => ['days', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_values_log_units' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['units', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'unit_id' => 1,
            'day_id' => 1,
            'time' => '13:50:37',
            'value' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
