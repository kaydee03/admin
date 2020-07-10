<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="card">   
    <div class="card-body">
        <form method="post" action="/fileupload/upload/<?= $category ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <?php if($companies != ''): ?>
                    <label for="companiesBrand" accesskey="p">Company:</label>
                    <select name="companiesBrand" id="companiesFiles" class="form-control" required>
                        <option value=""></option>
                        <?php foreach($companies as $company): ?>
                            <option value="<?= $company->ci_id ?>"><?= $company->ci_legal_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php endif; ?>
                </div>
            </div>
    

            <!-- <div class="form-group">
                <label for="fileCategory">Type</label>
                <select name="fileCategory" id="fileCategory" class="form-control">
                <option value="Insurance Policy">Insurance Policy</option>
                <option value="License">License</option>
                <option value="Permits">Permits</option>
                <option value="Company Policies">Company Policies</option>
                </select>
            </div> -->
            <div class="col-12 col-md-6">
                <!-- <div class="form-group">
                    <label for="exampleFormControlFile1">Upload file</label>
                    <input type="file" name="theFile[]" class="form-control-file" multiple required/>
                </div> -->
                <div class="form-group">
                    <label>Files</label>
                    <div class="custom-file">
                        <input type="file" name="theFile[]" class="custom-file-input" id="" multiple required>
                        <label class="custom-file-label" for="theFile[]">Choose file</label>
                    </div>
                </div>                
            </div>

        </div>
        <input type="hidden" value="<?= $title ?>" name="fileCategory">

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<div class="card mt-2">   
  <div class="card-body">
    <table id="file-table" class="table table-bordered" cellpadding="0" cellspacing="0">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Type</th>
        <th>Company</th>
        <th style="width:80px;text-align:center;">Action</th>
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
            <?php 
            $site = 'https://'.$_SERVER['HTTP_HOST'];
            $url_file = $site.'/uploads/company_files/'.$file->f_company_id.'/'.$category.'/'.$file->f_name; ?>
            <td class="column-download" style="text-align:center;"><a href="<?= $url_file ?>" download class="btn btn-primary btn-sm mr-2"><i class="fas fa-download"></i></button><a href="/fileupload/delete/<?= $category ?>/<?= $file->f_id ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button></td>
            <!-- <td class="column-download" style="text-align:center;"><a href="/fileupload/download/<?= $category ?>/<?= $file->f_id ?>" download class="btn btn-primary btn-sm"><i class="fas fa-download"></i></button></td> -->
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>