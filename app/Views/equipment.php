<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>


  <div class="container mt-5">
    <a href="#" onclick="toggleAddForm(event)" class="btn btn-success mb-2">Add Equipment</a>
      <?php
    
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }

      $tableHead = '<thead class="">
                    <tr class="">
                    <th>Unit Num.</th>
                    <th>Type</th>
                    <th>Trailer Type</th>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>VIN</th>
                    <th>Plate</th>
                    <th>IRP</th>
                    <th>Unladen Wt.</th>
                    <th>Action</th>
                  </tr>
              </thead>';
     ?>
  <div class="row mt-3">
  <div class="col-12" style="display:none;" id="addFormWrapper">
      <table class="table table-bordered table-responsive text-nowrap">
      <?= $tableHead ?>
      <tbody>
          <tr>
            <td><input type="text" name="unit_num" class="form-control" id="unit_num" placeholder="Please enter unit num"></td>
            <td>
            <div class="form-group">

            <select id="type" name="type" class="form-control">
            <option value="">Select</option>
                <option value="">Select</option>
                <option value="Tractor">Tractor</option>
                <option value="Trailer">Trailer</option>
            </select>
            </div>

            </td>
            <td>
            <div class="form-group">

            <select id="trailer_type" name="trailer_type" class="form-control">
            <option value="">Select</option>
                <option value="">Select</option>
                <option value="V">V</option>
                <option value="R">R</option>
                <option value="F">F</option>
            </select>
            </div>

            </td>
            <td><input type="text" name="year" class="form-control" id="year" placeholder="Please enter year"></td>
            <td><input type="text" name="make" class="form-control" id="make" placeholder="Please enter make"></td>
            <td><input type="text" name="model" class="form-control" id="model" placeholder="Please enter model"></td>
            <td><input type="text" name="vin" class="form-control" id="vin" placeholder="Please enter vin"></td>
            <td><input type="text" name="plate" class="form-control" id="plate" placeholder="Please enter plate"></td>
            <td><input type="text" name="irp" class="form-control" id="irp" placeholder="Please enter irp"></td>
            <td><input type="text" name="unladen_wt" class="form-control" id="unladen_wt" placeholder="Please enter unladen_wt"></td>
            <td><button type="submit" id="send_form" class="btn btn-success">Submit</button></td>
          </tr>
          </tbody>
      </table>
  </div>
  <div class="col-12">
     <table class="table table-responsive table-bordered table-striped text-nowrap mydatatable fontsize12" style="width: 100%">
       <?= $tableHead ?>
       <tbody>
          <?php if($equipment): ?>
          <?php foreach($equipment as $list): ?>
          <tr>
          <td><?= $list['eq_unit_num']; ?></td>
              <td><?= $list['eq_type']; ?></td>
              <td><?= $list['eq_trailer_type']; ?></td>
              <td><?= $list['eq_year']; ?></td>
              <td><?= $list['eq_make']; ?></td>
              <td><?= $list['eq_model']; ?></td>
              <td><?= $list['eq_vin']; ?></td>
              <td><?= $list['eq_plate']; ?></td>
              <td><?= $list['eq_irp']; ?></td>
              <td><?= $list['eq_unladen_wt']; ?></td>
            <td><a href="<?= '/equipment/editequipment/'.$list['eq_id'] ;?>" class="btn btn-success">Edit</a></td>
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
