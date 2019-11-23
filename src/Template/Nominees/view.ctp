<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nominee $nominee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nominee'), ['action' => 'edit', $nominee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nominee'), ['action' => 'delete', $nominee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nominee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nominees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nominee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nominees view large-9 medium-8 columns content">
    <h3><?= h($nominee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($nominee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($nominee->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($nominee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nid') ?></th>
            <td><?= h($nominee->nid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture') ?></th>
            <td><?= h($nominee->picture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relation Type') ?></th>
            <td><?= h($nominee->relation_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $nominee->has('user') ? $this->Html->link($nominee->user->id, ['controller' => 'Users', 'action' => 'view', $nominee->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nominee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($nominee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($nominee->modified) ?></td>
        </tr>
    </table>
</div>
