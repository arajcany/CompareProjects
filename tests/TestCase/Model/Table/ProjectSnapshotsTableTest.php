<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSnapshotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectSnapshotsTable Test Case
 */
class ProjectSnapshotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSnapshotsTable
     */
    public $ProjectSnapshots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_snapshots',
        'app.projects',
        'app.file_snapshots'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectSnapshots') ? [] : ['className' => ProjectSnapshotsTable::class];
        $this->ProjectSnapshots = TableRegistry::getTableLocator()->get('ProjectSnapshots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSnapshots);

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
