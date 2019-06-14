<?php

namespace App\Shell;

use App\Model\Table\FileSnapshotsTable;
use App\Model\Table\ProjectSnapshotsTable;
use App\Model\Table\ProjectsTable;
use arajcany\ToolBox\Utility\ZipMaker;
use Cake\Console\Shell;
use Cake\I18n\FrozenTime;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * Snap shell command.
 *
 * @property ProjectsTable $Projects
 * @property ProjectSnapshotsTable $ProjectSnapshots
 * @property FileSnapshotsTable $FileSnapshots
 */
class TrackShell extends Shell
{
    public $Projects;
    public $ProjectSnapshots;
    public $FileSnapshots;

    public function startup()
    {
        parent::startup();

        $this->Projects = TableRegistry::getTableLocator()->get('Projects');
        $this->ProjectSnapshots = TableRegistry::getTableLocator()->get('ProjectSnapshots');
        $this->FileSnapshots = TableRegistry::getTableLocator()->get('FileSnapshots');
    }


    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $timeSpanLimit = 15;
        $this->out(__("This is the Snapshot Shell"));

        $zm = new ZipMaker();

        /**
         * @var \App\Model\Entity\Project $project
         * @var Query $projects
         */
        $projects = $this->Projects->findTrackedProjects();

        $counter = 1;
        $countProjects = $projects->count();
        $this->out(__("Found {0} Projects that are being tracked.", $countProjects));

        foreach ($projects as $project) {
            $this->out(__("Updating Tracking for Project {0} of {1}.", $counter, $countProjects));


            $previousProjectSnapshot = $this->Projects->getLastSnapshotForProject($project->id);


            //-------START: Build Project Checksum-------
            $location = $project->location;

            $list = $zm->makeFileList($location);

            $listShaNames = [];
            $listShaContents = [];
            foreach ($list as $item) {
                $listShaContents[] = sha1_file($item);
                $listShaNames[] = sha1($item);
            }
            asort($listShaNames);
            asort($listShaContents);

            $listShaNames = sha1(json_encode($listShaNames));
            $listShaContents = sha1(json_encode($listShaContents));

            $checksum = sha1($listShaNames . $listShaContents);
            //-------END: Build Project Checksum-------


            /**
             * @var \App\Model\Entity\ProjectSnapshot $currentProjectSnapshot
             */
            $currentProjectSnapshot = $this->ProjectSnapshots->newEntity();
            $currentProjectSnapshot->project_id = $project->id;
            $currentProjectSnapshot->checksum = $checksum;

            $currentProjectSnapshot->span = 0;
            if ($previousProjectSnapshot) {
                $currentDatetime = new FrozenTime();
                if ($currentProjectSnapshot->checksum != $previousProjectSnapshot->checksum) {
                    $timeSpan = $currentDatetime->diffInMinutes($previousProjectSnapshot->created);
                    if ($timeSpan <= $timeSpanLimit) {
                        $currentProjectSnapshot->span = $timeSpan;
                    }
                }
            }

            $this->ProjectSnapshots->save($currentProjectSnapshot);

            $counter++;
        }

        $this->out(__("Project tracking completed... Bye!", $countProjects));
        return 0;
    }
}
