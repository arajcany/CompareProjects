<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExtensionLists Controller
 *
 * @property \App\Model\Table\ExtensionListsTable $ExtensionLists
 *
 * @method \App\Model\Entity\ExtensionList[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExtensionListsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $extensionLists = $this->paginate($this->ExtensionLists);

        $this->set(compact('extensionLists'));
    }

    /**
     * View method
     *
     * @param string|null $id Extension List id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $extensionList = $this->ExtensionLists->get($id, [
            'contain' => []
        ]);

        $this->set('extensionList', $extensionList);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $extensionList = $this->ExtensionLists->newEntity();
        if ($this->request->is('post')) {
            $extensionList = $this->ExtensionLists->patchEntity($extensionList, $this->request->getData());
            if ($this->ExtensionLists->save($extensionList)) {
                $this->Flash->success(__('The extension list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extension list could not be saved. Please, try again.'));
        }
        $this->set(compact('extensionList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extension List id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $extensionList = $this->ExtensionLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $extensionList = $this->ExtensionLists->patchEntity($extensionList, $this->request->getData());
            if ($this->ExtensionLists->save($extensionList)) {
                $this->Flash->success(__('The extension list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extension list could not be saved. Please, try again.'));
        }
        $this->set(compact('extensionList'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Extension List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $extensionList = $this->ExtensionLists->get($id);
        if ($this->ExtensionLists->delete($extensionList)) {
            $this->Flash->success(__('The extension list has been deleted.'));
        } else {
            $this->Flash->error(__('The extension list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
