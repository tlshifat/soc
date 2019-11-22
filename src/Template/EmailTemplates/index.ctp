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
                <h2>Email Templates</h2>
                <ol class="breadcrumb">
                    
                    <li>
                        <a>Manage Templates</a>
                    </li>
                    <li class="active">
                        <strong>Templates List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Templates Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New', ['controller' => 'emailTemplates','action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>
                            </span>
                        </div>
                        

                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list" >        
                                    <thead>
                                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </thead>

                                    <tbody>
                                        <?php if(count($emailTemplates)>0) {
                                            foreach ($emailTemplates as $emailTemplate): 

                                                $date = strtotime($emailTemplate['created']);
                                                $dateCreatedFormat = date("Y-m-d", $date);


                                               if($emailTemplate['status'] == 1){
                                                    $status = 'Active';
                                                    $statusClass = 'btn btn-primary btn-xs';
                                                }elseif($emailTemplate['status'] == 2){
                                                    $status = 'Inactive';
                                                    $statusClass = 'btn btn-warning btn-xsr';
                                                }

                                            ?>
                                            <tr class="gradeX_<?php echo $emailTemplate['id']; ?>">
                                                <td><?= $this->Number->format($emailTemplate->id) ?></td>
                                                <td class = "capitalize"><?= h($emailTemplate->title)?></td>
                                                <td><?= h($emailTemplate->subject) ?></td>
                                                <td><?= h($emailTemplate->code) ?></td>
                                                <td><b><?php echo $this->Html->link($status,'javascript:void(0)',['_full' => false,'class' => "mngstatus".' '.$statusClass.' '."mngstatus_".$emailTemplate['id'],'id' =>$emailTemplate['id']] ); ?></b></td>
                                                <td><?= h($dateCreatedFormat) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'view', $emailTemplate->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'edit', $emailTemplate->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
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