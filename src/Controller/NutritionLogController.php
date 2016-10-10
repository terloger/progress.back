<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NutritionLog Controller
 *
 * @property \App\Model\Table\NutritionLogTable $NutritionLog
 */
class NutritionLogController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SportNutrition', 'Days']
        ];
        $nutritionLog = $this->paginate($this->NutritionLog);

        $this->set(compact('nutritionLog'));
        $this->set('_serialize', ['nutritionLog']);
    }

    /**
     * View method
     *
     * @param string|null $id Nutrition Log id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nutritionLog = $this->NutritionLog->get($id, [
            'contain' => ['SportNutrition', 'Days']
        ]);

        $this->set('nutritionLog', $nutritionLog);
        $this->set('_serialize', ['nutritionLog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nutritionLog = $this->NutritionLog->newEntity();
        if ($this->request->is('post')) {
            $nutritionLog = $this->NutritionLog->patchEntity($nutritionLog, $this->request->data);
            if ($this->NutritionLog->save($nutritionLog)) {
                $this->Flash->success(__('The nutrition log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nutrition log could not be saved. Please, try again.'));
            }
        }
        $sportNutrition = $this->NutritionLog->SportNutrition->find('list', ['limit' => 200]);
        $days = $this->NutritionLog->Days->find('list', [
            'order' => ['Days.id' => 'DESC'],
            'limit' => 20,
            'contain' => ['Users'],
            'valueField' => function ($e) {
                return $e->get('date')->i18nFormat('dd.MM.yyyy') . ' (' .  $e->user->get('name') . ')';
            }
        ]);
        
        $this->set(compact('nutritionLog', 'sportNutrition', 'days'));
        $this->set('_serialize', ['nutritionLog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nutrition Log id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nutritionLog = $this->NutritionLog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nutritionLog = $this->NutritionLog->patchEntity($nutritionLog, $this->request->data);
            if ($this->NutritionLog->save($nutritionLog)) {
                $this->Flash->success(__('The nutrition log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nutrition log could not be saved. Please, try again.'));
            }
        }
        $sportNutrition = $this->NutritionLog->SportNutrition->find('list', ['limit' => 200]);
        $days = $this->NutritionLog->Days->find('list', ['limit' => 200]);
        $this->set(compact('nutritionLog', 'sportNutrition', 'days'));
        $this->set('_serialize', ['nutritionLog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nutrition Log id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nutritionLog = $this->NutritionLog->get($id);
        if ($this->NutritionLog->delete($nutritionLog)) {
            $this->Flash->success(__('The nutrition log has been deleted.'));
        } else {
            $this->Flash->error(__('The nutrition log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
