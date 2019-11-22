<?php //code for setting variables based on set cookie
    if(isset($remembered_data)){
        $email = $remembered_data['email'];
        $password = $remembered_data['password'];
        $checkedvalue = 'checked';
    }else{ 
        $password = $email = ''; 
        $checkedvalue = '';
    } 
?>
<div>
    <div>
        <h1 class="logo-name">TQM</h1>
    </div>
    <h3><?= __('Login') ?></h3>
    
    <?= $this->Form->create('loginform', ['url' => ['action' => '/login'], 'id' => 'login_form']);?>
        <div class="form-group">
            <?= $this->Form->control('email', ['placeholder' => 'Email','value' =>@$email, 'required' => true, 'type' => 'email', 'class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('password', ['type' => 'password','value' =>@$password, 'placeholder' => 'Password', 'required' => true, 'class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group checkbox-group  remb-log">
            <?php echo $this->Form->checkbox('remember_me', ['hiddenField' => false, 'value' => 1, 'checked' => $checkedvalue ]); ?>
            <label>Remember Me</label>
        </div>

        <?= $this->Form->button(__('Login'), ['type' => 'submit', 'class' => 'btn btn-primary block full-width m-b']) ?>

        <a href="#"><small>Forgot password?</small></a>
        <p class="text-muted text-center"><small><?= __('Do not have an account?') ?></small></p>
        <?= $this->Html->link('Create an account', ['controller'=>'users', 'action'=>'register'], ['class' => 'btn btn-sm btn-white btn-block']) ?>

    <?= $this->Form->end() ?>
    <p class="m-t"> <small>XYZ Company &copy; 2018</small> </p>
</div>