<?php


    $controller = strtolower($this->request->params['controller']);
    $action = strtolower($this->request->params['action']);
    if($controller == 'users' && ($action == 'index')) {
        $dashboard_cls  = 'active';
    }else{
        $dashboard_cls  = '';
    }


    if($controller == 'users' && ($action == 'add' || $action ==  'view' || $action == 'index')) {
        $user_cls  = 'active';
    }else{
        $user_cls  = '';
    }

    if($controller == 'nominees' && ($action == 'add' || $action ==  'view' || $action == 'index')) {
        $nom_cls  = 'active';
    }else{
        $nom_cls  = '';
    }

    if($controller == 'roles' && ($action == 'add' || $action ==  'view' || $action == 'index' || $action == 'assignpermissions')) {
        $role_cls  = 'active';
    }else{
        $role_cls  = '';
    }

    if($controller == 'permissions' && ($action == 'add' || $action ==  'view' || $action == 'index')) {
        $permission_cls  = 'active';
    }else{
        $permission_cls  = '';
    }

    if($controller == 'articles' && ($action == 'add' || $action ==  'view' || $action == 'index')) {
        $page_cls  = 'active';
    }else{
        $page_cls  = '';
    }

    if($controller == 'emailtemplates' && ($action == 'add' || $action ==  'view' || $action == 'index')) {
        $template_cls  = 'active';
    }else{
        $template_cls  = '';
    }
    if($controller == 'bkashDeposits' && ($action == 'add' || $action ==  'view' || $action == 'index')) {
        $dep_cls = 'active';
    }else{
        $dep_cls  = '';
    }




?>
<li class="<?php echo $dashboard_cls; ?>">
    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'dashboard']); ?>">
        <i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>
    </a>
</li>


<?php

$methods = $this->Session->read('methods');


if(in_array('add_user',$methods) ||  in_array('edit_user',$methods)){ ?>

<li class = "<?php echo $user_cls; ?>">
    <a href="javascript:void(0)"><i class="fa fa-user"></i><span class="nav-label">Manage Users</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li class="<?php echo ($controller == 'users' && $action == 'index' || $action == 'view')?'active' :'' ?>" >
            <?php echo $this->Html->Link('Users List',array('controller' =>'users','action'=> 'index'),array('escape'=>false)); ?>
        </li>
        <li class="<?php echo ($controller == 'users' && $action == 'add')?'active' :'' ?>">
            <?php echo $this->Html->Link('Add User',array('controller' =>'users','action'=> 'add'),array('escape'=>false)); ?>
        </li >


    </ul>
</li>

<?php }?>

<?php

$methods = $this->Session->read('methods');

if(in_array('view_profile_list',$methods) ){ ?>

    <li class = "<?php echo $user_cls; ?>">
        <a href="javascript:void(0)"><i class="fa fa-user"></i><span class="nav-label">Manage Profiles</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">

            <li class="<?php echo ($controller == 'profiles' && $action == 'index')?'active' :'' ?>">
                <?php echo $this->Html->Link('Profile List',array('controller' =>'profiles','action'=> 'index'),array('escape'=>false)); ?>
            </li >
            <li class="<?php echo ($controller == 'profiles' && $action == 'indexmy')?'active' :'' ?>">
                <?php echo $this->Html->Link('My Profile ',array('controller' =>'profiles','action'=> 'indexmy'),array('escape'=>false)); ?>
            </li >

        </ul>
    </li>

<?php }?>


<?php if(in_array('add_nominee',$methods) ||  in_array('edit_nominee',$methods)){ ?>
<li class = "<?php echo $nom_cls; ?>">
    <a href="javascript:void(0)"><i class="fa fa-user"></i><span class="nav-label">Manage Nominee</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li class="<?php echo ($controller == 'nominees' && $action == 'index')?'active' :'' ?>">
            <?php echo $this->Html->Link('Nominees',
                array('controller' =>'nominees','action'=> 'index'),array('escape'=>false)); ?>
        </li >

    </ul>
</li>
<?php } ?>

