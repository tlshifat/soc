<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BankTransfers Controller
 *
 * @property \App\Model\Table\BankTransfersTable $BankTransfers
 *
 * @method \App\Model\Entity\BankTransfer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BankTransfersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BkashDeposits', 'BankAccounts', 'Users']
        ];
        $bankTransfers = $this->paginate($this->BankTransfers);

        $this->set(compact('bankTransfers'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank Transfer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bankTransfer = $this->BankTransfers->get($id, [
            'contain' => ['BkashDeposits', 'BankAccounts', 'Users']
        ]);

        $this->set('bankTransfer', $bankTransfer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bankTransfer = $this->BankTransfers->newEntity();
        if ($this->request->is('post')) {
            $bankTransfer = $this->BankTransfers->patchEntity($bankTransfer, $this->request->getData());
            if ($this->BankTransfers->save($bankTransfer)) {
                $this->Flash->success(__('The bank transfer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank transfer could not be saved. Please, try again.'));
        }
        $bkashDeposits = $this->BankTransfers->BkashDeposits->find('list', ['limit' => 200]);
        $bankAccounts = $this->BankTransfers->BankAccounts->find('list', ['limit' => 200]);
        $users = $this->BankTransfers->Users->find('list', ['limit' => 200]);
        $this->set(compact('bankTransfer', 'bkashDeposits', 'bankAccounts', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bank Transfer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bankTransfer = $this->BankTransfers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankTransfer = $this->BankTransfers->patchEntity($bankTransfer, $this->request->getData());
            if ($this->BankTransfers->save($bankTransfer)) {
                $this->Flash->success(__('The bank transfer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank transfer could not be saved. Please, try again.'));
        }
        $bkashDeposits = $this->BankTransfers->BkashDeposits->find('list', ['limit' => 200]);
        $bankAccounts = $this->BankTransfers->BankAccounts->find('list', ['limit' => 200]);
        $users = $this->BankTransfers->Users->find('list', ['limit' => 200]);
        $this->set(compact('bankTransfer', 'bkashDeposits', 'bankAccounts', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bank Transfer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bankTransfer = $this->BankTransfers->get($id);
        if ($this->BankTransfers->delete($bankTransfer)) {
            $this->Flash->success(__('The bank transfer has been deleted.'));
        } else {
            $this->Flash->error(__('The bank transfer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
