<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?= '/equipment/storeequipment' ;?>" name="create_equipment" id="create_equipment" method="post" accept-charset="utf-8">
 
        <div class="form-group">
            <label for="unit_num">Unit Num.</label>
            <input type="text" name="unit_num" class="form-control" id="unit_num" placeholder="Please enter unit num.">
             
          </div>

          <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type" class="form-control">
                  <option value="">Select</option>
                  <option value="Tractor">Tractor</option>
                  <option value="Trailer">Trailer</option>
            </select>
             
          </div>

          <div class="form-group">
            <label for="trailer_type">Trailer Type</label>
            <select id="trailer_type" name="trailer_type" class="form-control">
                  <option value="">Select</option>
                  <option value="V">V</option>
                  <option value="R">R</option>
                  <option value="F">F</option>
            </select>
             
          </div> 
 
          <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" id="year" placeholder="Please enter year">
             
          </div>

          <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" class="form-control" id="make" placeholder="Please enter make">
             
          </div>

          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" id="model" placeholder="Please enter model">
             
          </div>

          <div class="form-group">
            <label for="vin">VIN</label>
            <input type="text" name="vin" class="form-control" id="vin" placeholder="Please enter vin">
             
          </div>

          <div class="form-group">
            <label for="plate">Plate</label>
            <input type="text" name="plate" class="form-control" id="plate" placeholder="Please enter plate">
             
          </div> 
 
          <div class="form-group">
            <label for="irp">IRP</label>
            <input type="text" name="irp" class="form-control" id="irp" placeholder="Please enter irp">
             
          </div>
 
          <div class="form-group">
            <label for="unladen_wt">Unladen Wt.</label>
            <input type="text" name="unladen_wt" class="form-control" id="unladen_wt" placeholder="Please enter unladen wt.">
             
          </div>

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#create_equipment").length > 0) {
      $("#create_equipment").validate({
      
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
