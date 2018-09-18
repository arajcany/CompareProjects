<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ProjectsTable;

/**
 * Select Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class SelectController extends AppController
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
        $projects = $this->Projects->find('list')->orderAsc('Name');
        $this->set("projects", $projects);

        if ($this->request->is('post')) {
            debug($this->request->getData());
            $l = $this->request->getData('left-project');
            $r = $this->request->getData('right-project');
            $this->redirect(['controller' => 'compare','action' => 'compare-projects', $l, $r]);
        }
    }

}
