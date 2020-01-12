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
                <h2>Module Configurations</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage Configurations</a>
                    </li>
                    <li class="active">
                        <strong>Configurations List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Config Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New Config',
                                    ['action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>
                            </span>
                        </div>


                        <div class="ibox-content">

                                <table id="example" class="table table-striped table-bordered table-hover dataTables-list-buttons" >

                                    <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('conf',["Configuration"]) ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($configs)>0) {
                                        foreach ($configs as $config):

                                            $date = strtotime($config['created']);
                                            $dateCreatedFormat = date("Y-m-d", $date);
                                            $date = strtotime($config['modified']);
                                            $dateModifiedFormat = date("Y-m-d", $date);
                                            ?>
                                            <tr class="gradeX_<?php echo $config['id']; ?>">

                                                <td><?= $this->Number->format($config->id) ?></td>
                                                <td><?= h($config->name) ?></td>
                                                <td><?= h($config->conf) ?></td>
                                                <td><?= h($dateCreatedFormat) ?></td>
                                                <td><?= h($dateModifiedFormat) ?></td>

                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'view', $config->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'edit', $config->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
                                                    <?= $this->Html->link(__(''), "javascript:void(0);",['type' =>'button','data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Delete','class' => 'btn btn-warning btn-circle fa fa-times deleteData', 'id'=> 'users_'.$bkashDeposit->id]) ?>
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



<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config[]|\Cake\Collection\CollectionInterface $configs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Config'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="configs index large-9 medium-8 columns content">
    <h3><?= __('Configs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($configs as $config): ?>
            <tr>
                <td><?= $this->Number->format($config->id) ?></td>
                <td><?= h($config->name) ?></td>
                <td><?= h($config->created) ?></td>
                <td><?= h($config->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $config->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $config->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $config->id], ['confirm' => __('Are you sure you want to delete # {0}?', $config->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
