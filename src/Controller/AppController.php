<?php
namespace App\Controller;

use Cake\Cache\Cache;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends \Cake\Controller\Controller {
    public function initialize() {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Articles',
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home',
            ],
        ]);
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['index', 'view', 'video', 'display', 'loadPages']);

        //导航
        if (($navigations = Cache::read('navigations')) === false) {
            $this->loadModel('Navigations');
            $navigations = json_encode($this->Navigations->find('all'));
            Cache::write('navigations', $navigations);
        }
        $this->set('navigations', json_decode($navigations));
    }
}
