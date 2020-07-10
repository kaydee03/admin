<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
  <br>
  <?= \Config\Services::validation()->listErrors(); ?>
  <span class="d-none alert alert-success mb-3" id="res_message"></span>
  <div class="row">
    <div class="col-md-9">
      <form action="<?= '/roles/edit/' . $item->r_id; ?>" id="edit" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" class="form-control" id="id" value="<?= $item->r_id ?>">
        <div class="form-group">
          <label for="r_name">Name</label>
          <input type="text" name="r_name" class="form-control" id="r_name" placeholder="Please enter first name" value="<?= $item->r_name ?>">
        </div>
        <div class="form-group">
          <button type="submit" id="send_form" class="btn btn-success">Update</button>
          <a href="/roles/delete/<?= $item->r_id ?>" class="btn btn-danger float-right" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>

        </div>
      </form>
    </div>
  </div>

</div>
<?= $this->endSection() ?>