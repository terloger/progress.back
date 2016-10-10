<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SportNutritionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SportNutritionTable Test Case
 */
class SportNutritionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SportNutritionTable
     */
    public $SportNutrition;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sport_nutrition',
        'app.nutrition_log',
        'app.days',
        'app.users',
        'app.loads',
        'app.type_load',
        'app.values_log'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SportNutrition') ? [] : ['className' => 'App\Model\Table\SportNutritionTable'];
        $this->SportNutrition = TableRegistry::get('SportNutrition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SportNutrition);

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
