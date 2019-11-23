<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BkashDeposit $bkashDeposit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bkash Deposit'), ['action' => 'edit', $bkashDeposit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bkash Deposit'), ['action' => 'delete', $bkashDeposit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bkashDeposit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bkash Deposits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bkash Deposit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bkashDeposits view large-9 medium-8 columns content">
    <h3><?= h($bkashDeposit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment Month') ?></th>
            <td><?= h($bkashDeposit->payment_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bkash Number') ?></th>
            <td><?= h($bkashDeposit->bkash_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Number') ?></th>
            <td><?= h($bkashDeposit->reference_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($bkashDeposit->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bkashDeposit->has('user') ? $this->Html->link($bkashDeposit->user->id, ['controller' => 'Users', 'action' => 'view', $bkashDeposit->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bkashDeposit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($bkashDeposit->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bkashDeposit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bkashDeposit->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($bkashDeposit->comment)); ?>
    </div>
</div>
