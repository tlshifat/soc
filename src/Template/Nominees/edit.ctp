<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Form->unlockField('nid');
$this->Form->unlockField('picture');
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
                    <div class="ibox float-e-margins tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active active-tab" tab="tab-1" ><a data-toggle="tab" href="#tab-1">Basic Info</a></li>
                        </ul>
                        <div class="ibox-content tab-content">
                            <div id="tab-1" class="tab-pane active">

                                <?= $this->Form->create($nominee, ['type' => 'file','id' => 'Admin-AddUser']) ?>
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Name</label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('name', ['class' => 'form-control','placeholder' => 'First Name', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Mobile </label>
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
                                                <?php echo $this->Form->input('email', ['disabled' => $disabled, 'class' => 'form-control','placeholder' => 'Email', 'required' => true, 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Relation Type </label>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->input('relation_type', ['options'=>$relations,'class' => 'form-control','placeholder' => 'Last Name', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class ="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">Picture </label>
                                            <?php echo $this->Html->image('nominee/'.$nominee->picture, ['id'=>'img1','alt' => 'Nominee Img','class' => 'img-circle minimize']); ?>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->control('picture', ['id'=>'pic','type'=>'file','class' => 'form-control','placeholder' => 'Present address', 'label' => false]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"><label class="col-sm-12">NID </label>
                                            <?php echo $this->Html->image('nominee/'.$nominee->nid, ['id'=>'img2','alt' => 'Nid Img','class' => 'img-circle minimize']); ?>
                                            <div class="col-sm-12">
                                                <?php echo $this->Form->control('nid', ['id'=>'sgn','type'=>'file','class' => 'form-control','placeholder' => 'Present address', 'label' => false]); ?>
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
                                                <?php echo $this->Html->link('Back', ['controller' => 'users','action' => 'index'],['type'=>'button','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
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
<style>
    .minimize{
        height: 100px;
        width: 100px;
        margin-left: 50px;
    }
</style>
<script type="application/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pic").change(function() {
        readURL(this);
    });

    $("#sgn").change(function() {
        readURL1(this);
    });
</script>


