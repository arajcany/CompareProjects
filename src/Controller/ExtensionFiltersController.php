<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExtensionFilters Controller
 *
 * @property \App\Model\Table\ExtensionFiltersTable $ExtensionFilters
 *
 * @method \App\Model\Entity\ExtensionFilter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExtensionFiltersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $extensionFilters = $this->paginate($this->ExtensionFilters);

        $this->set(compact('extensionFilters'));
    }

    /**
     * View method
     *
     * @param string|null $id Extension Filter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $extensionFilter = $this->ExtensionFilters->get($id, [
            'contain' => []
        ]);

        $this->set('extensionFilter', $extensionFilter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $extensionFilter = $this->ExtensionFilters->newEntity();
        if ($this->request->is('post')) {
            $extensionFilter = $this->ExtensionFilters->patchEntity($extensionFilter, $this->request->getData());
            if ($this->ExtensionFilters->save($extensionFilter)) {
                $this->Flash->success(__('The extension filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extension filter could not be saved. Please, try again.'));
        }
        $this->set(compact('extensionFilter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extension Filter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $extensionFilter = $this->ExtensionFilters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $extensionFilter = $this->ExtensionFilters->patchEntity($extensionFilter, $this->request->getData());
            if ($this->ExtensionFilters->save($extensionFilter)) {
                $this->Flash->success(__('The extension filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extension filter could not be saved. Please, try again.'));
        }
        $this->set(compact('extensionFilter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Extension Filter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $extensionFilter = $this->ExtensionFilters->get($id);
        if ($this->ExtensionFilters->delete($extensionFilter)) {
            $this->Flash->success(__('The extension filter has been deleted.'));
        } else {
            $this->Flash->error(__('The extension filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