<?php if(in_array('add_deposit',$methods) ||  in_array('edit_deposit',$methods)){ ?>
<li class = "<?php echo $dep_cls; ?>">
    <a href="javascript:void(0)"><i class="fa fa-user"></i><span class="nav-label">Manage Deposits</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li class="<?php echo ($controller == 'nominees' && $action == 'index')?'active' :'' ?>">
            <?php echo $this->Html->Link('Bkash Deposits',
                array('controller' =>'bkashDeposits','action'=> 'index'),array('escape'=>false)); ?>
        </li >

    </ul>
</li>
<?php } ?>
<!--view_roles_list-->
<?php if(in_array('view_roles_list',$methods)){ ?>
<li class = "<?php echo $role_cls; ?>">
    <a href="javascript:void(0)"><i class="fa fa-sitemap"></i><span class="nav-label">Manage Roles</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li class="<?php echo ($controller == 'roles' && $action == 'index' || $action == 'view' || $action == 'assignpermissions')?'active' :'' ?>" >
            <?php echo $this->Html->Link('User Roles',array('controller' =>'roles','action'=> 'index'),array('escape'=>false)); ?>
        </li>
         <li class="<?php echo ($controller == 'roles' && $action == 'add')?'active' :'' ?>">
            <?php echo $this->Html->Link('Add Role',array('controller' =>'roles','action'=> 'add'),array('escape'=>false)); ?>
        </li >
    </ul>
</li>
<?php } ?>

<!--view_permission_list-->
<?php if(in_array('view_permission_list',$methods)){ ?>
<li class = "<?php echo $permission_cls; ?>">
    <a href="javascript:void(0)"><i class="fa fa-sitemap"></i><span class="nav-label">Manage Permissions</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li class="<?php echo ($controller == 'permissions' && $action == 'index' || $action == 'view')?'active' :'' ?>" >
            <?php echo $this->Html->Link('User Permissions',array('controller' =>'permissions','action'=> 'index'),array('escape'=>false)); ?>
        </li>
         <li class="<?php echo ($controller == 'permissions' && $action == 'add')?'active' :'' ?>">
            <?php echo $this->Html->Link('Add Permission',array('controller' =>'permissions','action'=> 'add'),array('escape'=>false)); ?>
        </li >
    </ul>
</li>
<?php } ?>
<!--<li class = "--><?php //echo $page_cls; ?><!--">-->
<!--    <a href="javascript:void(0)"><i class="fa fa-files-o"></i><span class="nav-label">Manage Pages</span><span class="fa arrow"></span></a>-->
<!--    <ul class="nav nav-second-level collapse">-->
<!--        <li class="--><?php //echo ($controller == 'articles' && $action == 'index' || $action == 'view')?'active' :'' ?><!--" >-->
<!--            --><?php //echo $this->Html->Link('Pages List',array('controller' =>'articles','action'=> 'index'),array('escape'=>false)); ?>
<!--        </li>-->
<!--         <li class="--><?php //echo ($controller == 'articles' && $action == 'add')?'active' :'' ?><!--">-->
<!--            --><?php //echo $this->Html->Link('Add Page',array('controller' =>'articles','action'=> 'add'),array('escape'=>false)); ?>
<!--        </li >-->
<!--    </ul>-->
<!--</li>-->

<!--<li class = "--><?php //echo $template_cls; ?><!--">-->
<!--    <a href="javascript:void(0)"><i class="fa fa-desktop"></i><span class="nav-label">Email Templates</span><span class="fa arrow"></span></a>-->
<!--    <ul class="nav nav-second-level collapse">-->
<!--        <li class="--><?php //echo ($controller == 'emailTemplates' && $action == 'index' || $action == 'view')?'active' :'' ?><!--" >-->
<!--            --><?php //echo $this->Html->Link('Templates List',array('controller' =>'emailTemplates','action'=> 'index'),array('escape'=>false)); ?>
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

<!--<li class = "--><?php //echo $template_cls; ?><!--">-->
<!--    <a href="javascript:void(0)"><i class="fa fa-question"></i><span class="nav-label">FAQ Management</span><span class="fa arrow"></span></a>-->
<!--     <ul class="nav nav-second-level collapse">-->
<!--        <li class="--><?php //echo ($controller == 'articles' && $action == 'index' || $action == 'view')?'active' :'' ?><!--" >-->
<!--            --><?php //echo $this->Html->Link('FAQ List',array('controller' =>'faq','action'=> 'index'),array('escape'=>false)); ?>
<!--        </li>-->
<!--         <li class="--><?php //echo ($controller == 'articles' && $action == 'add')?'active' :'' ?><!--">-->
<!--            --><?php //echo $this->Html->Link('Add FAQ',array('controller' =>'faq','action'=> 'add'),array('escape'=>false)); ?>
<!--        </li >-->
<!--    </ul>-->
<!--</li>-->
