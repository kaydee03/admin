<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?= '/dispatchers/storedispatchboard' ;?>" name="create_dispatchboard" id="create_dispatchboard" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Select</option>
                <option value="Negotiations">Negotiations</option>
                <option value="Rejected">Rejected</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Live">Live</option>
            </select>

          </div> 
 
          <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option value="">Select</option>
                <option value="V">V</option>
                <option value="R">R</option>
                <option value="POV">POV</option>
                <option value="POR">POR</option>
                <option value="LDOTV">LDOTV</option>
                <option value="LDOTR">LDOTR</option>
            </select>
             
          </div>
 
          <div class="form-group">
            <label for="load_size">Load Size</label>
            <select id="load_size" name="load_size">
                <option value="">Select</option>
                <option value="FTL">FTL</option>
                <option value="LTL">LTL</option>
            </select>
             
          </div>

          <div class="form-group">
            <label for="date">Date</label>
            <input type="datetime-local" name="date" class="form-control" id="date" placeholder="Please enter date">
             
          </div>

          <div class="form-group">
            <label for="pickup_time">Pickup Time</label>
            <input type="time" name="pickup_time" class="form-control" id="pickup_time" placeholder="Please enter pickup time">
             
          </div>

          <div class="form-group">
            <label for="pick_up">Pick Up</label>
            <input type="text" name="pick_up" class="form-control" id="pick_up" placeholder="Please enter pick up">
             
          </div> 
 
          <div class="form-group">
            <label for="drop_off_date">Drop Off Date</label>
            <input type="datetime-local" name="drop_off_date" class="form-control" id="drop_off_date" placeholder="Please enter drop off date">
             
          </div>
 
          <div class="form-group">
            <label for="drop_off_time">Drop Off Time</label>
            <input type="time" name="drop_off_time" class="form-control" id="drop_off_time" placeholder="Please enter drop off time">
             
          </div>

          <div class="form-group">
            <label for="drop_off">Drop Off</label>
            <input type="text" name="drop_off" class="form-control" id="drop_off" placeholder="Please enter drop off">
             
          </div>

          <div class="form-group">
            <label for="deadhead">Deadhead</label>
            <input type="text" name="deadhead" class="form-control" id="deadhead" placeholder="Please enter deadhead">
             
          </div> 
 
          <div class="form-group">
            <label for="loaded_miles">Loaded Miles</label>
            <input type="text" name="loaded_miles" class="form-control" id="loaded_miles" placeholder="Please enter loaded miles">
             
          </div>

          <div class="form-group">
            <label for="loaded_pay">Loaded Pay</label>
            <input type="text" name="loaded_pay" class="form-control" id="loaded_pay" placeholder="Please enter loaded pay">
             
          </div>

          <div class="form-group">
            <label for="driver">Driver</label>
            <input type="text" name="driver" class="form-control" id="driver" placeholder="Please enter driver">
             
          </div>
 
          <div class="form-group">
            <input type="hidden" name="dispatched_by" class="form-control" id="dispatched_by" placeholder="Please enter dispatched by" value="<?=session()->get('firstname').' '.session()->get('lastname') ?>">

          </div>
 
          <div class="form-group">
            <label for="broker_shipper">Broker Shipper</label>
            <input type="text" name="broker_shipper" class="form-control" id="broker_shipper" placeholder="Please enter broker shipper">
             
          </div>

          <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" name="notes" class="form-control" id="notes" placeholder="Please enter notes">
             
          </div>
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#create_dispatchboard").length > 0) {
      $("#create_dispatchboard").validate({
      
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
