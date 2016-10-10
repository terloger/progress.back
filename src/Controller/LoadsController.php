<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Loads Controller
 *
 * @property \App\Model\Table\LoadsTable $Loads
 */
class LoadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeLoad', 'Days']
        ];
        $loads = $this->paginate($this->Loads);

        $this->set(compact('loads'));
        $this->set('_serialize', ['loads']);
    }

    /**
     * View method
     *
     * @param string|null $id Load id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $load = $this->Loads->get($id, [
            'contain' => ['TypeLoad', 'Days']
        ]);

        $this->set('load', $load);
        $this->set('_serialize', ['load']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $load = $this->Loads->newEntity();
        if ($this->request->is('post')) {
            $load = $this->Loads->patchEntity($load, $this->request->data);
            if ($this->Loads->save($load)) {
                $this->Flash->success(__('The load has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The load could not be saved. Please, try again.'));
            }
        }
        $typeLoad = $this->Loads->TypeLoad->find('list', ['limit' => 200]);
        $days = $this->Loads->Days->find('list', [
            'order' => ['Days.id' => 'DESC'],
            'limit' => 20,
            'contain' => ['Users'],
            'keyField' => 'Days.id',
            'valueField' => function ($e) {
                return $e->get('date')->i18nFormat('dd.MM.yyyy') . ' (' .  $e->user->get('name') . ')';
            }
        ]);
        
        
        $this->set(compact('load', 'typeLoad', 'days'));
        $this->set('_serialize', ['load']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Load id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $load = $this->Loads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $load = $this->Loads->patchEntity($load, $this->request->data);
            if ($this->Loads->save($load)) {
                $this->Flash->success(__('The load has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The load could not be saved. Please, try again.'));
            }
        }
        $typeLoad = $this->Loads->TypeLoad->find('list', ['limit' => 200]);
        $days = $this->Loads->Days->find('list', ['limit' => 200]);
        $this->set(compact('load', 'typeLoad', 'days'));
        $this->set('_serialize', ['load']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Load id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $load = $this->Loads->get($id);
        if ($this->Loads->delete($load)) {
            $this->Flash->success(__('The load has been deleted.'));
        } else {
            $this->Flash->error(__('The load could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
