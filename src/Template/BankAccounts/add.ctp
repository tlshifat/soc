<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount $bankAccount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Transfers'), ['controller' => 'BankTransfers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Transfer'), ['controller' => 'BankTransfers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bankAccounts form large-9 medium-8 columns content">
    <?= $this->Form->create($bankAccount) ?>
    <fieldset>
        <legend><?= __('Add Bank Account') ?></legend>
        <?php
            echo $this->Form->control('account_number');
            echo $this->Form->control('bank_name');
            echo $this->Form->control('branch_name');
            echo $this->Form->control('route');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
