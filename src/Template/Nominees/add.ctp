<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nominee $nominee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nominees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nominees form large-9 medium-8 columns content">
    <?= $this->Form->create($nominee) ?>
    <fieldset>
        <legend><?= __('Add Nominee') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('mobile');
            echo $this->Form->control('email');
            echo $this->Form->control('nid');
            echo $this->Form->control('picture');
            echo $this->Form->control('relation_type');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
