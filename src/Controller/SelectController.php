<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ProjectsTable;
use App\Model\Table\ExtensionListsTable;

/**
 * Select Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 * @property \App\Model\Table\ExtensionListsTable $ExtensionLists
 */
class SelectController extends AppController
{
    public $Projects;
    public $ExtensionLists;

    /**
     * Initialize method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize()
    {
        $this->loadModel('Projects');
        $this->loadModel('ExtensionLists');
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
        $projects = $this->Projects->find('list')->orderAsc('Name');
        $this->set("projects", $projects);

        $extensionLists = $this->ExtensionLists->find('list')->orderAsc('Name');
        $this->set("extensionLists", $extensionLists);

        if ($this->request->is('post')) {
            debug($this->request->getData());
            $l = $this->request->getData('left-project');
            $r = $this->request->getData('right-project');
            $ext = $this->request->getData('extension-list');
            $this->redirect(['controller' => 'compare', 'action' => 'compare-projects', $l, $r, $ext]);
        }
    }

}
