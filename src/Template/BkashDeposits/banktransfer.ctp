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
                <h2>Bank transfer</h2>
                <ol class="breadcrumb">

                    <li>
                        <a>Manage Bank transfer</a>
                    </li>
                    <li class="active">
                        <strong>Payments List</strong>
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title ">
                            <h5>Payments Listing</h5>
                        </div>


                        <div class="ibox-content">

                            <div class="table-responsive">

                                <table id="example" class="table table-striped table-bordered table-hover dataTables-list-buttons" >

                                    <thead>
                                    <tr>

                                        <th scope="col"><?= $this->Paginator->sort('payment_type') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('payment_for') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('payment_month') ?></th>

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


                                                <td><?= h($bkashDeposit->payment_type) ?></td>
                                                <td><?= h($bkashDeposit->payment_for) ?></td>
                                                <td><?=  date_format($bkashDeposit->date,"m/d/y") ?></td>
                                                <td><?= h($bkashDeposit->payment_month) ?></td>

                                                <td><?= h($bkashDeposit->reference_number) ?></td>
                                                <td><?= h($bkashDeposit->amount) ?></td>
                                                <td><?= $bkashDeposit->has('user') ? $this->Html->link($bkashDeposit->user->name, ['controller' => 'Users', 'action' => 'view', $bkashDeposit->user->id]) : '' ?></td>
                                                <td class="actions">
                                                    <input class="pay" value="<?php echo $bkashDeposit->id; ?>" type="checkbox"/>
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
                            <?php echo $this->Form->create($bkashDeposit, ['id'=>'bank-transfer','url' => ['action' => 'transfer']]); ?>
                            <input type="hidden" name="payable" id="payable"/>
                            <input type="button" class="btn btn-success" value="Proceed" onclick="banktransfer();"/>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('inner_footer'); ?>
    </div>
</div>

<script type="application/javascript">
    function banktransfer(){
        var checkedVals = $('.pay:checkbox:checked').map(function() {
            return this.value;
        }).get();
        $("#payable").val(checkedVals.join(","));
        $("#bank-transfer").submit();
        // var model="bkash-deposits";
        // var data= checkedVals.join(",");
        // //call to controller
        // $.ajax({
        //     method: "POST",
        //     data: data,
        //     dataType: "json",
        //     url: model + '/transfer' ,
        //     success:function(data) {
        //         alert("ok");
        //     }
        // });
        // //end

    }
</script>
