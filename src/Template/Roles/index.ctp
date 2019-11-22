<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div id="wrapper">

    <?php echo $this->element('admin/sidebar'); ?>

    <div id="page-wrapper" class="gray-bg">
       <?php echo $this->element('admin/top_header'); ?>    
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Roles</h2>
                <ol class="breadcrumb">
                    
                    <li>
                        <a>Manage Roles</a>
                    </li>
                    <li class="active">
                        <strong>User Roles</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Roles Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New', ['controller' => 'roles','action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>  
                            </span>
                        </div>
                        

                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list" >        
                                    <thead>
                                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </thead>

                                    <tbody>
                                        <?php if(count($roles)>0) {
                                            foreach ($roles as $role): 

                                                $date = strtotime($role['created']);
                                                $dateCreatedFormat = date("Y-m-d", $date);

                                            ?>
                                            <tr class="gradeX_<?php echo $role['id']; ?>">
                                                <td><?= $this->Number->format($role->id) ?></td>
                                                <td class = "capitalize"><?= h($role->role)?></td>
                                                <td><?= h($dateCreatedFormat) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'view', $role->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'edit', $role->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'assign_permissions', $role->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Assign Permission','class' => 'btn btn-success btn-circle fa fa-link']) ?>
                                                    <?php echo $this->Html->link(__(''), "javascript:void(0);",['type' =>'button','data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Delete','class' => 'btn btn-warning btn-circle fa fa-times deleteData', 'id'=> 'roles_'.$role->id]) ?>
                                                    <?// Common class 'deleteData' has been used, which will open the confirmation popup. Clicked on Delete icon, will call the common Delete function declared in /js/admin/custom.js ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; 
                                            } else { ?>
                                                    <tr>
                                                        <td colspan="4"><?= __('No records found') ?></td>
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