<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<?= $this->include('equipment/add_equipment') ?>
<div class="dispatchboard">
    <?= $table ?>
</div>
<script>
    function toggleAddForm(e) {
        e.preventDefault();
        $('#addFormWrapper').toggle()
    }
</script>
<?= $this->endSection() ?>