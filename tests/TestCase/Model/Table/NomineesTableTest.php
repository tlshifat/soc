<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NomineesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NomineesTable Test Case
 */
class NomineesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NomineesTable
     */
    public $Nominees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nominees',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Nominees') ? [] : ['className' => NomineesTable::class];
        $this->Nominees = TableRegistry::getTableLocator()->get('Nominees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nominees);

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
