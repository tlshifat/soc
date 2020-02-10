<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BankAccounts Controller
 *
 * @property \App\Model\Table\BankAccountsTable $BankAccounts
 *
 * @method \App\Model\Entity\BankAccount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BankAccountsController extends AppController
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
        $bankAccounts = $this->paginate($this->BankAccounts);

        $this->set(compact('bankAccounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank Account id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bankAccount = $this->BankAccounts->get($id, [
            'contain' => ['Users', 'BankTransfers']
        ]);

        $this->set('bankAccount', $bankAccount);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bankAccount = $this->BankAccounts->newEntity();
        if ($this->request->is('post')) {
            $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());
            if ($this->BankAccounts->save($bankAccount)) {
                $this->Flash->success(__('The bank account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        $users = $this->BankAccounts->Users->find('list', ['limit' => 200]);
        $this->set(compact('bankAccount', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bank Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bankAccount = $this->BankAccounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());
            if ($this->BankAccounts->save($bankAccount)) {
                $this->Flash->success(__('The bank account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        $users = $this->BankAccounts->Users->find('list', ['limit' => 200]);
        $this->set(compact('bankAccount', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bank Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bankAccount = $this->BankAccounts->get($id);
        if ($this->BankAccounts->delete($bankAccount)) {
            $this->Flash->success(__('The bank account has been deleted.'));
        } else {
            $this->Flash->error(__('The bank account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
