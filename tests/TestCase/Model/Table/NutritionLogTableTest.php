<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NutritionLogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NutritionLogTable Test Case
 */
class NutritionLogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NutritionLogTable
     */
    public $NutritionLog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nutrition_log',
        'app.sport_nutrition',
        'app.days',
        'app.users',
        'app.loads',
        'app.type_load',
        'app.values_log',
        'app.units'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NutritionLog') ? [] : ['className' => 'App\Model\Table\NutritionLogTable'];
        $this->NutritionLog = TableRegistry::get('NutritionLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NutritionLog);

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
