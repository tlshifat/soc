<!-- File: src/Template/Articles/edit.ctp -->
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

                            <!--***************************Code for loder*********************************************** -->
                                <div class="addentrepreneur-lodercls" style="display:none"> 
                                    <div class="sk-spinner sk-spinner-double-bounce">
                                        <div class="sk-double-bounce1"></div>  
                                    </div>  
                                </div> 
                            <!--***************************Code for loder*********************************************** -->

                                    <?= $this->Form->create($faq) ?>
                                    <div class ="row">
                                        <div class="col-md-8">
                                            <div class="form-group"><label class="col-sm-12">Topic</label>
                                                <div class="col-sm-12">
                                                    <?php echo $this->Form->input('title', ['class' => 'form-control','placeholder' => 'Topic', 'required' => true, 'label' => false]); ?>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
					<div class ="row">
                                        <div class="col-md-8">
                                            <div class="form-group"><label class="col-sm-12">Question</label>
                                                <div class="col-sm-12">
                                                    <?php echo $this->Form->input('question', ['class' => 'form-control','placeholder' => 'Question', 'required' => true, 'label' => false]); ?>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>            
                                    <div class ="row">                              
                                        <div class="col-md-8">
                                            <div class="form-group"><label class="col-sm-12">Answer</label>
                                                <div class="col-sm-12">
                                                <?php 
                                                    echo $this->element('tinyMCE/editor'); 
                                                    echo $this->Form->input('answer', ['type'=>'textarea','rows' => '5','class' => 'edittextarea form-control','placeholder' => 'Body', 'label' => false]); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>                                   
                                                                        
                                    <div class="hr-line-dashed"></div>
                                    <div class ="row">
                                         <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="top-btns">
                                                    <?php echo $this->Html->link('Back', ['controller' => 'articles','action' => 'index'],['type'=>'button','_full' => false,'class' => 'btn btn-white pull-right m-l-sm']); ?>
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
