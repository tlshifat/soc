<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user

<td><?php echo $this->Html->image('profile/'.$profile->picture, ['alt' => 'Profile Img','class' => 'img-circle minimize']); ?></td>
<td><?php echo $this->Html->image('profile/'.$profile->sgn, ['alt' => 'Signature Img','class' => 'img-circle minimize']); ?></td>
 */

?>
<div id="wrapper">

    <?php echo $this->element('admin/sidebar'); ?>

    <div id="page-wrapper" class="gray-bg">
        <?php echo $this->element('admin/top_header'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Profiles</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage Profiles</a>
                    </li>
                    <li class="active">
                        <strong>Profiles List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Profile Detail</h5>
                            <span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Back','class' => 'btn btn-success btn-xs pull-right']) ?>
                                <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-success btn-xs pull-right back-btn']) ?>
                            </span>
                        </div>

                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2><?= h($profile->user->first_name.' '.$profile->user->last_name) ?></h2>
                                    </div>


                                </div>
                            </div>

                            <!--                            for picture and sign-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Picture') ?>:</dt>
                                        <dd><?php echo $this->Html->image('profile/'.$profile->picture, ['alt' => 'Profile Img','class' => 'img-circle minimize']); ?></dd>

                                    </dl>

                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Signature') ?>:</dt>
                                        <dd><span class=""><?php echo $this->Html->image('profile/'.$profile->sgn, ['alt' => 'Signature Img','class' => 'img-circle minimize']); ?></span></dd>
                                    </dl>
                                </div>
                            </div>
                            <!--                            end-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Mobile') ?>:</dt> <dd><?= h($profile->mobile) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Email') ?>:</dt> <dd><?= h($profile->email) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Permanent Address') ?>:</dt> <dd><span class=""><?= h($profile->permanent_address) ?></span></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Present Address') ?>:</dt> <dd><span class=""><?= h($profile->present_address) ?></span></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Created') ?>:</dt> <dd><?= h($profile->created) ?></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($profile->modified) ?></dd>

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
<style>
.minimize{
    height: 100px;
    width: 100px;
}
</style>
