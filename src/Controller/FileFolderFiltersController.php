<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FileFolderFilters Controller
 *
 * @property \App\Model\Table\FileFolderFiltersTable $FileFolderFilters
 *
 * @method \App\Model\Entity\FileFolderFilter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FileFolderFiltersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $fileFolderFilters = $this->paginate($this->FileFolderFilters);

        $this->set(compact('fileFolderFilters'));
    }

    /**
     * View method
     *
     * @param string|null $id File Folder Filter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fileFolderFilter = $this->FileFolderFilters->get($id, [
            'contain' => []
        ]);

        $this->set('fileFolderFilter', $fileFolderFilter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fileFolderFilter = $this->FileFolderFilters->newEntity();
        if ($this->request->is('post')) {
            $fileFolderFilter = $this->FileFolderFilters->patchEntity($fileFolderFilter, $this->request->getData());
            if ($this->FileFolderFilters->save($fileFolderFilter)) {
                $this->Flash->success(__('The file folder filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file folder filter could not be saved. Please, try again.'));
        }
        $this->set(compact('fileFolderFilter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id File Folder Filter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fileFolderFilter = $this->FileFolderFilters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fileFolderFilter = $this->FileFolderFilters->patchEntity($fileFolderFilter, $this->request->getData());
            if ($this->FileFolderFilters->save($fileFolderFilter)) {
                $this->Flash->success(__('The file folder filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file folder filter could not be saved. Please, try again.'));
        }
        $this->set(compact('fileFolderFilter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id File Folder Filter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fileFolderFilter = $this->FileFolderFilters->get($id);
        if ($this->FileFolderFilters->delete($fileFolderFilter)) {
            $this->Flash->success(__('The file folder filter has been deleted.'));
        } else {
            $this->Flash->error(__('The file folder filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
