<?php

namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\Event\Event;

class DataAppController extends Controller {

	public function beforeFilter(Event $event) {
	    parent::beforeFilter($event);
		
        $this->response->header('Access-Control-Allow-Origin','*');
        $this->response->header('Access-Control-Allow-Methods','*');
        $this->response->header('Access-Control-Allow-Headers','X-ACCESS_TOKEN, Content-Type, x-xsrf-token, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        $this->response->header('Access-Control-Max-Age','172800');
	}

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
		
        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'scope' => ['Users.active' => 1]
                ],
                'ADmad/JwtAuth.Jwt' => [
                	'prefix' => '.ter',
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'scope' => ['Users.active' => 1],
                    'fields' => [
                        'username' => 'id'
                    ],
                    'queryDatasource' => true
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize'
        ]);
    }
}