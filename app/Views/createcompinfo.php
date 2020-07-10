<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?= '/compinfo/storecompinfo' ;?>" name="create_compinfo" id="create_compinfo" method="post" accept-charset="utf-8">
 
        <div class="form-group">
            <label for="usdot_num">USDOT Num.</label>
            <input type="text" name="usdot_num" class="form-control" id="usdot_num" placeholder="Please enter usdot num.">
             
          </div>

          <div class="form-group">
            <label for="legal_name">Legal Name</label>
            <input type="text" name="legal_name" class="form-control" id="legal_name" placeholder="Please enter legal name">
             
          </div>

          <div class="form-group">
            <label for="mc_num">MC Num.</label>
            <input type="text" name="mc_num" class="form-control" id="mc_num" placeholder="Please enter mc num">
             
          </div>
 
          <div class="form-group">
            <label for="primary_contact">Primary Contact</label>
            <input type="text" name="primary_contact" class="form-control" id="primary_contact" placeholder="Please enter primary contact">
             
          </div>

          <div class="form-group">
            <label for="primary_title">Primary Title</label>
            <input type="text" name="primary_title" class="form-control" id="primary_title" placeholder="Please enter primary title">
             
          </div>

          <div class="form-group">
            <label for="primary_phone">Primary Phone</label>
            <input type="text" name="primary_phone" class="form-control" id="primary_phone" placeholder="Please enter primary phone">
             
          </div>

          <div class="form-group">
            <label for="secondary_contact">Secondary Contact</label>
            <input type="text" name="secondary_contact" class="form-control" id="secondary_contact" placeholder="Please enter secondary contact">
             
          </div>

          <div class="form-group">
            <label for="secondary_title">Secondary Title</label>
            <input type="text" name="secondary_title" class="form-control" id="secondary_title" placeholder="Please enter secondary title">
             
          </div>

          <div class="form-group">
            <label for="secondary_phone">Secondary Phone</label>
            <input type="text" name="secondary_phone" class="form-control" id="secondary_phone" placeholder="Please enter secondary phone">
             
          </div>

          <div class="form-group">
            <label for="duns_num">DUNS Num.</label>
            <input type="text" name="duns_num" class="form-control" id="duns_num" placeholder="Please enter duns num.">
             
          </div>

          <div class="form-group">
            <label for="irs_tax_id_num">IRS Tax ID Num.</label>
            <input type="text" name="irs_tax_id_num" class="form-control" id="irs_tax_id_num" placeholder="Please enter irs tax id num.">
             
          </div>
 
          <div class="form-group">
            <label for="sti_num">STI Num.</label>
            <input type="text" name="sti_num" class="form-control" id="sti_num" placeholder="Please enter sti num.">
             
          </div>

          <div class="form-group">
            <label for="withholding_acct_num">Withholding Acct. Num.</label>
            <input type="text" name="withholding_acct_num" class="form-control" id="withholding_acct_num" placeholder="Please enter withholding acct num">
             
          </div>

          <div class="form-group">
            <label for="dol_sui">DOL SUI</label>
            <input type="text" name="dol_sui" class="form-control" id="dol_sui" placeholder="Please enter dol sui">
             
          </div> 
 
          <div class="form-group">
            <label for="uiia_scac_code">UIIA SCAC Code</label>
            <input type="text" name="uiia_scac_code" class="form-control" id="uiia_scac_code" placeholder="Please enter uiia scac code">
             
          </div>
 
          <div class="form-group">
            <label for="insurance_agent_code">Insurance Agent Code</label>
            <input type="text" name="insurance_agent_code" class="form-control" id="insurance_agent_code" placeholder="Please enter insurance agent code">
             
          </div>
 
          <div class="form-group">
            <label for="bnsf_pin">BNSF PIN</label>
            <input type="text" name="bnsf_pin" class="form-control" id="bnsf_pin" placeholder="Please enter bnsf_pin">
             
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
            <label for="drivers">Drivers</label>
            <input type="text" name="drivers" class="form-control" id="drivers" placeholder="Please enter drivers">
             
          </div>

          <div class="form-group">
            <label for="power_units">Power Units</label>
            <input type="text" name="power_units" class="form-control" id="power_units" placeholder="Please enter power units">
             
          </div>

          <div class="form-group">
            <label for="trailers">Trailers</label>
            <input type="text" name="trailers" class="form-control" id="trailers" placeholder="Please enter trailers">
             
          </div>

          <div class="form-group">
            <br>
            <label for="carrier_operation">Carrier Operation</label><br>
            <input type="radio" id="interstate" name="carrier_operation" value="interstate">
            <label for="male">Interstate</label><br>
            <input type="radio" id="intrastate_only_hm" name="carrier_operation" value="intrastate_only_hm">
            <label for="female">Intrastate Only (HM)</label><br>
            <input type="radio" id="intrastate_only_non_hm" name="carrier_operation" value="intrastate_only_non_hm">
            <label for="other">Intrastate Only (Non-HM)</label>
             
          </div>

          <div class="form-group">
            <br>
            <label for="cargo_carried">Cargo Carried</label><br>
            <input type="checkbox" id="cargo1" name="cargo1" value="General Freight">
            <label for="cargo1">General Freight</label><br>
            <input type="checkbox" id="cargo2" name="cargo2" value="Household Goods">
            <label for="cargo2">Household Goods</label><br>
            <input type="checkbox" id="cargo3" name="cargo3" value="Metal: sheets, coils, rolls">
            <label for="cargo3">Metal: sheets, coils, rolls</label><br>
            <input type="checkbox" id="cargo4" name="cargo4" value="Motor Vehicles">
            <label for="cargo4">Motor Vehicles</label><br>
            <input type="checkbox" id="cargo5" name="cargo5" value="Drive/Tow away">
            <label for="cargo5">Drive/Tow away</label><br>
            <input type="checkbox" id="cargo6" name="cargo6" value="Logs, Poles, Beams, Lumber">
            <label for="cargo6">Logs, Poles, Beams, Lumber</label><br>
            <input type="checkbox" id="cargo7" name="cargo7" value="Building Materials">
            <label for="cargo7">Building Materials</label><br>
            <input type="checkbox" id="cargo8" name="cargo8" value="Mobile Homes">
            <label for="cargo8">Mobile Homes</label><br>
            <input type="checkbox" id="cargo9" name="cargo9" value="Machinery, Large Objects">
            <label for="cargo9">Machinery, Large Objects</label><br>
            <input type="checkbox" id="cargo10" name="cargo10" value="Fresh Produce">
            <label for="cargo10">Fresh Produce</label><br>
            <input type="checkbox" id="cargo11" name="cargo11" value="Liquids/Gases">
            <label for="cargo11">Liquids/Gases</label><br>
            <input type="checkbox" id="cargo12" name="cargo12" value="Intermodal Cont.">
            <label for="cargo12">Intermodal Cont.</label><br>
            <input type="checkbox" id="cargo13" name="cargo13" value="Passengers">
            <label for="cargo13">Passengers</label><br>
            <input type="checkbox" id="cargo14" name="cargo14" value="Oilfield Equipment">
            <label for="cargo14">Oilfield Equipment</label><br>
            <input type="checkbox" id="cargo15" name="cargo15" value="Livestock">
            <label for="cargo15">Livestock</label><br>
            <input type="checkbox" id="cargo16" name="cargo16" value="Grain, Feed, Hay">
            <label for="cargo16">Grain, Feed, Hay</label><br>
            <input type="checkbox" id="cargo17" name="cargo17" value="Coal/Coke">
            <label for="cargo17">Coal/Coke</label><br>
            <input type="checkbox" id="cargo18" name="cargo18" value="Meat">
            <label for="cargo18">Meat</label><br>
            <input type="checkbox" id="cargo19" name="cargo19" value="Garbage/Refuse">
            <label for="cargo19">Garbage/Refuse</label><br>
            <input type="checkbox" id="cargo20" name="cargo20" value="US Mail">
            <label for="cargo20">US Mail</label><br>
            <input type="checkbox" id="cargo21" name="cargo21" value="Chemicals">
            <label for="cargo21">Chemicals</label><br>
            <input type="checkbox" id="cargo22" name="cargo22" value="Commodities Dry Bulk">
            <label for="cargo22">Commodities Dry Bulk</label><br>
            <input type="checkbox" id="cargo23" name="cargo23" value="Refrigerated Food">
            <label for="cargo23">Refrigerated Food</label><br>
            <input type="checkbox" id="cargo24" name="cargo24" value="Beverages">
            <label for="cargo24">Beverages</label><br>
            <input type="checkbox" id="cargo25" name="cargo25" value="Paper Products">
            <label for="cargo25">Paper Products</label><br>
            <input type="checkbox" id="cargo26" name="cargo26" value="Utilities">
            <label for="cargo26">Utilities</label><br>
            <input type="checkbox" id="cargo27" name="cargo27" value="Agricultural/Farm Supplies">
            <label for="cargo27">Agricultural/Farm Supplies</label><br>
            <input type="checkbox" id="cargo28" name="cargo28" value="Construction">
            <label for="cargo28">Construction</label><br>
            <input type="checkbox" id="cargo29" name="cargo29" value="Water Well">
            <label for="cargo29">Water Well</label><br>
          </div>

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#create_compinfo").length > 0) {
      $("#create_compinfo").validate({
      
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
