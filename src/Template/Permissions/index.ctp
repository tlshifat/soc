<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission[]|\Cake\Collection\CollectionInterface $permissions
 */
?>
<div id="wrapper">

    <?php echo $this->element('admin/sidebar'); ?>

    <div id="page-wrapper" class="gray-bg">
       <?php echo $this->element('admin/top_header'); ?>    
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Permissions</h2>
                <ol class="breadcrumb">
                    
                    <li>
                        <a>Manage Permissions</a>
                    </li>
                    <li class="active">
                        <strong>User Permissions</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Permissions Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New', ['controller' => 'permissions','action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>  
                            </span>
                        </div>
                        

                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list" >        
                                    <thead>
                                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('permission') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </thead>

                                    <tbody>
                                        <?php if(count($permissions)>0) {
                                            foreach ($permissions as $permission): 

                                                $date = strtotime($permission['created']);
                                                $dateCreatedFormat = date("Y-m-d", $date);

                                            ?>
                                            <tr class="gradeX_<?php echo $permission['id']; ?>">
                                                <td><?= $this->Number->format($permission->id) ?></td>
                                                <td class = "capitalize"><?= h($permission->permission)?></td>
                                                <td class = "capitalize"><?= h($permission->slug)?></td>
                                                <td><?= h($dateCreatedFormat) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'edit', $permission->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
                                                    <?php echo $this->Html->link(__(''), "javascript:void(0);",['type' =>'button','data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Delete','class' => 'btn btn-warning btn-circle fa fa-times deleteData', 'id'=> 'permissions_'.$permission->id]) ?>
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
