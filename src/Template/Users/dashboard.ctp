<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
                            <h5>Users Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New', ['controller' => 'users','action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>
                            </span>
                        </div>
                        

                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list-buttons" >        
                                    <thead>
                                        <tr>
                                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($users)>0) {
                                            foreach ($users as $user): 

                                                $date = strtotime($user['created']);
                                                $dateCreatedFormat = date("Y-m-d", $date);


                                               if($user['status'] == 1){
                                                    $status = 'Active';
                                                    $statusClass = 'btn btn-primary btn-xs';
                                                }elseif($user['status'] == 2){
                                                    $status = 'Inactive';
                                                    $statusClass = 'btn btn-warning btn-xs';
                                                }

                                                foreach ($user['roles'] as $role) {
                                                    $userRole = $role['role'];
                                                }

                                            ?>
                                            <tr class="gradeX_<?php echo $user['id']; ?>">
                                                <td><?= $this->Number->format($user->id) ?></td>
                                                <td class = "capitalize"><?= ucfirst(h($user->first_name))." ".h($user->last_name)?></td>
                                                <td><?= h($user->email) ?></td>
                                                <td><?= ucfirst(h($userRole)) ?></td>
                                                <td><b><?php echo $this->Html->link($status,'javascript:void(0)',['_full' => false,'class' => "manage_status".' '.$statusClass.' '."manage_status_".$user['id'],'id' =>$user['id']] ); ?></b></td>
                                                <td><?= h($dateCreatedFormat) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
                                                    <?= $this->Html->link(__(''), "javascript:void(0);",['type' =>'button','data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Delete','class' => 'btn btn-warning btn-circle fa fa-times deleteData', 'id'=> 'users_'.$user->id]) ?>
                                                    <?// Common class 'deleteData' has been used, which will open the confirmation popup. Clicked on Delete icon, will call the common Delete function declared in /js/admin/custom.js ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; 
                                            } else { ?>
                                                    <tr>
                                                        <td><?= __('No records found') ?></td>
                                                    </tr>
                                            <?php 
                                            }?>

                                    </tbody>
                                </table>
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