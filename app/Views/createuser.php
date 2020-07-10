<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>

    <span class="d-none alert alert-success mb-3" id="res_message"></span>

    <div class="row">
      <div class="col-md-9">
        <form action="<?= '/users/storeuser' ;?>" name="user_create" id="user_create" method="post" accept-charset="utf-8">

          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Please enter first name">

          </div>

          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Please enter last name">

          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email">

          </div> 

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Please enter password">

          </div>

          <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Confirm password">

          </div>

          <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" class="form-control">
                <option value="">Select</option>
                <option value="Dispatcher">Dispatcher</option>
                <option value="Accountant">Accountant</option>
                <option value="Admin">Admin</option>
                <option value="ViewOnly">ViewOnly</option>
            </select>

          </div>

          <div class="form-group">
            <label for="company">Email</label>
            <input type="text" name="company" class="form-control" id="company" placeholder="Please enter company">

          </div> 

          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="Suspended">Suspended</option>
            </select>

          </div> 

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>

        </form>
      </div>

    </div>

</div>
 <script>
   if ($("#user_create").length > 0) {
      $("#user_create").validate({
      
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
</body>
</html>


<?= $this->endSection()?>
