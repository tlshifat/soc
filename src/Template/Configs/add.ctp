<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Form->unlockField('images');
$this->Form->unlockField('sgn');
?>
<div id="wrapper">

    <?php echo $this->element('admin/sidebar'); ?>

    <div id="page-wrapper" class="gray-bg">
        <?php echo $this->element('admin/top_header'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Configs </h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage Configs</a>
                    </li>
                    <li class="active">
                        <strong>Config List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active active-tab" tab="tab-1" ><a data-toggle="tab" href="#tab-1">Info</a></li>
                        </ul>
                        <div class="ibox-content tab-content">
                            <div id="tab-1" class="tab-pane active">

                                <?= $this->Form->create($config) ?>



                                <!--                                two block  start -->

                                <!--                                two block end -->
                                <div class="hr-line-dashed"></div>
                                <!--                                two block  start -->
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Name  </label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->control('name', ['class' => 'form-control','placeholder' => 'Name', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Config</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->control('conf', ['class' => 'form-control','placeholder' => 'conf', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--                                two block end -->







                                <div class="hr-line-dashed"></div>
                                <div class ="row">

                                    <div class ="row">



                                    </div>

                                    <div class ="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="top-btns">
                                                    <?php echo $this->Html->link('Back', ['action' => 'index'],['type'=>'button','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
                                                    <?= $this->Form->button('Reset', ['type'=>'reset','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
                                                    <?= $this->Form->button('Save Changes',['class' => 'btn btn-primary pull-right m-l-sm', 'type' => 'submit']); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->element('inner_footer'); ?>
        </div>
    </div>


