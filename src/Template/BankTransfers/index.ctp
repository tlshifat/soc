<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankTransfer[]|\Cake\Collection\CollectionInterface $bankTransfers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bank Transfer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bkash Deposits'), ['controller' => 'BkashDeposits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bkash Deposit'), ['controller' => 'BkashDeposits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bankTransfers index large-9 medium-8 columns content">
    <h3><?= __('Bank Transfers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bkash_deposit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bankTransfers as $bankTransfer): ?>
            <tr>
                <td><?= $this->Number->format($bankTransfer->id) ?></td>
                <td><?= $bankTransfer->has('bkash_deposit') ? $this->Html->link($bankTransfer->bkash_deposit->id, ['controller' => 'BkashDeposits', 'action' => 'view', $bankTransfer->bkash_deposit->id]) : '' ?></td>
                <td><?= $bankTransfer->has('bank_account') ? $this->Html->link($bankTransfer->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $bankTransfer->bank_account->id]) : '' ?></td>
                <td><?= $bankTransfer->has('user') ? $this->Html->link($bankTransfer->user->name, ['controller' => 'Users', 'action' => 'view', $bankTransfer->user->id]) : '' ?></td>
                <td><?= h($bankTransfer->created) ?></td>
                <td><?= h($bankTransfer->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bankTransfer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bankTransfer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bankTransfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankTransfer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
