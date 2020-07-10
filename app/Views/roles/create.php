<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
  <br>
  <?= \Config\Services::validation()->listErrors(); ?>

  <span class="d-none alert alert-success mb-3" id="res_message"></span>

  <div class="row">
    <div class="col-md-9">
      <form action="<?= '/roles/create' ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
          <label for="r_name">Name</label>
          <input type="text" name="r_name" class="form-control" id="r_name" placeholder="Please enter role name">
        </div>
        <div class="form-group">
          <button type="submit" id="send_form" class="btn btn-success">Create</button>
        </div>
      </form>
    </div>

  </div>

</div>
<script>
  if ($("#user_create").length > 0) {
    $("#user_create").validate({

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
          required: "Please enter Role",
        },
      },
    })
  }
</script>
</body>

</html>


<?= $this->endSection() ?>