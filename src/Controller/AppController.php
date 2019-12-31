<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('Paginator');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'storage' => [
                 'className' => 'Session',
                 'key' => 'Auth.User',
            ],
             //use isAuthorized in Controllers
            'authorize' => ['Controller'],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index','add', 'edit','indexmy','addmy']);


        //Get site url configured in bootstrap.
        $SITEURL = Configure::read('SITEURL');
        $this->siteUrl = $SITEURL;

        if($this->Cookie->read('rememberMe') != null){
            $remembered_data = $this->Cookie->read('rememberMe');
            $this->set(compact('remembered_data'));
        }


        if($this->Auth->user()){
            $user = $this->Auth->user();
            $this->set('loginuserdata', $user);
        }

        $action = $this->request->getParam('action');

        if ($action != 'login') {
            if ($this->Auth->user()) {

            }else{
                $this->redirect(['controller'=> 'Users' ,'action'=> 'login']);
            }

        }

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }


    public function isAuthorized($user)
    {
        // By default deny access.
        return false;
    }


    /**
     * Find looged in user permissions based on assigned role
     * @param string $id | role id
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getUserAssignedPermissions($method) {

        $user = $this->Auth->user();
        if(isset($user)) {
            try {
                $userRoleId = TableRegistry::get('Users')->getUserRoleId($user['id']); // Get role assigned to user

                if(isset($userRoleId)) {
                    $assignedRolePermissions = TableRegistry::get('Users')->getRolePermissions($userRoleId);  // Get permissions based on assigned role
                    $permissions = explode(",", $assignedRolePermissions);
                    if(in_array($method, $permissions)) {
                        return true;
                    }else {
                        $this->Flash->error(__("You don't have permissions to access this page. Please contact Admin."));
                        return $this->redirect(['controller' => 'Users','action' => 'dashboard']);
                    }
                } else { // end if(isset($userRoleId))
                    return false;
                }

            } catch (\PDOException $e) {
                $message = $e->getMessage();
                $this->Flash->error($message);
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            } catch (\Exception $e) {
                $message = $e->getMessage();
                $this->Flash->error($message);
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            }


        }else { // end if(isset($user))
            return false;
        }
    } // end function getUserAssignedPermissions()

    public function _userId(){
        return $this->Auth->user()['id'];
    }

}
