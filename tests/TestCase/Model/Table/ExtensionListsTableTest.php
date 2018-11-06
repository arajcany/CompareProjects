<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtensionListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtensionListsTable Test Case
 */
class ExtensionListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExtensionListsTable
     */
    public $ExtensionLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.extension_lists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ExtensionLists') ? [] : ['className' => ExtensionListsTable::class];
        $this->ExtensionLists = TableRegistry::getTableLocator()->get('ExtensionLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExtensionLists);

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
