<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeLoadTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeLoadTable Test Case
 */
class TypeLoadTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeLoadTable
     */
    public $TypeLoad;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_load',
        'app.loads',
        'app.days',
        'app.users',
        'app.nutrition_log',
        'app.sport_nutrition',
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
        $config = TableRegistry::exists('TypeLoad') ? [] : ['className' => 'App\Model\Table\TypeLoadTable'];
        $this->TypeLoad = TableRegistry::get('TypeLoad', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeLoad);

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
