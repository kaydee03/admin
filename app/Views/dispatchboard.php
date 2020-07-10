<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>


  <div class="container mt-5">
    <a href="#" onclick="toggleAddForm(event)" class="btn btn-success mb-2">Add Dispatch</a>
      <?php
    
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }

      $tableHead = '<thead class="">
                    <tr class="">
                    <th class="" style="200px">Status</th>
                    <th>Type</th>
                    <th>Load Size</th>
                    <th>Date</th>
                    <th>Pickup time</th>
                    <th>Pick up</th>
                    <th>Drop Off Date</th>
                    <th>Dropo Off Time</th>
                    <th>Drop Off</th>
                    <th>Deadhead</th>
                    <th>Loaded Miles</th>
                    <th>Total Miles</th>
                    <th>Loaded Pay</th>
                    <th>CPM w/o DH</th>
                    <th>CPM with DH</th>
                    <th>Min Bid w/o DH</th>
                    <th>Minimum Bid</th>
                    <th>Fuel Cost</th>
                    <th>Driver</th>
                    <th>Driver Pay</th>
                    <th>Load Expenses</th>
                    <th>Operating Cost</th>
                    <th>Profits</th>
                    <th>Dispatched By</th>
                    <th>Broker Shipper</th>
                    <th>Notes</th>
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
            <td class="">
            <div class="form-group">
            <select style="width:150px;" id="status" name="status" class="form-control">
                  <option value="">Select</option>
                  <?php
                    $arr = [
                      "Negotiations",
                      "Rejected",
                      "Cancelled",
                      "Live"
                    ];

                  ?>
                  <?php  foreach ($arr as $status ) : ?>
                   <option value="<?= $status ?>" <?=  set_select('status', $status); ?>><?= $status ?></option>
                  <?php endforeach; ?>
            </select>
            </div>
            </td>
            <td>
            <div class="form-group">

            <select id="type" name="type" class="form-control">
                  <option value="">Select</option>
                  <option value="V">V</option>
                  <option value="R">R</option>
                  <option value="POV">POV</option>
                  <option value="POR">POR</option>
                  <option value="LDOTV">LDOTV</option>
                  <option value="LDOTR">LDOTR</option>
            </select>
            </div>

            </td>
            <td>
              <div class="form-group">
                <select id="load_size" name="load_size"  class="form-control">
                      <option value="">Select</option>
                      <option value="FTL">FTL</option>
                      <option value="LTL">LTL</option>
                </select>
              </div>

            </td>

            <td>
             <?= view_cell('\App\Libraries\Form::datetime', ['name'=> 'date']) ?>
            </td>
            <td><input type="time" name="pickup_time" class="form-control" id="pickup_time" placeholder="Please enter pickup time"></td>
            <td><input type="text" name="pick_up" class="form-control" id="pick_up" placeholder="Please enter pick up"></td>
            <td>
            <?= view_cell('\App\Libraries\Form::datetime', ['name'=> 'drop_off_date']) ?>
            </td>
            <td><input type="text" name="drop_off_time" class="form-control" id="drop_off_time" placeholder="Please enter drop off time"></td>
            <td><input type="text" name="drop_off" class="form-control" id="drop_off" placeholder="Please enter drop off"></td>
            <td><input type="text" name="deadhead" class="form-control" id="deadhead" placeholder="Please enter deadhead"></td>
            <td><input type="text" name="loaded_miles" class="form-control" id="loaded_miles" placeholder="Please enter loaded miles"></td>
            <td></td>
            <td><input type="text" name="loaded_pay" class="form-control" id="loaded_pay" placeholder="Please enter loaded pay"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="driver" class="form-control" id="driver" placeholder="Please enter driver"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="hidden" name="dispatched_by" class="form-control" id="dispatched_by" placeholder="Please enter dispatched by" value="<?=session()->get('firstname').' '.session()->get('lastname') ?>"></td>
            <td><input type="text" name="broker_shipper" class="form-control" id="broker_shipper" placeholder="Please enter broker shipper"></td>
            <td><input type="text" name="notes" class="form-control" id="notes" placeholder="Please enter notes"></td>
            <td><button type="submit" id="send_form" class="btn btn-success">Submit</button></td>
          </tr>
          </tbody>
      </table>
  </div>
  <div class="col-12">
     <table class="table table-responsive table-bordered table-striped text-nowrap mydatatable fontsize12" style="width: 100%">
       <?= $tableHead ?>
       <tbody>
          <?php if($dispatchboard): ?>
          <?php foreach($dispatchboard as $list): ?>
          <tr>
             <td><?= $list['db_status']; ?></td>
             <td><?= $list['db_type']; ?></td>
             <td><?= $list['db_load_size']; ?></td>
             <td><?= $list['db_date']; ?></td>
             <td><?= $list['db_pickup_time']; ?></td>
             <td><?= $list['db_pick_up']; ?></td>
             <td><?= $list['db_drop_off_date']; ?></td>
             <td><?= $list['db_drop_off_time']; ?></td>
             <td><?= $list['db_drop_off']; ?></td>
             <td><?= $list['db_deadhead']; ?></td>
             <td><?= $list['db_loaded_miles']; ?></td>
             <td><?= $list['db_total_miles']; ?></td>
             <td><?= $list['db_loaded_pay']; ?></td>
             <td><?= $list['db_cpm_wo_dh']; ?></td>
             <td><?= $list['db_cpm_with_dh']; ?></td>
             <td><?= $list['db_min_bid_wo_dh']; ?></td>
             <td><?= $list['db_minimum_bid']; ?></td>
             <td><?= $list['db_fuel_cost']; ?></td>
             <td><?= $list['db_driver']; ?></td>
             <td><?= $list['db_driver_pay']; ?></td>
             <td><?= $list['db_load_expenses']; ?></td>
             <td><?= $list['db_operating_cost']; ?></td>
             <td><?= $list['db_profits']; ?></td>
             <td><?= $list['db_dispatched_by']; ?></td>
             <td><?= $list['db_broker_shipper']; ?></td>
             <td><?= $list['db_notes']; ?></td>



<?php if($list['db_status'] == 'Negotiations'): ?>

<td>
<a href="<?= '/dispatchers/editdispatchboard/'.$list['id'] ;?>" class="btn btn-success">Edit</a>
</td>

<?php elseif ($list['db_status'] == 'Rejected'): ?>

<td>
<a href="<?= '/dispatchers/editdispatchboard/'.$list['id'] ;?>" class="btn btn-success">Edit</a>
<a href="<?= '/dispatchers/deletedispatchboard/'.$list['id'] ;?>" class="btn btn-danger">Delete</a>
</td>

<?php elseif ($list['db_drop_off_date'] < date("Y-m-d")): ?>

<td></td>

<?php else: ?>

<td><a href="<?= '/dispatchers/editdispatchboard/'.$list['id'] ;?>" class="btn btn-success">Edit</a></td>

<?php endif; ?>



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
