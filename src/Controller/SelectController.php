<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ProjectsTable;
use App\Model\Table\ExtensionFiltersTable;

/**
 * Select Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 * @property \App\Model\Table\ExtensionFiltersTable $ExtensionFilters
 * @property \App\Model\Table\FileFolderFiltersTable $FileFolderFilters
 */
class SelectController extends AppController
{
    public $Projects;
    public $ExtensionFilters;
    public $FileFolderFilters;

    /**
     * Initialize method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize()
    {
        $this->loadModel('Projects');
        $this->loadModel('ExtensionFilters');
        $this->loadModel('FileFolderFilters');
        parent::initialize();

        return null;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $projects = $this->Projects->find('list')->orderAsc('Name');
        $this->set("projects", $projects);

        $extensionFilters = $this->ExtensionFilters->find('list')->orderAsc('Name');
        $this->set("extensionFilters", $extensionFilters);

        $fileFolderFilters = $this->FileFolderFilters->find('list')->orderAsc('Name');
        $this->set("fileFolderFilters", $fileFolderFilters);

        if ($this->request->is('post')) {
            debug($this->request->getData());
            $l = $this->request->getData('left-project');
            $r = $this->request->getData('right-project');
            $ext = $this->request->getData('extension-filter') != null ? $this->request->getData('extension-filter') : 0;
            $fff = $this->request->getData('file-folder-filter') != null ? $this->request->getData('file-folder-filter') : 0;
            return $this->redirect(['controller' => 'compare', 'action' => 'compare-projects', $l, $r, $ext, $fff]);
        }
    }

}
