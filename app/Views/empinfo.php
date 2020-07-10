<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>


  <div class="container mt-5">
    <a href="<?php echo site_url('/empinfo/createempinfo') ?>" class="btn btn-success mb-2">Add Employee</a>
      <?php
    
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="row mt-3">
  <div class="col-12">
     <table class="table table-responsive table-bordered table-striped text-nowrap mydatatable fontsize12" style="width: 100%">
     <thead>
          <tr>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Position</th>
             <th>Title</th>
             <th>Employer</th>
             <th>Employment</th>
             <th>Pay Structure</th>
             <th>Compensation</th>
             <th>Phone Number</th>
             <th>Email</th>
             <th>Adress</th>
             <th>City</th>
             <th>State</th>
             <th>Zip</th>
             <th>Gender</th>
             <th>DOB</th>
             <th>Hire Date</th>
             <th>CDL Num.</th>
             <th>CDL State</th>
             <th>CDL Exp.</th>
             <th>Medical Certifiate Exp.</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($empinfo): ?>
          <?php foreach($empinfo as $list): ?>
          <tr>
            <td><?= $list['ei_firstname']; ?></td>
            <td><?= $list['ei_lastname']; ?></td>
            <td><?= $list['ei_position']; ?></td>
            <td><?= $list['ei_title']; ?></td>
            <td><?= $list['ei_employer']; ?></td>
            <td><?= $list['ei_employment']; ?></td>
            <td><?= $list['ei_pay_structure']; ?></td>
            <td><?= $list['ei_compensation']; ?></td>
            <td><?= $list['ei_phone_number']; ?></td>
            <td><?= $list['ei_email']; ?></td>
            <td><?= $list['ei_address']; ?></td>
            <td><?= $list['ei_city']; ?></td>
            <td><?= $list['ei_state']; ?></td>
            <td><?= $list['ei_zip']; ?></td>
            <td><?= $list['ei_gender']; ?></td>
            <td><?= $list['ei_dob']; ?></td>
            <td><?= $list['ei_hire_date']; ?></td>
            <td><?= $list['ei_cdl_num']; ?></td>
            <td><?= $list['ei_cdl_state']; ?></td>
            <td><?= $list['ei_cdl_exp']; ?></td>
            <td><?= $list['ei_med_cert_exp']; ?></td>
            <td><a href="<?= '/empinfo/editempinfo/'.$list['id'] ;?>" class="btn btn-success">Edit</a></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
     </div>


<script>
  $('.mydatatable').DataTable({
    searching: false,
    ordering: false,
    lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    createdRow: function ( row, data, index ) {
      if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
        $('td', row).eq(5).addClass('text-success');
      }
    }

  });

  function toggleAddForm(e){
    e.preventDefault();
    $('#addFormWrapper').toggle()
  }
</script>

  </div>
</div>

<?= $this->endSection()?>
