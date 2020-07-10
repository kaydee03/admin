<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">

        <form action="<?= '/empinfo/updateempinfo' ;?>" name="editempinfo" id="editempinfo" method="post" accept-charset="utf-8">
 
           <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $empinfo['id'] ?>">

          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" id="fname" placeholder="Please enter first name" value="<?php echo $empinfo['ei_firstname'] ?>">
             
          </div>
 
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Please enter last name" value="<?php echo $empinfo['ei_lastname'] ?>">
             
          </div>

          <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" class="form-control" id="position" placeholder="Please enter position" value="<?php echo $empinfo['ei_position'] ?>">
             
          </div>

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Please enter title" value="<?php echo $empinfo['ei_title'] ?>">
             
          </div>

          <div class="form-group">
            <label for="employer">Employer</label>
            <input type="text" name="employer" class="form-control" id="employer" placeholder="Please enter employer" value="<?php echo $empinfo['ei_employer'] ?>">
             
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
            <input type="text" name="pay_structure" class="form-control" id="pay_structure" placeholder="Please enter pay structure" value="<?php echo $empinfo['ei_pay_structure'] ?>">
             
          </div>

          <div class="form-group">
            <label for="compensation">Compensation</label>
            <input type="text" name="compensation" class="form-control" id="compensation" placeholder="Please enter compensation" value="<?php echo $empinfo['ei_compensation'] ?>">
             
          </div>
 
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Please enter phone number" value="<?php echo $empinfo['ei_phone_number'] ?>">
             
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email" value="<?php echo $empinfo['ei_email'] ?>">
             
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Please enter address" value="<?php echo $empinfo['ei_address'] ?>">
             
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Please enter city" value="<?php echo $empinfo['ei_city'] ?>">
             
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <?= view_cell('\App\Libraries\Form::abbrevstates', ['name'=> 'state']) ?>

          </div>

          <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control" id="zip" placeholder="Please enter zip" value="<?php echo $empinfo['ei_zip'] ?>">
             
          </div>

          <div class="form-group">
            <label for="gender">Gender</label>
            <td><select id="gender" name="gender" class="form-control">
                  <option value="">Select</option>
                  <option value="M">M</option>
                  <option value="F">F</option>
            </select></td>
            
          </div>

          <div class="form-group">
            <label for="dob">DOB</label>
            <input type="date" name="dob" class="form-control" id="dob" placeholder="Please enter dob" value="<?php echo $empinfo['ei_dob'] ?>">
             
          </div>

          <div class="form-group">
            <label for="hire_date">Hire Date</label>
            <input type="date" name="hire_date" class="form-control" id="hire_date" placeholder="Please enter hire date" value="<?php echo $empinfo['ei_hire_date'] ?>">
             
          </div>

          <div class="form-group">
            <label for="cdl_num">CDL Num.</label>
            <input type="text" name="cdl_num" class="form-control" id="cdl_num" placeholder="Please enter cdl num." value="<?php echo $empinfo['ei_cdl_num'] ?>">
             
          </div>

          <div class="form-group">
            <label for="cdl_state">CDL State</label>
            <?= view_cell('\App\Libraries\Form::abbrevstates', ['name'=> 'cdl_state']) ?>

          </div>

          <div class="form-group">
            <label for="cdl_exp">CDL Exp.</label>
            <input type="date" name="cdl_exp" class="form-control" id="cdl_exp" placeholder="Please enter cdl exp." value="<?php echo $empinfo['ei_cdl_exp'] ?>">
             
          </div>

          <div class="form-group">
            <label for="med_cert_exp">Medical Cert. Exp.</label>
            <input type="date" name="med_cert_exp" class="form-control" id="med_cert_exp" placeholder="Please enter medical cert. exp." value="<?php echo $empinfo['ei_med_cert_exp'] ?>">
             
          </div>

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#editempinfo").length > 0) {
      $("#editempinfo").validate({
      
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
