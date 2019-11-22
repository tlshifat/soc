<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\Http\Exception\NotFoundException;

class ArticlesController extends AppController
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
        $userPerm = $this->getUserAssignedPermissions('view_page_list'); 

        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));//uses set() to pass the articles into its template 

        //check auth user or redirect to login
        if (!$this->Auth->user()) {
            $this->redirect(['controller'=> 'Users' ,'action'=> 'login']); 
        }
    }
 /**
     * Index method
     * It fetches a paginated set of articles from the database, using the Articles Model
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function demo()
    {
        // This function checks for the permission access for this method, based on assigned role. 
        // There should be a 'slug' matching to the parameter passed in this method, in the 'permissions' table.
        $userPerm = $this->getUserAssignedPermissions('view_page_list'); 

        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));//uses set() to pass the articles into its template 

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
        $userPerm = $this->getUserAssignedPermissions('view_page_detail'); 

       try {
    		//findBySlug() method allows us to create a basic query that finds articles by a given slug
    	    $article = $this->Articles
    	    		->findBySlug($slug)
    	    		->first(); 
            
            //if page not found, redirect back to list view
            if(empty($article)) {
                $this->Flash->error(__('Page not found'));
                return $this->redirect(['action' => 'index']);
            }             
    	    $this->set(compact('article')); 
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
        $userPerm = $this->getUserAssignedPermissions('add_page'); 

        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) { // check if the request is a HTTP POST request.
            $article = $this->Articles->patchEntity($article, $this->request->getData()); //POST data is available in $this->request->getData()

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Page has been saved.')); //Use FlashComponent’s success() method to set a message into the session.
                $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add page.'));
        }
        $this->set('article', $article);

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
        $userPerm = $this->getUserAssignedPermissions('edit_page'); 
        
        try {
            //findBySlug() method allows us to create a basic query that finds articles by a given slug
            $article = $this->Articles
                    ->findBySlug($slug)
                    ->first(); 
            
            //if page not found, redirect back to list view
            if(empty($article)) {
                $this->Flash->error(__('Page not found'));
                return $this->redirect(['action' => 'index']);
            }

    	    if ($this->request->is(['post', 'put'])) {
    	        $this->Articles->patchEntity($article, $this->request->getData());

    	        if ($this->Articles->save($article)) {
    	            $this->Flash->success(__('Your article has been updated.'));
    	            return $this->redirect(['action' => 'index']);
    	        }
    	        $this->Flash->error(__('Unable to update page.'));
    	    }

    	    $this->set('article', $article);
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
        $userPerm = $this->getUserAssignedPermissions('delete_page'); 

	    $this->request->allowMethod(['post', 'delete']); 

        try {
            $article = $this->Articles->get($id);

            //if page not found, redirect back to list view
            if(empty($article)) {
                $this->Flash->error(__('Page not found'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Articles->delete($article)) {
                return $this->response->withType("application/json")->withStringBody(json_encode(array('status' => 'deleted'))); die;
            } else {
                return $this->response->withType("application/json")->withStringBody(json_encode(array('status' => 'error'))); die;
            }
                        
            return $this->redirect(['controller' => 'articles','action' => 'index']);      
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

