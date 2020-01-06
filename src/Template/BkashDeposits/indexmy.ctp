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
                <h2>Bkash Deposits</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage Bkash Deposits</a>
                    </li>
                    <li class="active">
                        <strong>Bkash Deposits List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Bkash Deposits Listing</h5>
                            <span>
                                <?php echo $this->Html->link('Add New Payments',
                                    ['controller' => 'bkashDeposits','action' => 'add'],['type'=>'button','_full' => false,'class' => 'btn btn-success btn-xs pull-right']); ?>
                            </span>
                        </div>


                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-list-buttons" >
                                    <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('payment_type') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('payment_for') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('payment_month') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('bkash_number') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('amount') ?></th>

                                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($bkashDeposits)>0) {
                                        foreach ($bkashDeposits as $bkashDeposit):

                                            $date = strtotime($bkashDeposit['created']);
                                            $dateCreatedFormat = date("Y-m-d", $date);
                                            $date = strtotime($bkashDeposit['modified']);
                                            $dateModifiedFormat = date("Y-m-d", $date);
                                            ?>
                                            <tr class="gradeX_<?php echo $bkashDeposit['id']; ?>">

                                                <td><?= $this->Number->format($bkashDeposit->id) ?></td>
                                                <td><?= h($bkashDeposit->payment_type) ?></td>
                                                <td><?= h($bkashDeposit->payment_for) ?></td>
                                                <td><?= h($bkashDeposit->date) ?></td>
                                                <td><?= h($bkashDeposit->payment_month) ?></td>
                                                <td><?= h($bkashDeposit->bkash_number) ?></td>
                                                <td><?= h($bkashDeposit->reference_number) ?></td>
                                                <td><?= h($bkashDeposit->amount) ?></td>
                                                <td><?= $bkashDeposit->has('user') ? $this->Html->link($bkashDeposit->user->id, ['controller' => 'Users', 'action' => 'view', $bkashDeposit->user->id]) : '' ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__(''), ['action' => 'viewmy', $bkashDeposit->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Detail View','class' => 'btn btn-info btn-circle fa fa-paste']) ?>
                                                    <?= $this->Html->link(__(''), ['action' => 'editmy', $bkashDeposit->id],['data-toggle' =>'tooltip','data-placement' => 'bottom', 'title' =>'Edit','class' => 'btn btn-primary btn-circle fa fa-list']) ?>
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
