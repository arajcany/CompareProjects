<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FileFolderFiltersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FileFolderFiltersTable Test Case
 */
class FileFolderFiltersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FileFolderFiltersTable
     */
    public $FileFolderFilters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.file_folder_filters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FileFolderFilters') ? [] : ['className' => FileFolderFiltersTable::class];
        $this->FileFolderFilters = TableRegistry::getTableLocator()->get('FileFolderFilters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FileFolderFilters);

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
