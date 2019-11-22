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
                <h2>Faq</h2>
                <ol class="breadcrumb">
                    
                    <li>
                        <a>Manage Faq</a>
                    </li>
                    <li class="active">
                        <strong>Faq List</strong> 
                    </li>
                </ol>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins tabs-container">
                        <div class="ibox-content tab-content">
                             <div id="tab-1" class="tab-pane active">
					<?php  //Creating roles dropdown
                                        if(isset($allTitle) && !empty($allTitle)){
                                            $title_data = [];
                                            foreach ($allTitle as $key => $titleValue) {
                                                $title_data[$titleValue['title']] = ucfirst($titleValue['title']);
                                            }

                                        }    
                                        ?>
                                    <?= $this->Form->create($faq) ?>
                                    <div class ="row">
                                        <div class="col-md-8">
                                            <div class="form-group"><label class="col-sm-12">Topic</label>
                                                <div class="col-sm-12">
                                                  <div class="col-sm-8"><?php  echo $this->Form->control('title',['multiple' => false,'empty' => 'Please select Title','options' => @$title_data,'type' => 'select','class' => 'select2_demo_1 form-control','label' => false, 'required' => false]); ?></div> 
<div class="col-sm-4"><a href="javascript:void(0)" id="add_title"><i class="fa fa-plus"></i></a></div>
<div class="row" id="title_box">
<div class="col-sm-8"><?php  echo $this->Form->control('title_new', ['class' => 'form-control','placeholder' => 'Title', 'required' => false, 'label' => false]); ?> </div> <div class="col-sm-4"><a href="javascript:void(0)" id="close_title"><i class="fa fa-close"></i></a></div> </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
<div class ="row">
                                        <div class="col-md-8">
                                            <div class="form-group"><label class="col-sm-12">Question</label>
                                                <div class="col-sm-12">
                                                    <?php echo $this->Form->control('question', ['class' => 'form-control','placeholder' => 'Question', 'required' => true, 'label' => false]); ?>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>            
                                    <div class ="row">                              
                                        <div class="col-md-8">
                                            <div class="form-group"><label class="col-sm-12">Answer</label>
                                                <div class="col-sm-12">
                                                <?php 
                                                    echo $this->Form->input('answer', ['type'=>'textarea','rows' => '5','class' => 'edittextarea form-control','placeholder' => 'Answer', 'label' => false]); ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>                                   
                                                                        
                                    <div class="hr-line-dashed"></div>
                                    <div class ="row">
                                         <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="top-btns">
                                                    <?php echo $this->Html->link('Back', ['controller' => 'faq','action' => 'index'],['type'=>'button','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
                                                    <?= $this->Form->button('Reset', ['type'=>'reset','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
                                                    <?= $this->Form->button('Save',['class' => 'btn btn-primary pull-right m-l-sm', 'type' => 'submit']); ?>

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

<script>
    $(document).ready(function(){
	$('#title_box').css('display','none');
        $('#add_title').click(function() {
		$('#title_box').show();
	});
	$('#close_title').click(function() {
		$('#title_box').hide();
		$('#title-new').val('');
	});
    });
</script>
