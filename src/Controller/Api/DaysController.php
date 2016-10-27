<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\I18n\Time;

class DaysController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'sortWhitelist' => [
            'id', 'date'
        ],
        'contain' => ['Loads', 'Loads.TypeLoad', 'ValuesLog', 'ValuesLog.Units', 'NutritionLog', 'NutritionLog.SportNutrition']
    ];
    
    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Crud->mapAction('day', [
            'className' => '\App\Crud\Action\DayAction',
            'view' => 'day'
        ]);
    }
    
    public function index() {
        $for_all = $this->request->query('for_all');
        
        $this->Crud->on('beforePaginate', function(\Cake\Event\Event $event) use ($for_all) {
            if (!($this->Auth->user('is_admin') && $for_all)) {
                $this->paginate['conditions']['user_id'] = $this->Auth->user('id');
            }
        });

        return $this->Crud->execute();
    }
    
    public function view($id) {
        $this->Crud->on('beforeFind', function(\Cake\Event\Event $event) {
            $event->subject()->query->contain(['Loads', 'Loads.TypeLoad', 'ValuesLog', 'ValuesLog.Units', 'NutritionLog', 'NutritionLog.SportNutrition']);
            $event->subject()->query->where(['user_id' => $this->Auth->user('id')]);
        });

        return $this->Crud->execute();
    }
    
    public function day($date) {
        $this->Crud->on('beforeFind', function(\Cake\Event\Event $event) {
            $event->subject()->query->contain(['Loads', 'Loads.TypeLoad', 'ValuesLog', 'ValuesLog.Units', 'NutritionLog', 'NutritionLog.SportNutrition']);
            
            $event->subject()->query->where([
                'Days.user_id' => $this->Auth->user('id')
            ]);
        });

        return $this->Crud->execute();
    }
}