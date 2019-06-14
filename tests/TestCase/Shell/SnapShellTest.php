<?php
namespace App\Test\TestCase\Shell;

use App\Shell\TrackShell;
use Cake\TestSuite\ConsoleIntegrationTestCase;

/**
 * App\Shell\SnapShell Test Case
 */
class SnapShellTest extends ConsoleIntegrationTestCase
{

    /**
     * ConsoleIo mock
     *
     * @var \Cake\Console\ConsoleIo|\PHPUnit_Framework_MockObject_MockObject
     */
    public $io;

    /**
     * Test subject
     *
     * @var \App\Shell\TrackShell
     */
    public $Snap;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMockBuilder('Cake\Console\ConsoleIo')->getMock();
        $this->Snap = new TrackShell($this->io);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Snap);

        parent::tearDown();
    }

    /**
     * Test getOptionParser method
     *
     * @return void
     */
    public function testGetOptionParser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test main method
     *
     * @return void
     */
    public function testMain()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
