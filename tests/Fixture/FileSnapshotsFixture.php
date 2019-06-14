<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FileSnapshotsFixture
 *
 */
class FileSnapshotsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'project_snapshot_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'filepath' => ['type' => 'string', 'length' => 1024, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'checksum' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        '_indexes' => [
            'file_snapshots_project_id_index' => ['type' => 'index', 'columns' => ['project_snapshot_id'], 'length' => []],
            'file_snapshots_checksum_index' => ['type' => 'index', 'columns' => ['checksum'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sqlite_autoindex_file_snapshots_1' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'created' => '2019-06-09 11:21:08',
                'modified' => '2019-06-09 11:21:08',
                'project_snapshot_id' => 1,
                'filepath' => 'Lorem ipsum dolor sit amet',
                'checksum' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
