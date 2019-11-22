<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{
    public function initialize()
    {
        parent::initialize(); 
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_roles_list');
        $roles = $this->Roles->find()->toArray();
        $this->set(compact('roles'));
        
        //check auth user or redirect to login
        if (!$this->Auth->user()) {
            $this->redirect(['controller'=> 'Users' ,'action'=> 'login']); 
        }
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_role_detail');

        try {
            //$role = $this->Roles->get($id, ['contain' => ['UserRoles']]);
            $role = $this->Roles->get($id);
            $this->set('role', $role);
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Roles','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Roles','action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('add_role');

        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('edit_role');

        try {
            $role = $this->Roles->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $role = $this->Roles->patchEntity($role, $this->request->getData());
                if ($this->Roles->save($role)) {
                    $this->Flash->success(__('The role has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The role could not be saved. Please, try again.'));
            }
            $this->set(compact('role'));
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
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('delete_role');

        $this->request->allowMethod(['post', 'delete']);
        
        try {
            $role = $this->Roles->get($id);
     
            //if page not found, redirect back to list view
            if (empty($role)) {
                $this->Flash->error(__('Role not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Roles->delete($role)) {
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
     * isAuthorized method
     * Adding authorization logic for roles
     * @return \Cake\Http\Response| roles back to the referer.
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['index','view','delete','assignPermissions'])) {
            return true;
        }

      
    }                                                                                                                                                                   
    /* 
     * Assign permissions method
     *
     * @param id | role id
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function assignPermissions($id = null)
    {
        // Get all permissions from permissions table
        try {
            $allPermissions = $this->Roles->getAllPermissions();
            $this->set(compact('allPermissions'));
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Roles','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Roles','action' => 'index']);
        }

        // Get assigned permissions based on selected role/id
        try {
            $rolesPermissions = $this->Roles->get($id, [
                'contain' => ['Permissions']
            ])->toArray();  
            $this->set(compact('allPermissions','rolesPermissions'));
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Roles','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Roles','action' => 'index']);
        }    


        // storing data in the rolespermissions table, based on assigned permissions for the selected role
        if ($this->request->is('post')) {
            $submitted_data = $this->request->data;
            TableRegistry::get('RolesPermissions')->deleteall([
                                'role_id'=>$submitted_data['role_id']
                            ]);
            if(!empty($submitted_data)) {
                if(count($submitted_data['assign_permissions']) > 0 ){
                    foreach($submitted_data['assign_permissions'] as $permissionId) {
                        if($permissionId!='0'){
                            $data['permission_id'] = $permissionId;
                            $data['role_id'] = $submitted_data['role_id'];
        
                            $rolePermissionsTable = TableRegistry::get('RolesPermissions');
                            $dataTable = $rolePermissionsTable->newEntity();
                            $rolePermissionsTable->patchEntity($dataTable, $data);

                            try { 
                                if ($rolePermissionsTable->save($dataTable)) {
                                    $message = 'success';
                                }
                                else {
                                    $message = 'error';
                                }
                            } catch (\PDOException $e) {
                                $message = $e->getMessage();
                                $this->Flash->error($message);
                                return $this->redirect(['controller' => 'Roles','action' => 'index']);
                            } catch (\Exception $e) {
                                $message = $e->getMessage();
                                $this->Flash->error($message);
                                return $this->redirect(['controller' => 'Roles','action' => 'index']);
                            } 
                        }// end if($permissionId!='0')
                    }// end foreach($submitted_data['assign_permissions']
                    if(isset($message) && $message==='success')
                        $this->Flash->success(__('The permissions have been saved.'));
                    return $this->redirect(['controller' => 'Roles','action' => 'index']);
                }// end if(count($submitted_data['assign_permissions'])
            }// end if(!empty($submitted_data))
        } // end if ($this->request->is('post'))    
    } // end function
}