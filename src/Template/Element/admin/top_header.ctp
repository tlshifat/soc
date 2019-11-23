<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <?php echo $this->element('admin/top_header_search_form'); ?>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to Association.</span>
            </li>
            <?php echo $this->element('admin/top_header_dropdown'); ?>

            <li>
                    <?= $this->Html->link('Logout', ['controller'=>'users', 'action'=>'logout'], ['class'=>'fa fa-sign-out']) ?>
            </li>
        </ul>
    </nav>
</div>
