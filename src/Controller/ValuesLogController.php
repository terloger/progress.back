<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ValuesLog Controller
 *
 * @property \App\Model\Table\ValuesLogTable $ValuesLog
 */
class ValuesLogController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['ValuesLog.id' => 'DESC'],
            'contain' => ['Units', 'Days']
        ];
        $valuesLog = $this->paginate($this->ValuesLog);

        $this->set(compact('valuesLog'));
        $this->set('_serialize', ['valuesLog']);
    }

    /**
     * View method
     *
     * @param string|null $id Values Log id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $valuesLog = $this->ValuesLog->get($id, [
            'contain' => ['Units', 'Days']
        ]);

        $this->set('valuesLog', $valuesLog);
        $this->set('_serialize', ['valuesLog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $valuesLog = $this->ValuesLog->newEntity();
        if ($this->request->is('post')) {
            $valuesLog = $this->ValuesLog->patchEntity($valuesLog, $this->request->data);
            if ($this->ValuesLog->save($valuesLog)) {
                $this->Flash->success(__('The values log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The values log could not be saved. Please, try again.'));
            }
        }
        $units = $this->ValuesLog->Units->find('list', ['limit' => 200]);
        $days = $this->ValuesLog->Days->find('list', [
            'order' => ['Days.id' => 'DESC'],
            'limit' => 20,
            'contain' => ['Users'],
            'valueField' => function ($e) {
                return $e->get('date') . ' (' .  $e->user->get('name') . ')';
            }
        ]);
        
        $this->set(compact('valuesLog', 'units', 'days'));
        $this->set('_serialize', ['valuesLog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Values Log id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $valuesLog = $this->ValuesLog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $valuesLog = $this->ValuesLog->patchEntity($valuesLog, $this->request->data);
            if ($this->ValuesLog->save($valuesLog)) {
                $this->Flash->success(__('The values log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The values log could not be saved. Please, try again.'));
            }
        }
        $units = $this->ValuesLog->Units->find('list', ['limit' => 200]);
        $days = $this->ValuesLog->Days->find('list', ['limit' => 200]);
        $this->set(compact('valuesLog', 'units', 'days'));
        $this->set('_serialize', ['valuesLog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Values Log id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $valuesLog = $this->ValuesLog->get($id);
        if ($this->ValuesLog->delete($valuesLog)) {
            $this->Flash->success(__('The values log has been deleted.'));
        } else {
            $this->Flash->error(__('The values log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
