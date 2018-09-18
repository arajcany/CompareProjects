<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ProjectsTable;
use arajcany\ToolBox\Utility\ZipMaker;
use arajcany\ToolBox\Utility\Security\Security;

/**
 * Compare Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class CompareController extends AppController
{
    public $Projects;

    /**
     * Initialize method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize()
    {
        $this->loadModel('Projects');
        parent::initialize();

        return null;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->redirect(['controller' => 'select']);
    }


    public function compareProjects($l = null, $r = null)
    {
        if ($l == null || $r == null) {
            return $this->redirect(['controller' => 'select']);
        }

        /**
         * @var \App\Model\Entity\Project $leftProject
         */
        $leftProject = $this->Projects->find('all')->where(['id' => $l])->first();
        $this->set("leftProject", $leftProject);

        /**
         * @var \App\Model\Entity\Project $rightProject
         */
        $rightProject = $this->Projects->find('all')->where(['id' => $r])->first();
        $this->set("rightProject", $rightProject);


        $zm = new ZipMaker();

        $ignoreFilesFolders = [
            "composer.phar",
            ".git\\",
            ".idea\\",
            "logs\\",
            "tmp\\",
            "vendor\\",
            "plugins\\",
            "webroot\\",
            "tests\\",
            "src\\XMPie\\",
        ];

        $leftFileList = $zm->makeFileList($leftProject->location, $ignoreFilesFolders);
        $this->set("leftFileList", $leftFileList);

        $rightFileList = $zm->makeFileList($rightProject->location, $ignoreFilesFolders);
        $this->set("rightFileList", $rightFileList);

    }


    public function compareFiles($l = null, $r = null, $leftFile = null, $rightFile = null)
    {
        if (is_null($l) || is_null($r) || is_null($leftFile) || is_null($rightFile)) {
            return $this->redirect(['controller' => 'select']);
        }

        /**
         * @var \App\Model\Entity\Project $leftProject
         */
        $leftProject = $this->Projects->find('all')->where(['id' => $l])->first();
        $this->set("leftProject", $leftProject);

        /**
         * @var \App\Model\Entity\Project $rightProject
         */
        $rightProject = $this->Projects->find('all')->where(['id' => $r])->first();
        $this->set("rightProject", $rightProject);


        $this->set("leftFile", $leftFile);
        $this->set("rightFile", $rightFile);

    }

    public function leftToRight()
    {
        $this->viewBuilder()->setLayout('blank');
        $redirectLink = $this->request->getData('redirectLink');
        $leftFile = $this->request->getData('leftFile');
        $rightFile = $this->request->getData('rightFile');
        $leftProjectId = $this->request->getData('leftProjectId');
        $rightProjectId = $this->request->getData('rightProjectId');
        $leftProjectName = $this->Projects->get($leftProjectId)->name;
        $rightProjectName = $this->Projects->get($rightProjectId)->name;

        if ($this->request->is('post')) {
            $result = $this->_overwriteFile('ltr');
            if ($result) {
                $this->Flash->success(__('File copied from {0} to {1}', $leftProjectName, $rightProjectName));
            } else {
                $this->Flash->error(__('Could not copy file from {0} to {1}', $leftProjectName, $rightProjectName));
            }
            return $this->redirect($redirectLink);

        } else {
            $this->redirect(['controller' => 'select']);
        }
    }

    public function rightToLeft()
    {
        $this->viewBuilder()->setLayout('blank');
        $redirectLink = $this->request->getData('redirectLink');
        $leftFile = $this->request->getData('leftFile');
        $rightFile = $this->request->getData('rightFile');
        $leftProjectId = $this->request->getData('leftProjectId');
        $rightProjectId = $this->request->getData('rightProjectId');
        $leftProjectName = $this->Projects->get($leftProjectId)->name;
        $rightProjectName = $this->Projects->get($rightProjectId)->name;

        if ($this->request->is('post')) {
            $result = $this->_overwriteFile('rtl');
            if ($result) {
                $this->Flash->success(__('File copied from {0} to {1}', $rightProjectName, $leftProjectName));
            } else {
                $this->Flash->error(__('Could not copy file from {0} to {1}', $rightProjectName, $leftProjectName));
            }
            return $this->redirect($redirectLink);

        } else {
            $this->redirect(['controller' => 'select']);
        }
    }

    /**
     * @param null $direction rtl || ltr
     * @return bool|int|null
     */
    private function _overwriteFile($direction = null)
    {
        $leftFile = $this->request->getData('leftFile');
        $rightFile = $this->request->getData('rightFile');

        if (is_file($leftFile) && is_file($rightFile)) {
            if ($direction == 'rtl') {
                $rightFileData = file_get_contents($rightFile);
                return file_put_contents($leftFile, $rightFileData);
            } elseif ($direction == 'ltr') {
                $leftFileData = file_get_contents($leftFile);
                return file_put_contents($rightFile, $leftFileData);
            }
        } else {
            return false;
        }

        return null;
    }

}
