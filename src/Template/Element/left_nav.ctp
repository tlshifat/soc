<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Users Management') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>    
    <ul class="side-nav">
        <li class="heading"><?= __('Articles Management') ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
    <ul class="side-nav">
        <li class="heading"><?= __('Email Templates') ?></li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'emailTemplates', 'action' => 'index']) ?></li>
    </ul>    
</nav>