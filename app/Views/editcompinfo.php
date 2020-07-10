<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">

        <form action="<?= '/compinfo/updatecompinfo' ;?>" name="editcompinfo" id="editcompinfo" method="post" accept-charset="utf-8">
 
           <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $compinfo->id ?>">

          <div class="form-group">
            <label for="usdot_num">USDOT Num.</label>
            <input type="text" name="usdot_num" class="form-control" id="usdot_num" placeholder="Please enter usdot num." value="<?php echo $compinfo->ci_usdot_number ?>">
             
          </div>
 
          <div class="form-group">
            <label for="legal_name">Legal Name</label>
            <input type="text" name="legal_name" class="form-control" id="legal_name" placeholder="Please enter legal name" value="<?php echo $compinfo->ci_legal_name ?>">
             
          </div>

          <div class="form-group">
            <label for="mc_num">MC Num.</label>
            <input type="text" name="mc_num" class="form-control" id="mc_num" placeholder="Please enter mc num." value="<?php echo $compinfo->ci_mc_number ?>">
             
          </div>

          <div class="form-group">
            <label for="primary_contact">Primary Contact</label>
            <input type="text" name="primary_contact" class="form-control" id="primary_contact" placeholder="Please enter primary contact" value="<?php echo $compinfo->ci_primary_contact ?>">
             
          </div>

          <div class="form-group">
            <label for="primary_title">Primary Title</label>
            <input type="text" name="primary_title" class="form-control" id="primary_title" placeholder="Please enter primary title" value="<?php echo $compinfo->ci_primary_title ?>">
             
          </div>

          <div class="form-group">
            <label for="primary_phone">Primary Phone</label>
            <input type="text" name="primary_phone" class="form-control" id="primary_phone" placeholder="Please enter primary phone" value="<?php echo $compinfo->ci_primary_phone ?>">
             
          </div>

          <div class="form-group">
            <label for="secondary_contact">Secondary Contact</label>
            <input type="text" name="secondary_contact" class="form-control" id="secondary_contact" placeholder="Please enter secondary contact" value="<?php echo $compinfo->ci_secondary_contact ?>">
             
          </div>
 
          <div class="form-group">
            <label for="secondary_title">Secondary Title</label>
            <input type="text" name="secondary_title" class="form-control" id="secondary_title" placeholder="Please enter secondary title" value="<?php echo $compinfo->ci_secondary_title ?>">
             
          </div>

          <div class="form-group">
            <label for="secondary_phone">Secondary Phone</label>
            <input type="text" name="secondary_phone" class="form-control" id="secondary_phone" placeholder="Please enter secondary phone" value="<?php echo $compinfo->ci_secondary_phone ?>">
             
          </div>

          <div class="form-group">
            <label for="duns_num">DUNS Num.</label>
            <input type="text" name="duns_num" class="form-control" id="duns_num" placeholder="Please enter duns num." value="<?php echo $compinfo->ci_duns_number ?>">
             
          </div>

          <div class="form-group">
            <label for="irs_tax_id_num">IRS Tax ID Num.</label>
            <input type="text" name="irs_tax_id_num" class="form-control" id="irs_tax_id_num" placeholder="Please enter irs tax id num." value="<?php echo $compinfo->ci_irs_tax_id_number ?>">
             
          </div>

          <div class="form-group">
            <label for="sti_num">STI Num.</label>
            <input type="text" name="sti_num" class="form-control" id="sti_num" placeholder="Please enter sti num." value="<?php echo $compinfo->ci_sti_number ?>">
             
          </div>

          <div class="form-group">
            <label for="withholding_acct_num">Withholding Acct. Num.</label>
            <input type="text" name="withholding_acct_num" class="form-control" id="withholding_acct_num" placeholder="Please enter withholding acct num" value="<?php echo $compinfo->ci_withholding_acct_number ?>">
             
          </div>

          <div class="form-group">
            <label for="dol_sui">DOL SUI</label>
            <input type="text" name="dol_sui" class="form-control" id="dol_sui" placeholder="Please enter dol sui" value="<?php echo $compinfo->ci_dol_sui ?>">
             
          </div>

          <div class="form-group">
            <label for="uiia_scac_code">UIIA SCAC Code</label>
            <input type="text" name="uiia_scac_code" class="form-control" id="uiia_scac_code" placeholder="Please enter uiia scac code" value="<?php echo $compinfo->ci_uiia_scac_code ?>">
             
          </div>

          <div class="form-group">
            <label for="insurance_agent_code">Insurance Agent Code</label>
            <input type="text" name="insurance_agent_code" class="form-control" id="insurance_agent_code" placeholder="Please enter insurance agent code" value="<?php echo $compinfo->ci_insurance_agent_code ?>">
             
          </div>

          <div class="form-group">
            <label for="bnsf_pin">BSNF PIN</label>
            <input type="text" name="bnsf_pin" class="form-control" id="bnsf_pin" placeholder="Please enter bnsf pin" value="<?php echo $compinfo->ci_bnsf_pin ?>">
             
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email" value="<?php echo $compinfo->ci_email ?>">
             
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Please enter address" value="<?php echo $compinfo->ci_address ?>">
             
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Please enter city" value="<?php echo $compinfo->ci_city ?>">
             
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <?= view_cell('\App\Libraries\Form::abbrevstates', ['name'=> 'state']) ?>

          </div>

          <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control" id="zip" placeholder="Please enter zip" value="<?php echo $compinfo->ci_zip ?>">
             
          </div>

          <div class="form-group">
            <label for="drivers">Drivers</label>
            <input type="text" name="drivers" class="form-control" id="drivers" placeholder="Please enter drivers" value="<?php echo $compinfo->ci_drivers ?>">

          </div>

          <div class="form-group">
            <label for="power_units">Power Units</label>
            <input type="text" name="power_units" class="form-control" id="power_units" placeholder="Please enter power units" value="<?php echo $compinfo->ci_power_units ?>">

          </div>

          <div class="form-group">
            <label for="trailers">Trailers</label>
            <input type="text" name="trailers" class="form-control" id="trailers" placeholder="Please enter trailers" value="<?php echo $compinfo->ci_trailers ?>">
             
          </div>

          <div class="form-group">
            <label for="carrier_operation">Carrier Operation</label>
            <input type="text" name="carrier_operation" class="form-control" id="carrier_operation" placeholder="Please enter carrier operation" value="<?php echo $compinfo->ci_carrier_operation ?>">
             
          </div>

          <div class="form-group">
            <label for="cargo_carried">Cargo Carried</label>
            <input type="text" name="cargo_carried" class="form-control" id="cargo_carried" placeholder="Please enter cargo carried" value="<?php echo $compinfo->ci_cargo_carried ?>">
             
          </div>

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>

        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#editcompinfo").length > 0) {
      $("#editcompinfo").validate({
      
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
