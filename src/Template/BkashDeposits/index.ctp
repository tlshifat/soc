<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BkashDeposit[]|\Cake\Collection\CollectionInterface $bkashDeposits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bkash Deposit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bkashDeposits index large-9 medium-8 columns content">
    <h3><?= __('Bkash Deposits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bkash_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bkashDeposits as $bkashDeposit): ?>
            <tr>
                <td><?= $this->Number->format($bkashDeposit->id) ?></td>
                <td><?= h($bkashDeposit->date) ?></td>
                <td><?= h($bkashDeposit->payment_month) ?></td>
                <td><?= h($bkashDeposit->bkash_number) ?></td>
                <td><?= h($bkashDeposit->reference_number) ?></td>
                <td><?= h($bkashDeposit->amount) ?></td>
                <td><?= h($bkashDeposit->created) ?></td>
                <td><?= h($bkashDeposit->modified) ?></td>
                <td><?= $bkashDeposit->has('user') ? $this->Html->link($bkashDeposit->user->id, ['controller' => 'Users', 'action' => 'view', $bkashDeposit->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bkashDeposit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bkashDeposit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bkashDeposit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bkashDeposit->id)]) ?>
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
