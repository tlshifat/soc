<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailtemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailtemplatesTable Test Case
 */
class EmailtemplatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailtemplatesTable
     */
    public $Emailtemplates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emailtemplates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Emailtemplates') ? [] : ['className' => EmailtemplatesTable::class];
        $this->Emailtemplates = TableRegistry::getTableLocator()->get('Emailtemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Emailtemplates);

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
}
