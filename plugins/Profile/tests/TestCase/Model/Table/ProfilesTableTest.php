<?php
namespace Profile\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Profile\Model\Table\ProfilesTable;

/**
 * Profile\Model\Table\ProfilesTable Test Case
 */
class ProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Profile\Model\Table\ProfilesTable
     */
    public $Profiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.profile.profiles',
        'plugin.profile.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Profiles') ? [] : ['className' => ProfilesTable::class];
        $this->Profiles = TableRegistry::getTableLocator()->get('Profiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Profiles);

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
