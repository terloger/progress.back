<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ValuesLogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ValuesLogTable Test Case
 */
class ValuesLogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ValuesLogTable
     */
    public $ValuesLog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.values_log',
        'app.units',
        'app.days',
        'app.users',
        'app.loads',
        'app.type_load',
        'app.nutrition_log',
        'app.sport_nutrition'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ValuesLog') ? [] : ['className' => 'App\Model\Table\ValuesLogTable'];
        $this->ValuesLog = TableRegistry::get('ValuesLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ValuesLog);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
