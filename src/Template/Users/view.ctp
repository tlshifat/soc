<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div id="wrapper">

    <?php echo $this->element('admin/sidebar'); ?>

    <div id="page-wrapper" class="gray-bg">
       <?php echo $this->element('admin/top_header'); ?>    
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Users</h2>
                <ol class="breadcrumb">
                    
                    <li>
                        <a>Manage Users</a>
                    </li>
                    <li class="active">
                        <strong>Users List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>User Detail</h5>
                            <span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Back','class' => 'btn btn-success btn-xs pull-right']) ?>   
                                <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-success btn-xs pull-right back-btn']) ?>   
                            </span>
                        </div>
                        
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2><?= h($user->first_name) ?><?= h($user->last_name) ?></h2>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php

                                       if($user['status'] == 1){
                                            $status = 'Active';
                                        }elseif($user['status'] == 2){
                                            $status = 'Inactive';
                                        }

                                        if(!empty($user['roles']) && count($user['roles']) > 0 ){
                                            $assignedRoles = '';
                                            foreach($user['roles'] as $key => $role) {
                                                $assignedRoles = $assignedRoles.','.$role['role'];
                                            }        
                                            $userRoles = substr($assignedRoles,1); 
                                        } else {
                                            $userRoles = '';
                                        }

                                    ?>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Role') ?>:</dt> <dd><span class="label label-primary"><?= h(ucfirst($userRoles)) ?></span></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Email') ?>:</dt> <dd><?= h($user->email) ?></dd>
  
                                    </dl>
                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Status') ?>:</dt> <dd><span class="label label-primary"><?= h($status) ?></span></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Created') ?>:</dt> <dd><?= h($user->created) ?></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($user->modified) ?></dd>

                                    </dl>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('inner_footer'); ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
