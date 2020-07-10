<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
  <a href="<?php echo site_url('/roles/create') ?>" class="btn btn-success mb-2">Create Role</a>
  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
  }
  ?>
  <div class="row mt-3 ">
    <table class="table table-bordered table-striped text-nowrap mydatatable" style="width: 100%">
      <thead>
        <tr>
          <th style="width:40px;">Id</th>
          <th>Role</th>
          <th style="width:100px;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($items) : ?>
          <?php foreach ($items as  $list) : ?>
            <tr>
              <td><?= $list->r_id; ?></td>
              <td><?= $list->r_name; ?></td>
              <td class="text-center"><a href="<?= '/roles/edit/' . $list->r_id; ?>" class="btn btn-success">Edit</a></td>
            <?php endforeach; ?>
          <?php endif; ?>
      </tbody>
    </table>

  </div>
</div>


<script>
  $('.mydatatable').DataTable({
    // searching: false,
    // ordering: false,
    //lengthMenu: [10, 75, 15],
    // createdRow: function(row, data, index) {
    //   if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
    //     $('td', row).eq(5).addClass('text-success');
    //   }
    // }

  });
</script>

<?= $this->endSection() ?>