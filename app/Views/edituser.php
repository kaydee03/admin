<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
  <br>
  <?= \Config\Services::validation()->listErrors(); ?>

  <span class="d-none alert alert-success mb-3" id="res_message"></span>

  <div class="row">
    <div class="col-md-9">

      <form action="<?= '/users/updateuser'; ?>" name="edituser" id="edituser" method="post" accept-charset="utf-8">

        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $user->id ?>">

        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Please enter first name" value="<?php echo $user->u_firstname ?>">

        </div>

        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" name="lastname" class="form-control" id="type" placeholder="Please enter last name" value="<?php echo $user->u_lastname ?>">

        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email" value="<?php echo $user->u_email ?>">

        </div>

        <div class="form-group">
          <label for="role">Role</label>
          <input type="text" name="role" class="form-control" id="role" placeholder="Please enter role" value="<?php echo $user->u_role ?>">

        </div>
        <?php
        $selectData = [
          'items' => $companies,
          'primaryKey' => 'id',
          'display' => 'ci_legal_name',
          'compareTo' => $user->u_company,
          'placeholder' => 'Select Company',
          'name' => 'company',
          'label' => 'Company',
        ];
        ?>
        <?= view_cell('\App\Libraries\Form::select', $selectData) ?>

        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" name="status" class="form-control" id="status" placeholder="Please enter status" value="<?php echo $user->u_status ?>">

        </div>

        <div class="form-group">
          <button type="submit" id="send_form" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-9">
      <?= $this->include('users/userroles') ?>
    </div>
  </div>


</div>
<script>
  if ($("#edit-user").length > 0) {
    $("#edit-user").validate({

      rules: {
        name: {
          required: true,
        },

        email: {
          required: true,
          maxlength: 50,
          email: true,
        },
      },
      messages: {

        name: {
          required: "Please enter name",
        },
        email: {
          required: "Please enter valid email",
          email: "Please enter valid email",
          maxlength: "The email name should less than or equal to 50 characters",
        },
      },
    })
  }
</script>
<?= $this->endSection() ?>