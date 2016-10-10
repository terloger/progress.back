<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SportNutrition Controller
 *
 * @property \App\Model\Table\SportNutritionTable $SportNutrition
 */
class SportNutritionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sportNutrition = $this->paginate($this->SportNutrition);

        $this->set(compact('sportNutrition'));
        $this->set('_serialize', ['sportNutrition']);
    }

    /**
     * View method
     *
     * @param string|null $id Sport Nutrition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sportNutrition = $this->SportNutrition->get($id, [
            'contain' => ['NutritionLog']
        ]);

        $this->set('sportNutrition', $sportNutrition);
        $this->set('_serialize', ['sportNutrition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sportNutrition = $this->SportNutrition->newEntity();
        if ($this->request->is('post')) {
            $sportNutrition = $this->SportNutrition->patchEntity($sportNutrition, $this->request->data);
            if ($this->SportNutrition->save($sportNutrition)) {
                $this->Flash->success(__('The sport nutrition has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sport nutrition could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sportNutrition'));
        $this->set('_serialize', ['sportNutrition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sport Nutrition id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sportNutrition = $this->SportNutrition->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sportNutrition = $this->SportNutrition->patchEntity($sportNutrition, $this->request->data);
            if ($this->SportNutrition->save($sportNutrition)) {
                $this->Flash->success(__('The sport nutrition has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sport nutrition could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sportNutrition'));
        $this->set('_serialize', ['sportNutrition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sport Nutrition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sportNutrition = $this->SportNutrition->get($id);
        if ($this->SportNutrition->delete($sportNutrition)) {
            $this->Flash->success(__('The sport nutrition has been deleted.'));
        } else {
            $this->Flash->error(__('The sport nutrition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
