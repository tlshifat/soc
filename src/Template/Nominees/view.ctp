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
                <h2>Nominees</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage Nominees</a>
                    </li>
                    <li class="active">
                        <strong>Nominees List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Nominee Detail</h5>
                            <span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Back','class' => 'btn btn-success btn-xs pull-right']) ?>
                                <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $nominee->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-success btn-xs pull-right back-btn']) ?>
                            </span>
                        </div>

                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2><?= h($nominee->name) ?></h2>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Mobile') ?>:</dt> <dd><?= h($nominee->mobile) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Email') ?>:</dt> <dd><?= h($nominee->email) ?></dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= __('NID') ?>:</dt> <dd><span class=""><?= h($nominee->nid) ?></span></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Picture') ?>:</dt> <dd><span class=""><?= h($nominee->picture) ?></span></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Created') ?>:</dt> <dd><?= h($nominee->created) ?></dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($nominee->modified) ?></dd>

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
