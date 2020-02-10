<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankTransfer $bankTransfer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bank Transfers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bkash Deposits'), ['controller' => 'BkashDeposits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bkash Deposit'), ['controller' => 'BkashDeposits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bankTransfers form large-9 medium-8 columns content">
    <?= $this->Form->create($bankTransfer) ?>
    <fieldset>
        <legend><?= __('Add Bank Transfer') ?></legend>
        <?php
            echo $this->Form->control('bkash_deposit_id', ['options' => $bkashDeposits]);
            echo $this->Form->control('bank_account_id', ['options' => $bankAccounts]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
