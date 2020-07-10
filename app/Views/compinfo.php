<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>


  <div class="container mt-5">
    <a href="<?php echo site_url('/compinfo/createcompinfo') ?>" class="btn btn-success mb-2">Add Company</a>
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
              <th>USDOT Number</th>
              <th>Legal Name</th>
              <th>MC Number</th>
              <th>Primary Contact</th>
              <th>Primary Title</th>
              <th>Primary Phone</th>
              <th>Secondary Contact</th>
              <th>Secondary Title</th>
              <th>Secondary Phone</th>
              <th>DUNS Number</th>
              <th>IRS Tax ID Number</th>
              <th>STI Number</th>
              <th>Withholding Acct. Number</th>
              <th>DOL SUI</th>
              <th>UIIA SCAC Code</th>
              <th>Insurance Agent Code</th>
              <th>BNSF PIN</th>
              <th>Email</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Zip</th>
              <th>Drivers</th>
              <th>Power Units</th>
              <th>Trailers</th>
              <th>Carrier Operation</th>
              <th>Cargo Carried</th>
              <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($compinfo): ?>
          <?php foreach($compinfo as $list): ?>
          <tr>
              <td><?= $list->ci_usdot_number; ?></td>
              <td><?= $list->ci_legal_name; ?></td>
              <td><?= $list->ci_mc_number; ?></td>
              <td><?= $list->ci_primary_contact; ?></td>
              <td><?= $list->ci_primary_title; ?></td>
              <td><?= $list->ci_primary_phone; ?></td>
              <td><?= $list->ci_secondary_contact; ?></td>
              <td><?= $list->ci_secondary_title; ?></td>
              <td><?= $list->ci_secondary_phone; ?></td>
              <td><?= $list->ci_duns_number; ?></td>
              <td><?= $list->ci_irs_tax_id_number; ?></td>
              <td><?= $list->ci_sti_number; ?></td>
              <td><?= $list->ci_withholding_acct_number; ?></td>
              <td><?= $list->ci_dol_sui; ?></td>
              <td><?= $list->ci_uiia_scac_code; ?></td>
              <td><?= $list->ci_insurance_agent_code; ?></td>
              <td><?= $list->ci_bnsf_pin; ?></td>
              <td><?= $list->ci_email; ?></td>
              <td><?= $list->ci_address; ?></td>
              <td><?= $list->ci_city; ?></td>
              <td><?= $list->ci_state; ?></td>
              <td><?= $list->ci_zip; ?></td>
              <td><?= $list->ci_drivers; ?></td>
              <td><?= $list->ci_power_units; ?></td>
              <td><?= $list->ci_trailers; ?></td>
              <td><?= $list->ci_carrier_operation; ?></td>
              <td><?= $list->ci_cargo_carried; ?></td>
              <td><a href="<?= '/compinfo/editcompinfo/'.$list->id ;?>" class="btn btn-success">Edit</a></td>
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
