<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BkashDeposit $bkashDeposit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bkash Deposits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bkashDeposits form large-9 medium-8 columns content">
    <?= $this->Form->create($bkashDeposit) ?>
    <fieldset>
        <legend><?= __('Add Bkash Deposit') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('payment_month');
            echo $this->Form->control('bkash_number');
            echo $this->Form->control('reference_number');
            echo $this->Form->control('amount');
            echo $this->Form->control('comment');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
