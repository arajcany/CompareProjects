<?php

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('extension_filters')
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('extension_filter', 'string', [
                'default' => null,
                'limit' => 1024,
                'null' => true,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->create();

        $this->table('file_folder_filters')
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('file_folder_filter', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('file_snapshots')
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('project_snapshot_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('filepath', 'string', [
                'default' => null,
                'limit' => 1024,
                'null' => false,
            ])
            ->addColumn('checksum', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addIndex(
                [
                    'project_snapshot_id',
                ]
            )
            ->addIndex(
                [
                    'checksum',
                ]
            )
            ->create();

        $this->table('project_snapshots')
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('project_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('checksum', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('span', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'project_id',
                ]
            )
            ->addIndex(
                [
                    'checksum',
                ]
            )
            ->create();

        $this->table('projects')
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('location', 'string', [
                'default' => null,
                'limit' => 2048,
                'null' => true,
            ])
            ->create();

        $this->seedExtensionFilters();
        $this->seedFileFolderFilters();
    }

    public function down()
    {
        $this->dropTable('extension_filters');
        $this->dropTable('file_folder_filters');
        $this->dropTable('file_snapshots');
        $this->dropTable('project_snapshots');
        $this->dropTable('projects');
    }

    public function seedExtensionFilters()
    {
        $date = gmdate("Y-m-d H:i:s");

        $data = [
            [
                "created" => $date,
                "modified" => $date,
                "name" => "W - jsx",
                "extension_filter" => "jsx",
                "type" => "white"
            ],
            [
                "created" => $date,
                "modified" => $date,
                "name" => "W - bat",
                "extension_filter" => "bat",
                "type" => "white"
            ],
            [
                "created" => $date,
                "modified" => $date,
                "name" => "B - ctp",
                "extension_filter" => "ctp",
                "type" => "black"
            ],
            [
                "created" => $date,
                "modified" => $date,
                "name" => "W - ctp",
                "extension_filter" => "ctp",
                "type" => "white"
            ],
            [
                "created" => $date,
                "modified" => $date,
                "name" => "W - css",
                "extension_filter" => "css",
                "type" => "white"
            ],
            [
                "created" => $date,
                "modified" => $date,
                "name" => "W - ctp php",
                "extension_filter" => "ctp,php",
                "type" => "white"
            ]
        ];

        if (!empty($data)) {
            $table = $this->table('extension_filters');
            $table->insert($data)->save();
        }
    }

    public function seedFileFolderFilters()
    {
        $currentDate = gmdate("Y-m-d H:i:s");

        $data = [
            [
                'created' => $currentDate,
                'modified' => $currentDate,
                'name' => 'Standard Excludes',
                'file_folder_filter' => ''
                    . 'tmp\\' . "\r\n"
                    . 'tests\\' . "\r\n"
                    . 'vendor\\' . "\r\n"
                    . 'plugins\\' . "\r\n"
                    . 'webroot\\' . "\r\n"
            ],
        ];

        if (!empty($data)) {
            $table = $this->table('file_folder_filters');
            $table->insert($data)->save();
        }
    }
}
