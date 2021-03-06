<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add', 'token']);
    }

    /**
     * Create new user and return id plus JWT token
     */
    public function add() {
        $this->Crud->on('afterSave', function(Event $event) {
            if ($event->subject->created) {
                $this->set('data', [
                    'id' => $event->subject->entity->id,
                    'token' => JWT::encode(
                        [
                            'sub' => $event->subject->entity->id,
                            'exp' =>  time() + 604800
                        ],
                        Security::salt()
                    )
                ]);
                $this->Crud->action()->config('serialize.data', 'data');
            }
        });
        return $this->Crud->execute();
    }

    /**
     * Return JWT token if posted user credentials pass FormAuthenticate
     */
    public function token() {
        $user = $this->Auth->identify();
        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode(
                    [
                        'sub' => $user['id']
                        //'exp' =>  time() + 604800 // не будем пока экспарить токен
                    ],
                    Security::salt()
                ),
                'user' => $user
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    public function index() {
        $this->Crud->on('beforePaginate', function(\Cake\Event\Event $event) {
            if (!$this->Auth->user('is_admin')) {
                $this->paginate['conditions']['name'] = '__NOT_PRESENT__';
            }
        });

        return $this->Crud->execute();
    }
    
    public function view($id) {
        if (!$this->Auth->user('is_admin') && $this->Auth->user('id') !== $id) {
            $this->Crud->on('beforeFind', function(\Cake\Event\Event $event) {
                $event->subject()->query->where(['name' => '__NOT_PRESENT__']);
            });
        }

        return $this->Crud->execute();
    }
}