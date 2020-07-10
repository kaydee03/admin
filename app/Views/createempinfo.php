<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?= '/empinfo/storeempinfo' ;?>" name="create_empinfo" id="create_empinfo" method="post" accept-charset="utf-8">
 
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Please enter first name">
             
          </div>

          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Please enter last name">
             
          </div>

          <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" class="form-control" id="position" placeholder="Please enter position">
             
          </div>
 
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Please enter title">
             
          </div>

          <div class="form-group">
            <label for="employer">Employer</label>
            <input type="text" name="employer" class="form-control" id="employer" placeholder="Please enter employer">
             
          </div>

          <div class="form-group">
            <label for="employment">Employment</label>
            <select id="employment" name="employment" class="form-control">
                  <option value="">Select</option>
                  <option value="Full-Time">Full-Time</option>
                  <option value="Part-Time">Part-Time</option>
                  <option value="Contractor">Contractor</option>
            </select>
             
          </div>

          <div class="form-group">
            <label for="pay_structure">Pay Structure</label>
            <input type="text" name="pay_structure" class="form-control" id="pay_structure" placeholder="Please enter pay structure">
             
          </div>

          <div class="form-group">
            <label for="compensation">Compensation</label>
            <input type="text" name="compensation" class="form-control" id="compensation" placeholder="Please enter compensation">
             
          </div>
 
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Please enter phone number">
             
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email">
             
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Please enter address">
             
          </div> 
 
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Please enter city">
             
          </div>
 
          <div class="form-group">
            <label for="state">State</label>
            <?= view_cell('\App\Libraries\Form::abbrevstates', ['name'=> 'state']) ?>

          </div>
 
          <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control" id="zip" placeholder="Please enter zip">
             
          </div>

          <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control">
                  <option value="">Select</option>
                  <option value="M">M</option>
                  <option value="F">F</option>
            </select>
             
          </div>
 
          <div class="form-group">
            <label for="dob">DOB</label>
            <input type="date" name="dob" class="form-control" id="dob" placeholder="Please enter dob">
             
          </div>
          <div class="form-group">
            <label for="hire_date">Hire Date</label>
            <input type="date" name="hire_date" class="form-control" id="hire_date" placeholder="Please enter hire date">
             
          </div>
          <div class="form-group">
            <label for="cdl_num">CDL Num</label>
            <input type="text" name="cdl_num" class="form-control" id="cdl_num" placeholder="Please enter cdl num.">
             
          </div>

          <div class="form-group">
            <label for="cdl_state">CDL State</label>
            <input type="text" name="cdl_state" class="form-control" id="cdl_state" placeholder="Please enter cdl state">
             
          </div>

          <div class="form-group">
            <label for="cdl_exp">CDL Exp.</label>
            <input type="date" name="cdl_exp" class="form-control" id="cdl_exp" placeholder="Please enter cdl exp.">
             
          </div>

          <div class="form-group">
            <label for="med_cert_exp">Medical Cert. Exp.</label>
            <input type="date" name="med_cert_exp" class="form-control" id="med_cert_exp" placeholder="Please enter medical cert. exp.">
             
          </div>

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#create_empinfo").length > 0) {
      $("#create_empinfo").validate({
      
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

<?= $this->endSection()?>
