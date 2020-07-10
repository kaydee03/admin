<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            
                <h3 class="profile-username text-center">
                    <?= $crud->getValues('u_firstname') . ' ' . $crud->getValues('u_lastname') ?>
                </h3>
                <?php if ($crud->getValues('u_status') == 'Active') : ?>
                    <?php $class = 'success'; ?>
                <?php else : ?>
                    <?php $class = 'danger'; ?>
                <?php endif; ?>
                <p class="text-<?= $class ?> text-center"><?= $crud->getValues('u_status') ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                        <b>Username</b> <a class="float-right"><?= $crud->getValues('u_username') ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"><?= $crud->getValues('u_email') ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Since</b> <a class="float-right"><?= date('M d Y', strtotime($crud->getValues('u_created_at'))) ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#security" data-toggle="tab">Security</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <h4>General details</h4>
                        <?= $form ?>
                    </div>
                    <div class="tab-pane" id="security">
                        <h4>Change password</h4>
                        <?= $password_form ?>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>