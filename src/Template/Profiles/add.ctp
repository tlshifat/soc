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
                                                <?php echo $this->Form->input('name', ['class' => 'form-control','placeholder' => 'First Name', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Mobile</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('mobile', ['class' => 'form-control','placeholder' => 'Last Name', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="hr-line-dashed"></div>
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
                                        <div class="form-group"><label class="col-sm-12 ">Present Address</label>
                                            <div class="col-sm-12">
                                                <?php  echo $this->Form->control('present_address',['type' => 'text','class' => ' form-control','label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12 ">Permanent Address</label>
                                            <div class="col-sm-12">
                                                <?php  echo $this->Form->control('permanent_address',['multiple' => false,'empty' => 'Please select Role','options' => @$role_data,'type' => 'select','class' => 'select2_demo_1 form-control','label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12 ">Image</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('picture', ['type' => 'password','class' => 'form-control', 'placeholder' => 'Password', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12 ">Sign</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('sign', ['type' => 'password','class' => 'form-control', 'placeholder' => 'Password', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12 ">No Of Share</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('no_of_share', ['type' => 'password','class' => 'form-control', 'placeholder' => 'Confirm Password', 'label' => false]); ?>
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
