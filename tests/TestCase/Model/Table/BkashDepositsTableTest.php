<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BkashDepositsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BkashDepositsTable Test Case
 */
class BkashDepositsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BkashDepositsTable
     */
    public $BkashDeposits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bkash_deposits',
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
        $config = TableRegistry::getTableLocator()->exists('BkashDeposits') ? [] : ['className' => BkashDepositsTable::class];
        $this->BkashDeposits = TableRegistry::getTableLocator()->get('BkashDeposits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BkashDeposits);

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
