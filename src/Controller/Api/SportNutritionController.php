<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class SportNutritionController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 1000,
        'order' => ['name' => 'ASC'],
    ];

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);

        $this->Crud->disable(['Edit', 'Delete']);
    }
}