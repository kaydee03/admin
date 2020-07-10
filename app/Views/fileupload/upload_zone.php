<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>


<form method="post" action="/fileupload/upload" enctype="multipart/form-data">

  <div class="form-group">
    <?php if($companies != ''): ?>
      <label for="companiesBrand" accesskey="p">Company:</label>
      <select name="companiesBrand" id="companiesFiles" class="form-control">
      <?php foreach($companies as $company): ?>
          <option value="<?= $company->ci_id ?>"><?= $company->ci_legal_name ?></option>
      <?php endforeach; ?>
      </select>
    <?php endif; ?>
  </div>


  <div class="form-group">
    <label for="fileCategory">Type</label>
    <select name="fileCategory" id="fileCategory" class="form-control">
      <option value="Insurance Policy">Insurance Policy</option>
      <option value="License">License</option>
      <option value="Permits">Permits</option>
      <option value="Company Policies">Company Policies</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Upload file</label>
    <input type="file" name="theFile[]" class="form-control-file" multiple />
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<div class="card mt-2">   
  <div class="card-body">
    <table id="file-table" class="table table-bordered" cellpadding="0" cellspacing="0">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Type</th>
        <th>Company</th>
        <th>Category</th>
      </tr>
      <tbody class="file-table-body">
      <?php $count = 1; ?>
      <?php if($files != '' ): ?>
        <?php foreach($files as $file): ?>
          <tr class="item-row" data-id="<?= $file->f_id ?>" data-iterate="item">
            <td class="column-number-row"><?= $count++ ?></td>
            <td><?= $file->f_name ?></td>
            <td><span class="column-type"><?= $file->f_type ?></span></td>
            <td><span class="column-company"><?= $file->ci_legal_name ?></span></td>
            <td><span class="column-category"><?= $file->f_category ?></span></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>


<?= $this->endSection() ?>