<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankTransfer $bankTransfer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank Transfer'), ['action' => 'edit', $bankTransfer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank Transfer'), ['action' => 'delete', $bankTransfer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankTransfer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bank Transfers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Transfer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bkash Deposits'), ['controller' => 'BkashDeposits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bkash Deposit'), ['controller' => 'BkashDeposits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bankTransfers view large-9 medium-8 columns content">
    <h3><?= h($bankTransfer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bkash Deposit') ?></th>
            <td><?= $bankTransfer->has('bkash_deposit') ? $this->Html->link($bankTransfer->bkash_deposit->id, ['controller' => 'BkashDeposits', 'action' => 'view', $bankTransfer->bkash_deposit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Account') ?></th>
            <td><?= $bankTransfer->has('bank_account') ? $this->Html->link($bankTransfer->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $bankTransfer->bank_account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bankTransfer->has('user') ? $this->Html->link($bankTransfer->user->name, ['controller' => 'Users', 'action' => 'view', $bankTransfer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bankTransfer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bankTransfer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bankTransfer->modified) ?></td>
        </tr>
    </table>
</div>
