<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nominees Controller
 *
 * @property \App\Model\Table\NomineesTable $Nominees
 *
 * @method \App\Model\Entity\Nominee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NomineesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $nominees = $this->paginate($this->Nominees);

        $this->set(compact('nominees'));
    }

    /**
     * View method
     *
     * @param string|null $id Nominee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nominee = $this->Nominees->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('nominee', $nominee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nominee = $this->Nominees->newEntity();
        if ($this->request->is('post')) {
            //directory work
            $dir = \Cake\Core\Configure::read('App.wwwRoot');
            $upLoadsDirectory = $dir.'/img/nominee';

            if (!file_exists($upLoadsDirectory)) {
                mkdir($upLoadsDirectory, 0777, true);
            }

            //for picture
            $fileParams = $this->request->data['picture'];
            $info = pathinfo($fileParams['name']);
            $pathPicture = md5($fileParams['name']) . '-' . uniqid() . '.' . $info['extension'];
            if (!move_uploaded_file($this->request->data['picture']['tmp_name'], $upLoadsDirectory.'/' . $pathPicture)) {
                var_dump('Cant move picture ');
                die;
            }
            unset($this->request->data['picture']);
            //end
            //start nid
            $fileParams = $this->request->data['nid'];
            $info = pathinfo($fileParams['name']);
            $pathNid = md5($fileParams['name']) . '-' . uniqid() . '.' . $info['extension'];
            if (!move_uploaded_file($this->request->data['nid']['tmp_name'], $upLoadsDirectory.'/' . $pathNid)) {
                var_dump('Cant move nid ');
                die;
            }
            unset($this->request->data['nid']);
            //end

            $nominee = $this->Nominees->patchEntity($nominee, $this->request->getData());
            $nominee->picture = $pathPicture;
            $nominee->nid = $pathNid;
            if ($this->Nominees->save($nominee)) {
                $this->Flash->success(__('The nominee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nominee could not be saved. Please, try again.'));
        }
        $users = $this->Nominees->Users->find('list', ['limit' => 200]);
        $relations =array(""=>"Select",
            "Father"=>"Father",
            "Mother"=>"Mother",
            "Brother"=>"Brother",
            "Sister"=>"Sister");
        $this->set(compact('nominee', 'users','relations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nominee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nominee = $this->Nominees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // copy paste
            $dir = \Cake\Core\Configure::read('App.wwwRoot');
            $upLoadsDirectory = $dir.'/img/nominee';

            if (!file_exists($upLoadsDirectory)) {
                mkdir($upLoadsDirectory, 0777, true);
            }
            //end :)
            //for picture
            $fileParams = $this->request->data['picture'];
            $info = pathinfo($fileParams['name']);
            $pathPicture = md5($fileParams['name']) . '-' . uniqid() . '.' . $info['extension'];

            if(!empty($pathPicture) && !empty($this->request->data['picture']['name'])){
                $imageTrue ='ok';
                if (!move_uploaded_file($this->request->data['picture']['tmp_name'], $upLoadsDirectory.'/' . $pathPicture)) {
                    var_dump('Cant move picture ');
                    die;
                }
            }

            unset($this->request->data['picture']);
            //end
            //start signature
            $fileParams = $this->request->data['nid'];
            $info = pathinfo($fileParams['name']);
            $pathSign = md5($fileParams['name']) . '-' . uniqid() . '.' . $info['extension'];

            if(!empty($pathSign) && !empty($this->request->data['nid']['name'])){
                $signTrue ='ok';
                if (!move_uploaded_file($this->request->data['nid']['tmp_name'], $upLoadsDirectory.'/' . $pathSign)) {
                    var_dump('Cant move nid ');
                    die;
                }
            }
            unset($this->request->data['nid']);
            //end
            $nominee = $this->Nominees->patchEntity($nominee, $this->request->getData());
            if(!empty($pathPicture) && !empty($imageTrue)){$nominee->picture = $pathPicture;}

            if(!empty($pathSign) && !empty($signTrue)){$nominee->nid = $pathSign;}
            if ($this->Nominees->save($nominee)) {
                $this->Flash->success(__('The nominee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nominee could not be saved. Please, try again.'));
        }
        $users = $this->Nominees->Users->find('list', ['limit' => 200]);
        $relations =array(""=>"Select",
            "Father"=>"Father",
            "Mother"=>"Mother",
            "Brother"=>"Brother",
            "Sister"=>"Sister");
        $this->set(compact('nominee', 'users','relations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nominee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nominee = $this->Nominees->get($id);
        if ($this->Nominees->delete($nominee)) {
            $this->Flash->success(__('The nominee has been deleted.'));
        } else {
            $this->Flash->error(__('The nominee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
