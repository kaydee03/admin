<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>


  <div class="container mt-5">
    <a href="<?php echo site_url('/users/createuser') ?>" class="btn btn-success mb-2">Create User</a>
      <?php
    
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
      
     ?>
  <div class="row mt-3 ">
     <table class="table table-bordered table-striped text-nowrap mydatatable" style="width: 100%">
       <thead>
          <tr>
<!--             <th>Id</th>  -->
             <th>Username</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Role</th>
             <th>Company</th>
             <th>Create Date/Time</th>
             <th>Last Login</th>
             <th>Active</th>
             <th>Status</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as  $list): ?>
          <tr>
<!--             <td><?= $list->id; ?></td>  -->
             <td><?= $list->u_username; ?></td>
             <td><?= $list->u_firstname; ?></td>
             <td><?= $list->u_lastname; ?></td>
             <td><?= $list->u_email; ?></td>
             <td><?= $list->u_role; ?></td>
             <td><?= $list->u_company; ?></td>
             <td><?= $list->u_create_datetime; ?></td>
             <td><?= $list->u_last_login; ?></td>
             <td><?= $list->u_active; ?></td>
             <td><?= $list->u_status; ?></td>

<td><a href="<?= '/users/edituser/'. $list->id ;?>" class="btn btn-success">Edit</a></td>


          </tr>
         <?php endforeach; ?>
         <?php endif; ?>


<form action="<?= '/users/storeuser' ;?>" name="create_user" id="create_user" method="post" accept-charset="utf-8">
          <tr>
            <td></td>
            <td><input type="text" name="first_name" class="form-control" id="first_name" placeholder="Please enter first name"></td>
            <td><input type="text" name="last_name" class="form-control" id="last_name" placeholder="Please enter last name"></td>
            <td><input type="text" name="email" class="form-control" id="email" placeholder="Please enter email"></td>
            <td><select id="role" name="role" class="form-control">
                  <option value="">Select</option>
                  <option value="Dispatcher">Dispatcher</option>
                  <option value="Accountant">Accountant</option>
                  <option value="Admin">Admin</option>
                  <option value="Owner">Owner</option>
                  <option value="Viewer">Viewer</option>
            </select></td>
            <td><input type="text" name="company" class="form-control" id="company" placeholder="Please enter company"></td>
            <td></td>
            <td></td>
            <td></td>
            <td><select id="status" name="status" class="form-control">
                  <option value="">Select</option>
                  <option value="Active">Active</option>
                  <option value="Suspended">Suspended</option>
            </select></td>
            <td><button type="submit" id="send_form" class="btn btn-success">Submit</button></td>
          </tr>
</form>

         
       </tbody>
     </table>

  </div>
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
</script>

<?= $this->endSection()?>
