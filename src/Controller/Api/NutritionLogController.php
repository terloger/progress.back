<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class NutritionLogController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);

        $this->Crud->disable(['Index']);
    }
    
}