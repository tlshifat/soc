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
                <h2>Bank transfer </h2>
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

                                <table id="example" class="table table-striped table-bordered table-hover" >

                                    <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('payment_month') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('amount') ?></th>


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
                                                <td><?= $bkashDeposit->has('user') ? $this->Html->link($bkashDeposit->user->name, ['controller' => 'Users', 'action' => 'view', $bkashDeposit->user->id]) : '' ?></td>
                                                <td><?= h($bkashDeposit->payment_month) ?></td>
                                                <td><?= h($bkashDeposit->amount) ?></td>

                                            </tr>


                                        <?php endforeach;

                                    } else { ?>
                                        <tr>
                                            <td><?= __('No records found') ?></td>
                                        </tr>
                                        <?php
                                    }?>
                                    <tr class="gradeX_">

                                        <td colspan="2" style="text-align: center">Total</td>
                                        <td><?php echo $sum;?></td>

                                    </tr>
                                    <tr class="gradeX_">

                                        <td colspan="2" style="text-align: center">Transfer to A/C</td>
                                        <?php echo $this->Form->create($bkashDeposit, ['id'=>'process-bank','method'=>'GET','url' => ['action' => 'transfer']]); ?>
                                        <td><select name="bank">
                                                <option selected="selected">Choose one</option>
                                                <?php
                                                // A sample product array
                                                $products = array("Mobile", "Laptop", "Tablet", "Camera");
                             // Iterating through the product array
                                                foreach($bankAccounts as $item){
                                                    ?>
                                                    <option value="<?php echo $item->id; ?>"><?php echo $item->bank_name; ?></option>

                                                    <?php

                                                }

                                                ?>
                                            </select>
                                        </td>
                                        <td><input type="hidden" name="payable" value="<?php echo $payable;?>"></td>

                                    </tr>

                                    </tbody>
                                </table>
                                <hr>

                            </div>
                            <input type="submit" class="btn btn-success" value="Submit"/>
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
        alert(checkedVals.join(","));
        alert("ok");
        var model="bkash-deposits";
        var data= checkedVals.join(",");
        //call to controller
        $.ajax({
            method: "POST",
            data: data,
            dataType: "json",
            url: model + '/transfer' ,
            success:function(data) {

            }
        });
        //end

    }
</script>
