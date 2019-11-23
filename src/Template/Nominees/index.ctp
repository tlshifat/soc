<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nominee[]|\Cake\Collection\CollectionInterface $nominees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nominee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nominees index large-9 medium-8 columns content">
    <h3><?= __('Nominees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('picture') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relation_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nominees as $nominee): ?>
            <tr>
                <td><?= $this->Number->format($nominee->id) ?></td>
                <td><?= h($nominee->name) ?></td>
                <td><?= h($nominee->mobile) ?></td>
                <td><?= h($nominee->email) ?></td>
                <td><?= h($nominee->nid) ?></td>
                <td><?= h($nominee->picture) ?></td>
                <td><?= h($nominee->relation_type) ?></td>
                <td><?= $nominee->has('user') ? $this->Html->link($nominee->user->id, ['controller' => 'Users', 'action' => 'view', $nominee->user->id]) : '' ?></td>
                <td><?= h($nominee->created) ?></td>
                <td><?= h($nominee->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nominee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nominee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nominee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nominee->id)]) ?>
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
