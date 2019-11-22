<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

/**
 * EmailTemplates Controller
 *
 * @property \App\Model\Table\EmailTemplatesTable $EmailTemplates
 *
 * @method \App\Model\Entity\EmailTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailTemplatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_email_template_list'); 

        $this->loadComponent('Paginator');
        $emailTemplates = $this->Paginator->paginate($this->EmailTemplates->find());
        $this->set(compact('emailTemplates'));//uses set() to pass the articles into its template 

        //check auth user or redirect to login
        if (!$this->Auth->user()) {
            $this->redirect(['controller'=> 'Users' ,'action'=> 'login']); 
        }
    }
    /**
     * View method
     *
     * @param string|null $id Email Template id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_email_template_detail'); 

        try {
            $emailTemplate = $this->EmailTemplates->findById($id)->first();
            
            //if page not found, redirect back to list view
            if (empty($emailTemplate)) {
                $this->Flash->error(__('Email template not found'));
                return $this->redirect(['action' => 'index']);
            }

            $this->set('emailTemplate', $emailTemplate);
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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('add_email_template'); 

        $emailTemplate = $this->EmailTemplates->newEntity();
        if ($this->request->is('post')) {
            $emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());
            if ($this->EmailTemplates->save($emailTemplate)) {
                $this->Flash->success(__('The email template has been saved.'));
                $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email template could not be saved. Please, try again.'));
        }
        $this->set(compact('emailTemplate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Email Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('edit_email_template'); 

        try {
            $emailTemplate = $this->EmailTemplates->findById($id)->first();
            
            //if page not found, redirect back to list view
            if (empty($emailTemplate)) {
                $this->Flash->error(__('Template not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->request->is(['patch', 'post', 'put'])) {
                $emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());
                if ($this->EmailTemplates->save($emailTemplate)) {
                    $this->Flash->success(__('The email template has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The email template could not be saved. Please, try again.'));
            }
            $this->set(compact('emailTemplate'));
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
     * @param string|null $id Email Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('delete_email_template');

        $this->request->allowMethod(['post', 'delete']);
        try {
            $emailTemplate = $this->EmailTemplates->get($id);
            if ($this->EmailTemplates->delete($emailTemplate)) {
                $this->Flash->success(__('The email template has been deleted.'));
            } else {
                $this->Flash->error(__('The email template could not be deleted. Please, try again.'));
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
     * Adding authorization logic for email templates
     * @return \Cake\Http\Response| redirects back to the referer.
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['index','view'])) {
            return true;
        }

      
    }
}
