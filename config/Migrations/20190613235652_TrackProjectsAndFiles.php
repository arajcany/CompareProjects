<?php
use Migrations\AbstractMigration;

class TrackProjectsAndFiles extends AbstractMigration
{

    public function up()
    {

        $this->table('projects')
            ->addColumn('track_project', 'boolean', [
                'after' => 'location',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('track_files', 'boolean', [
                'after' => 'track_project',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('projects')
            ->removeColumn('track_project')
            ->removeColumn('track_files')
            ->update();
    }
}

