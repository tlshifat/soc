<?php
// src/Controller/FaqController.php

namespace App\Controller;
use Cake\Http\Exception\NotFoundException;

class FaqController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
     /**
     * Index method
     * It fetches a paginated set of articles from the database, using the Articles Model
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function index()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_faq'); 

        $this->loadComponent('Paginator');
        $faqs = $this->Paginator->paginate($this->Faq->find());
        $this->set(compact('faqs'));//uses set() to pass the articles into its template 

        //check auth user or redirect to login
       if (!$this->Auth->user()) {
            $this->redirect(['controller'=> 'Users' ,'action'=> 'login']); 
        }
    }

    /**
     * View method
     * This method show the article view specified by $slug
     * @param slug|null $slug post-name.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	public function view($slug = null)
	{
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_faq'); 

       try {
    		//findBySlug() method allows us to create a basic query that finds articles by a given slug
    	    $faq = $this->Faq
    	    		->findById($slug)
    	    		->first(); 
            
            //if page not found, redirect back to list view
            if(empty($faq)) {
                $this->Flash->error(__('Page not found'));
                return $this->redirect(['action' => 'index']);
            }             
    	    $this->set(compact('faq')); 
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
     * Add Article method
     * If the HTTP method of the request was POST, it saves the data using the Articles model.
     * @return \Cake\Http\Response|null Redirects on successful add article, renders view otherwise with user validation errors or other warnings..
     */ 	
 	public function add()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('add_faq'); 

	$allTitle = $this->Faq->getAllTitle();
        $this->set(compact('allTitle')); 

        $faq = $this->Faq->newEntity();
        if ($this->request->is('post')) { // check if the request is a HTTP POST request.
		$data['question'] = $this->request->data['question'];
		$data['answer'] = $this->request->data['answer'];
		print_r($this->request->getData());
	     if(isset($this->request->data['title_new']) && $this->request->data['title_new']!='') {
			$data['title'] = $this->request->data['title_new'];
		}
	     else {	
			$data['title'] = $this->request->data['title'];
		}
		$data['slug'] = $data['title'];
            $faq = $this->Faq->patchEntity($faq, $data); //POST data is available in $this->request->getData()

            if ($this->Faq->save($faq)) {
                $this->Flash->success(__('Faq has been saved.')); //Use FlashComponent’s success() method to set a message into the session.
                $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add faq.'));
        }
        $this->set('faq', $faq);

    }

    /**
     * Edit method
     * This method edit the article specified by $slug
     * @param string|null $slug post-name.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($slug)
	{
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('edit_faq'); 
        
        try {
            //findBySlug() method allows us to create a basic query that finds articles by a given slug
            $faq = $this->Faq
                    ->findById($slug)
                    ->first(); 
            
            //if page not found, redirect back to list view
            if(empty($faq)) {
                $this->Flash->error(__('Faq not found'));
                return $this->redirect(['action' => 'index']);
            }

    	    if ($this->request->is(['post', 'put'])) {
    	        $this->Faq->patchEntity($faq, $this->request->getData());

    	        if ($this->Faq->save($faq)) {
    	            $this->Flash->success(__('Your Faq has been updated.'));
    	            return $this->redirect(['action' => 'index']);
    	        }
    	        $this->Flash->error(__('Unable to update faq.'));
    	    }

    	    $this->set('faq', $faq);
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
     * This method deletes the article specified by $slug
     * @param string|null $slug post-name.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	public function delete($id = null)
	{
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('delete_faq'); 

	    $this->request->allowMethod(['post', 'delete']); 

        try {
            $faq = $this->Faq->get($id);

            //if page not found, redirect back to list view
            if(empty($faq)) {
                $this->Flash->error(__('Faq not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Faq->delete($faq)) {
                return $this->response->withType("application/json")->withStringBody(json_encode(array('status' => 'deleted'))); die;
            } else {
                return $this->response->withType("application/json")->withStringBody(json_encode(array('status' => 'error'))); die;
            }
                        
            return $this->redirect(['controller' => 'faq','action' => 'index']);      
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
     * Adding authorization logic for articles
     * @return \Cake\Http\Response| redirects back to the referer.
     */
	public function isAuthorized($user)
	{
	    $action = $this->request->getParam('action');
	    // The add and tags actions are always allowed to logged in users.
	    if (in_array($action, ['index','add', 'tags','delete'])) {
	        return true;
	    }

	}

}

