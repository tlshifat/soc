<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-2 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= $this->fetch('title') ?></a></h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="right">
            <?php $user = $this->Session->read('Auth.User'); 
                if(!empty($user)) { 
                ?>
                    <li><?= $this->Html->link('Articles', ['controller'=>'articles']) ?></li>
                    <li><?= $this->Html->link('Users', ['controller'=>'users']) ?></li>
                    <li><?= $this->Html->link('Email Templates', ['controller'=>'emailTemplates']) ?></li>
                    <li><?= $this->Html->link('Hi '.$user['first_name'],'#')?></li>
                    <li><?= $this->Html->link('Logout', ['controller'=>'users', 'action'=>'logout']) ?></li>
                <?php
                } else{
                ?>
                    <li><?= $this->Html->link('Register', ['controller'=>'users', 'action'=>'register']) ?></li>
                    <li><?= $this->Html->link('Login', ['controller'=>'users', 'action'=>'login']) ?></li>
                <?php
                }
                ?>
        </ul>
    </div>
</nav>