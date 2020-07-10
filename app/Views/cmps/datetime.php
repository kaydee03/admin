<?php
$rand = rand(1, 10000);
$id = 'datetime-' . $rand;
?>
<div class="form-group" style="width:250px;">
    <div class="input-group date" id="<?= $id ?>" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" <?= $name ?> data-target="#<?= $id ?>" />
        <div class="input-group-append" data-target="#<?= $id ?>" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#<?= $id ?>').datetimepicker({
            icons: {
                time: 'fas fa-clock',
            },
            debug: false,
            stepping: 15,
            sideBySide: false,
            useCurrent: true,
        });
    });
</script>