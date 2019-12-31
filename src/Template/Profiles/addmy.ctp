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
                <h2>My Profile</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage My Profile</a>
                    </li>
                    <li class="active">
                        <strong>Profile</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active active-tab" tab="tab-1" ><a data-toggle="tab" href="#tab-1">Basic Info</a></li>
                        </ul>
                        <div class="ibox-content tab-content">
                            <div id="tab-1" class="tab-pane active">

                                <?= $this->Form->create($profile, ['id' => 'Admin-AddUser']) ?>
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12"> Name</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('name', ['class' => 'form-control','placeholder' => 'Full Name', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Mobile</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('mobile', ['class' => 'form-control','placeholder' => 'Mobile', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="hr-line-dashed"></div>
<!--                                two block  start -->
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12 ">Email</label>
                                            <div class="col-sm-12">
                                                <?php $disabled = (isset($this->request->data['id']) ? 'true' : 'false');  ?>
                                                <?php echo $this->Form->input('email', [ 'class' => 'form-control','placeholder' => 'Email', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Present Address</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('present_address', ['class' => 'form-control','placeholder' => 'Present address', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
<!--                                two block end -->
                                <div class="hr-line-dashed"></div>
                                <!--                                two block  start -->
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12"> Permanent Address </label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('permanent_address', ['class' => 'form-control','placeholder' => 'Permanent Address', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">No Of share</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('no_of_share', ['class' => 'form-control','placeholder' => 'No. Of Share', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--                                two block end -->



                                <div class="hr-line-dashed"></div>
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12"> Picture </label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('picture', ['class' => 'form-control','placeholder' => 'Picture', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Signature</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('sgn', ['class' => 'form-control','placeholder' => 'Signature', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="hr-line-dashed"></div>


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
                                                <?php echo $this->Html->link('Back', ['controller' => 'profiles','action' => 'index'],['type'=>'button','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
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
