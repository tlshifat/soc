<?php

?>
<div id="wrapper">

    <?php echo $this->element('admin/sidebar'); ?>

    <div id="page-wrapper" class="gray-bg">
       <?php echo $this->element('admin/top_header'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <br>    <br>

                <?php if(empty($profile_info)){?>
                    <div class="alert alert-danger "> Profile not found.Please complete your profile.</div>
                <?php }?>
                <h1>Hello <?php echo $user_info['first_name'].' '.$user_info['last_name']; ?></h1>

                <h2>Welcome to Associations Admin Panel !!</h2>
                <ol class="breadcrumb">

<!--                    <li>-->
<!--                        <a>Manage Users</a>-->
<!--                    </li>-->
<!--                    <li class="active">-->
<!--                        <strong>Users List</strong>-->
<!--                    </li>-->
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">



                        <div class="ibox-content">

                            <div class="table-responsive">

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
