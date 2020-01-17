<div>
    <div>
        <h1 class="logo-name"></h1>
    </div>
    <h3><?= __('Register') ?></h3>

    <?= $this->Form->create('registerform', ['url' => ['action' => '/register'], 'id' => 'register_form']);?>
        <div class="form-group">
            <?= $this->Form->control('first_name', ['placeholder' => 'First Name', 'required' => true, 'class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('last_name', ['placeholder' => 'Last Name', 'required' => true, 'class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('email', ['placeholder' => 'Email', 'required' => true, 'type' => 'email', 'class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('password', ['type' => 'password','value' =>@$password, 'placeholder' => 'Password', 'required' => true, 'class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('confirm_password', ['type' => 'password','value' =>@$password, 'placeholder' => 'Confirm Password', 'required' => true, 'class' => 'form-control', 'label' => false]); ?>
        </div>


        <?= $this->Form->button(__('Register'), ['type' => 'submit', 'class' => 'btn btn-primary block full-width m-b']) ?>

        <p class="text-muted text-center"><small><?= __('Do you have an account?') ?></small></p>
        <?= $this->Html->link('Login to your account', ['controller'=>'users', 'action'=>'login'], ['class' => 'btn btn-sm btn-white btn-block']) ?>

    <?= $this->Form->end() ?>
    <p class="m-t"> <small>Shifatul Islam &copy; 2019</small> </p>
</div>
