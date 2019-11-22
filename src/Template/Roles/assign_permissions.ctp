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
                        <a href="/roles/index">User Roles</a>
                    </li>
                    <li class="active">
                        <strong><?php if(!empty($rolesPermissions['role'])) echo ucfirst($rolesPermissions['role']); ?></strong>
                    </li>

                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Assign Permissions <?php if(!empty($rolesPermissions['role'])) echo ' for: <strong>'.ucfirst($rolesPermissions['role']).'</strong>'; ?></h5>
                            <span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Back','class' => 'btn btn-success btn-xs pull-right']) ?>   
                            </span>
                        </div>
                        

                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list" >        
                                    <thead>
                                        <th scope="col">Permission</th>
                                        <th scope="col">Action</th>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        echo $this->Form->create('assignPermissions');
                                        echo $this->Form->hidden('role_id', ['value'=>$rolesPermissions['id']]);

                                        if(!empty($allPermissions) && count($allPermissions)>0) {
                                            foreach ($allPermissions as $key => $permissions):
                                            
                                                //check which permissions has already been assigned
                                                if(array_key_exists('permissions',$rolesPermissions)){ 
                                                    if(count($rolesPermissions['permissions']) >0 ) {
                                                        $selectedPermissionArray[] = '';
                                                        foreach($rolesPermissions['permissions'] as $key => $selectedPermission) {
                                                            $selectedPermissionArray[$key] = $selectedPermission['id'];
                                                        }
                                                    }        
                                                }// end if(array_key_exists('permissions')

                                                if(!empty($selectedPermissionArray) && count($selectedPermissionArray)> 0 ){
                                                    if (in_array($permissions['id'], $selectedPermissionArray)) 
                                                        $checked = 'checked';
                                                    else
                                                        $checked = '';

                                                }else {

                                                    $checked = '';
                                                }
                                    ?>
                                                <tr class="gradeX_<?php echo $permissions['id']; ?>">
                                                    <td width="50%"><?= h($permissions['permission']) ?></td>
                                                    <td>
                                                    <?= $this->Form->control('assign_permissions[]', ['label' => '','type' => 'checkbox', 'class' => 'i-checks' , 'value' => $permissions['id'], $checked]); ?>
                                                    </td> 
                                                </tr>                
                                    <?php endforeach; 
                                        } else { ?>
                                                <tr>
                                                    <td colspan="2"><?= __('No records found') ?></td>
                                                </tr>
                                        <?php 
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="2">
                                                <?= $this->Form->button('Save Changes',['class' => 'btn btn-primary pull-right m-l-sm', 'type' => 'submit']); ?>
                                            </td>
                                        </tr>

                                    <?php 
                                        echo $this->Form->end(); 
                                    ?>
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