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
      <table class="table table-bordered text-nowrap">
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