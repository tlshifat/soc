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
            $nominee = $this->Nominees->patchEntity($nominee, $this->request->getData());
            if ($this->Nominees->save($nominee)) {
                $this->Flash->success(__('The nominee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nominee could not be saved. Please, try again.'));
        }
        $users = $this->Nominees->Users->find('list', ['limit' => 200]);
        $this->set(compact('nominee', 'users'));
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
            $nominee = $this->Nominees->patchEntity($nominee, $this->request->getData());
            if ($this->Nominees->save($nominee)) {
                $this->Flash->success(__('The nominee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nominee could not be saved. Please, try again.'));
        }
        $users = $this->Nominees->Users->find('list', ['limit' => 200]);
        $this->set(compact('nominee', 'users'));
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
