<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectSnapshots Controller
 *
 * @property \App\Model\Table\ProjectSnapshotsTable $ProjectSnapshots
 *
 * @method \App\Model\Entity\ProjectSnapshot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectSnapshotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $projectSnapshots = $this->paginate($this->ProjectSnapshots);

        $this->set(compact('projectSnapshots'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Snapshot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectSnapshot = $this->ProjectSnapshots->get($id, [
            'contain' => ['Projects', 'FileSnapshots']
        ]);

        $this->set('projectSnapshot', $projectSnapshot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectSnapshot = $this->ProjectSnapshots->newEntity();
        debug($projectSnapshot);
        if ($this->request->is('post')) {
            $projectSnapshot = $this->ProjectSnapshots->patchEntity($projectSnapshot, $this->request->getData());
            if ($this->ProjectSnapshots->save($projectSnapshot)) {
                $this->Flash->success(__('The project snapshot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project snapshot could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectSnapshots->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectSnapshot', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Snapshot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectSnapshot = $this->ProjectSnapshots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectSnapshot = $this->ProjectSnapshots->patchEntity($projectSnapshot, $this->request->getData());
            if ($this->ProjectSnapshots->save($projectSnapshot)) {
                $this->Flash->success(__('The project snapshot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project snapshot could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectSnapshots->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectSnapshot', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Snapshot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectSnapshot = $this->ProjectSnapshots->get($id);
        if ($this->ProjectSnapshots->delete($projectSnapshot)) {
            $this->Flash->success(__('The project snapshot has been deleted.'));
        } else {
            $this->Flash->error(__('The project snapshot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
