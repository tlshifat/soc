<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="profiles view large-9 medium-8 columns content">
    <h3><?= h($profile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($profile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($profile->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($profile->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Present Address') ?></th>
            <td><?= h($profile->present_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permanent Address') ?></th>
            <td><?= h($profile->permanent_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture') ?></th>
            <td><?= h($profile->picture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sgn') ?></th>
            <td><?= h($profile->sgn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $profile->has('user') ? $this->Html->link($profile->user->id, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($profile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Share') ?></th>
            <td><?= $this->Number->format($profile->no_of_share) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($profile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($profile->modified) ?></td>
        </tr>
    </table>
</div>
