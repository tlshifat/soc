<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile[]|\Cake\Collection\CollectionInterface $profiles
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
                        <a>Manage My Profiles</a>
                    </li>
                    <li class="active">
                        <strong>Profile </strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>My Profile </h5>
                            <?php if(count($profiles) < 1) {?>
                            <span>
                                <?php echo $this->Html->link('Add My Profile',
                                    ['controller' => 'profiles','action' => 'addmy'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>
                            </span>
                            <?php } ?>
                        </div>


                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list-buttons" >
                                    <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('present_address') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('permanent_address') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('picture') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('sgn') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('no_of_share') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>


                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($profiles)>0) {
                                        foreach ($profiles as $profile):

                                            if($profile['status'] == 1){
                                                $status = 'Active';
                                                $statusClass = 'btn btn-primary btn-xs';
                                            }elseif($profile['status'] == 2){
                                                $status = 'Inactive';
                                                $statusClass = 'btn btn-warning btn-xs';
                                            }
                                            $date = strtotime($profile['created']);
                                            $dateCreatedFormat = date("Y-m-d", $date);
                                            $date = strtotime($profile['modified']);
                                            $dateModifiedFormat = date("Y-m-d", $date);
                                            ?>
                                            <tr class="gradeX_<?php echo $profile['id']; ?>">

                                                <td class = "capitalize"><?= ucfirst(h($profile->name))?></td>
                                                <td><?= h($profile->mobile) ?></td>
                                                <td><?= h($profile->email) ?></td>
                                                <td><?= h($profile->present_address) ?></td>
                                                <td><?= h($profile->permanent_address) ?></td>
                                                <td><?= h($profile->picture) ?></td>
                                                <td><?= h($profile->sgn) ?></td>
                                                <td><?= h($profile->no_of_share) ?></td>
                                                <td><b><?php echo $this->Html->link($status,'javascript:void(0)',['_full' => false,'class' => "".' '.$statusClass.' '."manage_status_".$user['id'],'id' =>$user['id']] ); ?></b></td>

<!--                                                <td>--><?//= h($dateCreatedFormat) ?><!--</td>-->
<!--                                                <td>--><?//= h($dateModifiedFormat) ?><!--</td>-->

                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'viewmy', $profile->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'editmy', $profile->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
<!--
                                                    <?// Common class 'deleteData' has been used, which will open the confirmation popup. Clicked on Delete icon, will call the common Delete function declared in /js/admin/custom.js ?>
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
