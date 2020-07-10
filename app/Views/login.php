<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>

<style>
    body { background-color: #505155; }
</style>


    <form action="" class="form-login" method="POST">
        <h1 class="Login">Login</h1>


<?php if (session()->get('success')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->get('success'); ?>
    </div>
<?php endif; ?>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>

        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" value="<?= set_value('username') ?>" />
        <input type="password" class="login-input" name="password" placeholder="Password" />
        <input type="submit" value="Login" name="login-submit" class="login-button"/>
        <p class="link-login"><a href="resetpassword.php">Forgot Password</a></p>
    </form>


<?= $this->endSection()?>
