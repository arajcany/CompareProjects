<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FileSnapshotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FileSnapshotsTable Test Case
 */
class FileSnapshotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FileSnapshotsTable
     */
    public $FileSnapshots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.file_snapshots',
        'app.project_snapshots'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FileSnapshots') ? [] : ['className' => FileSnapshotsTable::class];
        $this->FileSnapshots = TableRegistry::getTableLocator()->get('FileSnapshots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FileSnapshots);

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
