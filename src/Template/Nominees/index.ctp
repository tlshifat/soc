<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nominee[]|\Cake\Collection\CollectionInterface $nominees
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
                            <h5>Nominees Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New',
                                    ['controller' => 'nominees','action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>
                            </span>
                        </div>


                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list-buttons" >
                                    <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('nid') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('picture') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('relation_tye') ?></th>


                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($nominees)>0) {
                                        foreach ($nominees as $nominee):

                                            $date = strtotime($nominee['created']);
                                            $dateCreatedFormat = date("Y-m-d", $date);
                                            $date = strtotime($nominee['modified']);
                                            $dateModifiedFormat = date("Y-m-d", $date);
                                            ?>
                                            <tr class="gradeX_<?php echo $nominee['id']; ?>">

                                                <td class = "capitalize"><?= ucfirst(h($nominee->name))?></td>
                                                <td><?= h($nominee->mobile) ?></td>
                                                <td><?= h($nominee->email) ?></td>
                                                <td><?php echo $this->Html->image('nominee/'.$nominee->nid, ['alt' => 'Nid Img','class' => 'img-circle minimize']); ?></td>
                                                <td><?php echo $this->Html->image('nominee/'.$nominee->picture, ['alt' => 'Picture ','class' => 'img-circle minimize']); ?></td>
                                                <td><?= h($nominee->relation_type) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'view', $nominee->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'editmy', $nominee->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
                                                    <?= $this->Html->link(__(''), "javascript:void(0);",['type' =>'button','data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Delete','class' => 'btn btn-warning btn-circle fa fa-times deleteData', 'id'=> 'nominees_'.$nominee->id]) ?>
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
<style>
    .minimize{
        height: 70px;
        width: 100px;
    }
</style>

