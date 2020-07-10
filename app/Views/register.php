<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>

<style>
    body { background-color: #505155; }
</style>

    <form class="form-login" action="" method="post">
        <h1 class="login-title">Register</h1>

<?php if (isset($validation)): ?>

<div class="alert alert-danger" role="alert">
<?= $validation->listErrors(); ?>
</div>
<?php endif; ?>

        <input type="text" class="login-input" name="firstname" placeholder="First Name" value="<?= set_value('firstname') ?>" required />
        <input type="text" class="login-input" name="lastname" placeholder="Last Name" value="<?= set_value('lastname') ?>" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" value="<?= set_value('email') ?>" required />
        <input type="password" class="login-input" name="password" placeholder="Password" value="<?= set_value('password') ?>" required />
        <input type="password" class="login-input" name="confirmpassword" placeholder="Confirm Password" value="<?= set_value('confirmpassword') ?>" required />
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>

<?= $this->endSection()?>