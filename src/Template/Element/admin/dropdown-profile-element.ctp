<div class="dropdown profile-element main-profile-img"> <span>
        <?php echo $this->Html->image('default.png', ['alt' => 'Profile Img','class' => 'img-circle']); ?>
         </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="clear"> <span class="block m-t-xs capitalize"> <strong class="font-bold"><?php echo $loginuserdata['first_name'].'&nbsp;'. $loginuserdata['last_name']; ?> </strong>
         </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><?php //echo $this->Html->link('Profile',['controller' => 'Users','action' => 'profile',$loginuserdata['id'] ,'_full' => true]); ?></li>
        <!--<li class="divider"></li>-->
        <li><?php echo $this->Html->link('Logout',['controller' => 'Users','action' => 'logout','_full'=> true]); ?></li>
    </ul>
</div>