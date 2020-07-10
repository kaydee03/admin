<?=  $this->extend('layouts/main') ?>
<?= $this->section('content')?>

<br><br>
<div class="row">
    <div class="col-12">
    <div class="form-group">
         <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker"/>
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
</div>
</div>
</div>
    
<h3><i class="fas fa-calendar"></i> <i class="fas fa-users"></i></h3>
<br><br><br><br>


<br><br><br><br>

    <script type="text/javascript">
    $(function(){
        $('#datetimepicker').datetimepicker({
        icons:{
            time: 'fas fa-clock',
        },
        stepping: 15
        });
    });
    </script>




<?= $this->endSection()?>

