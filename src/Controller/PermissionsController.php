<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
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
        $userPerm = $this->getUserAssignedPermissions('view_permission_list');
        $permissions = $this->Permissions->find()->toArray();
        $this->set(compact('permissions'));//uses set() to pass the articles into its template

    }

    /**
     * View method
     *
     * @param string|null $id permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_permission_detail');

        try {
            $permission = $this->Permissions->get($id);
            $this->set('permission', $permission);
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Permissions','action' => 'index']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $this->Flash->error($message);
            return $this->redirect(['controller' => 'Permissions','action' => 'index']);
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
        $userPerm = $this->getUserAssignedPermissions('add_permission');

        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $this->set(compact('permission'));
    }

    /**
     * Edit method
     *
     * @param string|null $id permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('edit_permission');

        try {
            $permission = $this->Permissions->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
                if ($this->Permissions->save($permission)) {
                    $this->Flash->success(__('The permission has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
            $this->set(compact('permission'));
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
     * @param string|null $id permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('delete_permission');

        try {
            $this->request->allowMethod(['post', 'delete']);
            $permission = $this->Permissions->get($id);
     
            //if page not found, redirect back to list view
            if (empty($permission)) {
                $this->Flash->error(__('Permission not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Permissions->delete($permission)) {
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
     * Adding authorization logic for permissions
     * @return \Cake\Http\Response| permissions back to the referer.
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['index','view','delete'])) {
            return true;
        }

      
    }                                                                                                                                                                                                                                                                                                        
}
