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
                <h2>My Payments</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage My Payments</a>
                    </li>
                    <li class="active">
                        <strong>Payments List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Payments Detail</h5>
                            <span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Back','class' => 'btn btn-success btn-xs pull-right']) ?>
                                <?= $this->Html->link(__('Edit Payment'), ['action' => 'editmy', $bkashDeposit->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-success btn-xs pull-right back-btn']) ?>
                            </span>
                        </div>

                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2><?= h($bkashDeposit->payment_month) ?></h2>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Payment Type ') ?>:</dt> <dd><?= h($bkashDeposit->payment_type) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Reference Number') ?>:</dt> <dd><?= h($bkashDeposit->reference_number) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Amount') ?>:</dt> <dd><span class=""><?= h($bkashDeposit->amount) ?></span></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Comment') ?>:</dt> <dd><span class=""><?= h($bkashDeposit->comment) ?></span></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Payment For ') ?>:</dt> <dd><?= h($bkashDeposit->payment_for) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Date') ?>:</dt> <dd><span class=""><?= h($bkashDeposit->date) ?></span></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Created') ?>:</dt> <dd><?= h($bkashDeposit->created) ?></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($bkashDeposit->modified) ?></dd>

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
