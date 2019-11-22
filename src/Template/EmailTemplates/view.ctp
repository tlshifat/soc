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
                <h2>Templates</h2>
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
                            <h5>Template Detail</h5>
                            <span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Back','class' => 'btn btn-success btn-xs pull-right']) ?>   
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailTemplate->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-success btn-xs pull-right back-btn']) ?>   
                            </span>
                        </div>
                        
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2><?= h($emailTemplate->title) ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                       if($emailTemplate['status'] == 1){
                                            $status = 'Active';
                                        }elseif($emailTemplate['status'] == 2){
                                            $status = 'Inactive';
                                        }
                                    ?>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Status') ?>:</dt> <dd><span class="label label-primary"><?= h($status) ?></span></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Subject') ?>:</dt> <dd><?= h($emailTemplate->subject) ?></dd>
  
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Code') ?>:</dt> <dd><?= h($emailTemplate->code) ?></dd>
  
                                    </dl>                                    
                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Created') ?>:</dt> <dd><?= h($emailTemplate->created) ?></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($emailTemplate->modified) ?></dd>
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