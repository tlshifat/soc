<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount $bankAccount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank Account'), ['action' => 'edit', $bankAccount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank Account'), ['action' => 'delete', $bankAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Transfers'), ['controller' => 'BankTransfers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Transfer'), ['controller' => 'BankTransfers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bankAccounts view large-9 medium-8 columns content">
    <h3><?= h($bankAccount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Account Number') ?></th>
            <td><?= h($bankAccount->account_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Name') ?></th>
            <td><?= h($bankAccount->bank_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch Name') ?></th>
            <td><?= h($bankAccount->branch_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Route') ?></th>
            <td><?= h($bankAccount->route) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bankAccount->has('user') ? $this->Html->link($bankAccount->user->name, ['controller' => 'Users', 'action' => 'view', $bankAccount->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bankAccount->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bankAccount->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bankAccount->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Transfers') ?></h4>
        <?php if (!empty($bankAccount->bank_transfers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bkash Deposit Id') ?></th>
                <th scope="col"><?= __('Bank Account Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bankAccount->bank_transfers as $bankTransfers): ?>
            <tr>
                <td><?= h($bankTransfers->id) ?></td>
                <td><?= h($bankTransfers->bkash_deposit_id) ?></td>
                <td><?= h($bankTransfers->bank_account_id) ?></td>
                <td><?= h($bankTransfers->user_id) ?></td>
                <td><?= h($bankTransfers->created) ?></td>
                <td><?= h($bankTransfers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankTransfers', 'action' => 'view', $bankTransfers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankTransfers', 'action' => 'edit', $bankTransfers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankTransfers', 'action' => 'delete', $bankTransfers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankTransfers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
