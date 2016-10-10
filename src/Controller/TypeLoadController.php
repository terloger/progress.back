<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeLoad Controller
 *
 * @property \App\Model\Table\TypeLoadTable $TypeLoad
 */
class TypeLoadController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $typeLoad = $this->paginate($this->TypeLoad);

        $this->set(compact('typeLoad'));
        $this->set('_serialize', ['typeLoad']);
    }

    /**
     * View method
     *
     * @param string|null $id Type Load id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeLoad = $this->TypeLoad->get($id, [
            'contain' => ['Loads']
        ]);

        $this->set('typeLoad', $typeLoad);
        $this->set('_serialize', ['typeLoad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeLoad = $this->TypeLoad->newEntity();
        if ($this->request->is('post')) {
            $typeLoad = $this->TypeLoad->patchEntity($typeLoad, $this->request->data);
            if ($this->TypeLoad->save($typeLoad)) {
                $this->Flash->success(__('The type load has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type load could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeLoad'));
        $this->set('_serialize', ['typeLoad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Load id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeLoad = $this->TypeLoad->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeLoad = $this->TypeLoad->patchEntity($typeLoad, $this->request->data);
            if ($this->TypeLoad->save($typeLoad)) {
                $this->Flash->success(__('The type load has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type load could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeLoad'));
        $this->set('_serialize', ['typeLoad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Load id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeLoad = $this->TypeLoad->get($id);
        if ($this->TypeLoad->delete($typeLoad)) {
            $this->Flash->success(__('The type load has been deleted.'));
        } else {
            $this->Flash->error(__('The type load could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
