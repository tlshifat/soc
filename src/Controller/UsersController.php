<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Network\Exception\NotFoundException;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Add the action to the allowed actions list.

        $this->Auth->allow();
        $this->loadComponent('Common');


        $action = $this->request->getParam('action');

        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'roles'])) {
            //return true;
        }

    }

     /**
     * Index method
     * It fetches a paginated set of users from the database, using the Users Model
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function index()
    {
        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_user_list');

        // Get all users, in association with the Roles table.
        $users = $this->paginate($this->Users->find('all')->contain(['Roles']));
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

        //check auth user or redirect to login
        if (!$this->Auth->user()) {
            $this->redirect(['controller'=> 'Users' ,'action'=> 'login']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_user_detail');

        try {
            $user = $this->Users->get($id, [
                'contain' => ['Roles']
            ]);
            $this->set('user', $user);
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
    }

    /**
     * Add User method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('add_user');

        // Get all roles from roles table and setting it for roles dropdown
        $allRoles = $this->Users->getAllRoles();
        $this->set(compact('allRoles'));

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($response = $this->Users->save($user)) {

//                //************Sending Email to client************
//
//                /****** set these variables if you want to send an email ******/
//                $emailCode = 'REG001';
//                $emailSubject = 'Welcome to the Website';
//
//                if($response->email!="") {
//                    $emailContent = array(
//                        '{SUBJECT}' => $emailSubject,
//                        '{NAME}' => ucwords($response->name),
//                        '{USER_EMAIL}' => $response->email,
//                        '{USER_PASSWORD}' => $this->request->data['password'],
//                        '{ACTIVATION_LINK}' => ''
//                    );
//                    $toEmail = $response->email;
//
//                    //Common function added in Common component.
//                    $this->Common->sendEmail($emailCode, $toEmail, $emailContent);
//                }

                //************Store data into joined table 'UserRoles' table************
                if(isset($response) && $response!="") {
                        if(!empty($this->request->data['role'])){

                            $userRolesTable = TableRegistry::get('UserRoles');
                            $userData = $userRolesTable->newEntity();
                            $userData['user_id'] = $response['id'];
                            $userData['role_id'] = $response['role'];

                            if($userRolesTable->save($userData)){
                                $this->Flash->success(__('The user has been saved.'));
                            }else {
                                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                            }
                            $this->redirect(['action' => 'index']);                        }
                }
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('edit_user');

        try {
            //find data of selected user, from associated tables as well
            $user = $this->Users->get($id, [
                            'contain' => ['Roles']
                        ]);

            //if page not found, redirect back to list view
            if (empty($user)) {
                $this->Flash->error(__('User not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

             // Get all roles from roles table and setting it for roles dropdown
            $allRoles = $this->Users->getAllRoles();

            //get the selected role id
            $selectedRole = $user['roles'];
            $this->set(compact('user','allRoles', 'selectedRole'));
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('delete_user');

        $this->request->allowMethod(['post', 'delete']);
        try {
            $user = $this->Users->get($id);

            //if page not found, redirect back to list view
            if (empty($user)) {
                $this->Flash->error(__('User not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Users->delete($user)) {
                return $this->response->withType("application/json")->withStringBody(json_encode(array('status' => 'deleted'))); die;
            } else {
                return $this->response->withType("application/json")->withStringBody(json_encode(array('status' => 'error'))); die;
            }
            return $this->redirect(['action' => 'index']);
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Users','action' => 'index']);
        }
    }


    /**
     * Login method
     *
     * @return \Cake\Http\Response|null Redirects on login page.
     */
    public function login()
    {
        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('user_login');

        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            try {
                $user = $this->Auth->identify();
                if ($user) {
                    if ($user['status']==2) { //check for inactive status
                        $this->Flash->error('Your account has been blocked. Please contact admin.');
                    } else {

                        // Code for Remember me option
                        if(isset($this->request->data['remember_me'])) {

                            if($this->request->data['remember_me'] == "1") {
                                $cookie = array();
                                $cookie['remember_me']  = $this->request->data['remember_me'];
                                $cookie['email']     = $this->request->data['email'];
                                $cookie['password']     = $this->request->data['password'];
                                $this->Cookie->write('rememberMe', $cookie, true, "1 week");
                                unset($this->request->data['remember_me']);
                            }else {
                                $this->Cookie->delete('rememberMe');
                            }

                        }else {
                            $this->Cookie->delete('rememberMe');
                        }

                        // set permission data for hiding menu start
                        $userRoleId = TableRegistry::get('Users')->getUserRoleId($user['id']); // Get role assigned to user
                        $assignedRolePermissions = TableRegistry::get('Users')->getRolePermissions($userRoleId);  // Get permissions based on assigned role
                        $permissions = explode(",", $assignedRolePermissions);

                        $methods = $permissions;

                        $this->session = $this->request->getSession();
                        $this->session->write('methods', $methods);

                        //end
                        $this->Auth->setUser($user);
                        //return $this->redirect($this->Auth->redirectUrl());
                        $message = 'Logged in successfully.';
                        $this->Flash->success(__($message));
                        return $this->redirect(['controller'=>'users','action'=>'dashboard']);

                    }
                }
                else {
                    $this->Flash->error('Your email or password is incorrect.');
                }

            } catch (\Exception $e) {
                $message = $e->getMessage();
                $this->Flash->error($message);
            }

        }
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null Redirects on register page.
     */
    public function register()
    {
        // This function checks for the permission access for this method, based on assigned role.
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('user_login');

        $this->viewBuilder()->layout('login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //Generating a random token for security
            $random_token  = $this->Common->generateRandomString(4);
            $this->request->data['token'] = md5($this->request->data['email'].$random_token);
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $errors = $user->errors();
            if($result = $this->Users->save($user)){

                /******** Code for sending welcome email along with activation link*******/
                if(empty($this->request->data['id'])){
                    $activationlink  =  $this->siteUrl."users/activateaccount/".$result->token;
                    $contentArray = array(
                        '{SUBJECT}' =>"Welcome to Website",
                        '{NAME}' => ucwords($result->name),
                        '{USER_EMAIL}' => $result->email,
                        '{USER_PASSWORD}' => $this->request->data['password'],
                        '{ACTIVATION_LINK}' => $activationlink
                    );
                    $toEmail = $result->email;

                    $this->Common->sendEmail("REG002", $toEmail, $contentArray);
                }
                /******** Code for sending welcome email along with activation link*******/

                $this->Flash->success(__('The user has been created.'));

                return $this->redirect(['controller'=>'users','action'=>'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
    * Function to activate account.
    * User will activate account using this function.
    */

    /**
     * Activate user's account
     *
     * @param string|null $token user token.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function activateaccount($token = null){
        if(isset($token) && !empty($token)){
            $usersTable = TableRegistry::get('Users');

            $userId = $usersTable->getUserid($token);
            if(isset($userId) && !empty($userId)){
                $updateArraydata = array();
                $newArraydata = array();
                $updateArraydata = $usersTable->get($userId);

                $newArraydata['status'] = 1; //setting user status to active => 1
                $newArraydata['token_status'] = 2; //setting token status to expired => 2
                $newArraydata['modified'] = date('Y-m-d H:i:s');

                $usersData = $usersTable->patchEntity($updateArraydata,$newArraydata);
                $errors = $usersData->errors();

                if(count($errors) <= 0){
                    if($usersTable->save($usersData)){
                        $message = 'Account activated successfully.';
                        $this->Flash->success(__($message));
                        return $this->redirect(['controller'=>'users','action'=>'login']);
                    }
                }else{
                    $message = 'Problem while activating your account.';
                     $this->Flash->error(__($message));
                     return $this->redirect(['controller'=>'users','action'=>'login']);
                }

            }else{

                $message = 'Token has been expired.';
                $this->Flash->error(__($message));
                return $this->redirect(['controller'=>'users','action'=>'login']);
            }
        }else{
            $message = 'Token key missing.';
            $this->Flash->error(__($message));
            return $this->redirect(['controller'=>'users','action'=>'login']);

        }

    }


    /**
     * manage_status method
     * Function to manage the user status
     * @return \Cake\Http\Response|null Redirects on login page.
     */
    public function manage_status($id){
        $usrEnt = $this->Users->newEntity();
        if(isset($id) &&  !empty($id)) {
            $usrEnt = $this->Users->get($id);
            $usrEnt['status'] = ($usrEnt['status'] == 1 ? 2 : 1);
            if($this->Users->save($usrEnt)){
                echo json_encode(array('status' => 0,'msg' => 'Status updated successfully.'));
                die;
            }else{
                echo json_encode(array('status' => 1,'msg' => 'Unable to update status.'));
                die;
            }
        }else{
            echo json_encode(array('status' => 1,'msg' => 'Unable to update status.'));
            die;
        }

    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null Redirects on login page.
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function dashboard()
    {
        $userPerm = $this->getUserAssignedPermissions('view_user_list');
        // Get all users, in association with the Roles table.
        $users = $this->paginate($this->Users->find('all')->contain(['Roles']));
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

    }


}
