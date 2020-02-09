<?php
namespace App\Controller;

use App\Controller\AppController;
use DateTime;

/**
 * BkashDeposits Controller
 *
 * @property \App\Model\Table\BkashDepositsTable $BkashDeposits
 *
 * @method \App\Model\Entity\BkashDeposit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BkashDepositsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $data= $this->request->getData();
        if(!empty($data)){
            $dt = new DateTime($data['from']);
            $from = $dt->format('Y-m-d');

            $dt = new DateTime($data['to']);
            $to = $dt->format('Y-m-d');

            $this->paginate = [
                'contain' => ['Users']
            ];
            $bkashDeposits = $this->paginate($this->BkashDeposits->find('all')->where(['date >=' => $from,'date <=' => $to ]));
            $this->set(compact('bkashDeposits'));
        } else {

            $this->paginate = [
                'contain' => ['Users']
            ];
            $bkashDeposits = $this->paginate($this->BkashDeposits);

            $this->set(compact('bkashDeposits'));
        }


    }

    /**
     * Index my method
     *
     * @return \Cake\Http\Response|void
     */
    public function indexmy()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $bkashDeposits = $this->paginate($this->BkashDeposits->find('all')->where(['user_id'=> $this->Auth->user()['id']]));
        $this->set(compact('bkashDeposits'));
    }
    /**
     * View method
     *
     * @param string|null $id Bkash Deposit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bkashDeposit = $this->BkashDeposits->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('bkashDeposit', $bkashDeposit);
    }

    /**
     * View method
     *
     * @param string|null $id Bkash Deposit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewmy($id = null)
    {
        $bkashDeposit = $this->BkashDeposits->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('bkashDeposit', $bkashDeposit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $a = $this->_config()->where(["name"=>"payments"])->first()->conf;
        $bkashDeposit = $this->BkashDeposits->newEntity();
        if ($this->request->is('post')) {

            $bkashDeposit = $this->BkashDeposits->patchEntity($bkashDeposit, $this->request->getData());
            $bkashDeposit->payment_type = $this->request->data["payment_type"];
            $bkashDeposit->payment_for = $this->request->data["payment_for"];
            $bkashDeposit->date =date("Y-m-d") ;
            if ($this->BkashDeposits->save($bkashDeposit)) {
                $this->Flash->success(__('The bkash deposit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bkash deposit could not be saved. Please, try again.'));
        }
        //$payment_type = array(""=>"Select","Bank"=>"Bank","Cash"=>"Cash","Bkash"=>"Bkash","Other"=>"Other");
        //$payment_for = array(""=>"Select","Payment For 1"=>"Payment For 1","Payment 3"=>"Payment 3");
        $payment_type = json_decode($a,true)["payment_type"];
        $payment_for = json_decode($a,true)["payments_for"];
        $users = $this->BkashDeposits->Users->find('list', ['limit' => 200]);
        $this->set(compact('bkashDeposit', 'users','payment_type','payment_for'));
    }

    public function addmy()
    {
        $a = $this->_config()->where(["name"=>"payments"])->first()->conf;
        $bkashDeposit = $this->BkashDeposits->newEntity();
        if ($this->request->is('post')) {

            $bkashDeposit = $this->BkashDeposits->patchEntity($bkashDeposit, $this->request->getData());
            $bkashDeposit->payment_type = $this->request->data["payment_type"];
            $bkashDeposit->payment_for = $this->request->data["payment_for"];
            $bkashDeposit->user_id = $this->_userId();
            $bkashDeposit->date =date("Y-m-d");
            if ($this->BkashDeposits->save($bkashDeposit)) {
                $this->Flash->success(__('The bkash deposit has been saved.'));

                return $this->redirect(['action' => 'indexmy']);
            }
            $this->Flash->error(__('The bkash deposit could not be saved. Please, try again.'));
        }
        //$payment_type = array(""=>"Select","Bank"=>"Bank","Cash"=>"Cash","Bkash"=>"Bkash","Other"=>"Other");
        //$payment_for = array(""=>"Select","Payment For 1"=>"Payment For 1","Payment 3"=>"Payment 3");
        $payment_type = json_decode($a,true)["payment_type"];
        $payment_for = json_decode($a,true)["payments_for"];
        $users = $this->BkashDeposits->Users->find('list', ['limit' => 200]);
        $this->set(compact('bkashDeposit', 'users','payment_type','payment_for'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bkash Deposit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bkashDeposit = $this->BkashDeposits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bkashDeposit = $this->BkashDeposits->patchEntity($bkashDeposit, $this->request->getData());
            $bkashDeposit->payment_type = $this->request->data['payment_type'];
            $bkashDeposit->payment_for = $this->request->data['payment_for'];
            if ($this->BkashDeposits->save($bkashDeposit)) {
                $this->Flash->success(__('The bkash deposit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bkash deposit could not be saved. Please, try again.'));
        }
        $payment_type = array(""=>"Select","Bank"=>"Bank","Cash"=>"Cash","Bkash"=>"Bkash","Other"=>"Other");
        $payment_for = array(""=>"Select","Payment For 1"=>"Payment For 1","Payment 3"=>"Payment 3");
        $users = $this->BkashDeposits->Users->find('list', ['limit' => 200]);
        $this->set(compact('bkashDeposit', 'users','payment_for','payment_type'));
    }

    /**
     * Edit my method
     *
     * @param string|null $id Bkash Deposit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editmy($id = null)
    {
        $bkashDeposit = $this->BkashDeposits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bkashDeposit = $this->BkashDeposits->patchEntity($bkashDeposit, $this->request->getData());
            $bkashDeposit->payment_type = $this->request->data['payment_type'];
            $bkashDeposit->payment_for = $this->request->data['payment_for'];
            if ($this->BkashDeposits->save($bkashDeposit)) {
                $this->Flash->success(__('The bkash deposit has been saved.'));

                return $this->redirect(['action' => 'indexmy']);
            }
            $this->Flash->error(__('The bkash deposit could not be saved. Please, try again.'));
        }
        $payment_type = array(""=>"Select","Bank"=>"Bank","Cash"=>"Cash","Bkash"=>"Bkash","Other"=>"Other");
        $payment_for = array(""=>"Select","Payment For 1"=>"Payment For 1","Payment 3"=>"Payment 3");
        $users = $this->BkashDeposits->Users->find('list', ['limit' => 200]);
        $this->set(compact('bkashDeposit', 'users','payment_for','payment_type'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Bkash Deposit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bkashDeposit = $this->BkashDeposits->get($id);
        if ($this->BkashDeposits->delete($bkashDeposit)) {
            $this->Flash->success(__('The bkash deposit has been deleted.'));
        } else {
            $this->Flash->error(__('The bkash deposit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

