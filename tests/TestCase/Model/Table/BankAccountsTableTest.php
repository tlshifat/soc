<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankAccountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankAccountsTable Test Case
 */
class BankAccountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankAccountsTable
     */
    public $BankAccounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_accounts',
        'app.users',
        'app.bank_transfers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BankAccounts') ? [] : ['className' => BankAccountsTable::class];
        $this->BankAccounts = TableRegistry::getTableLocator()->get('BankAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankAccounts);

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
