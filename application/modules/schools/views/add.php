
<?= form_open('', 'class="form-horizontal form-label-left"') ?>
<div class="form-group">
    <label class="control-label col-sm-3 col-xs-12">Institution Type: </label>
    <div class="col-sm-9 col-xs-12">
	<?php
	$iType = [
	    '--choose--', 
	    'college'=>'College (Monotechnic)', 
	    'polytechnic' => 'Polytechnic',
	    'university' => 'University'
	    ];
	
	echo form_dropdown('type', $iType, isset($type) ? $type : set_value('type'), 'class="form-control"');
	?>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-3 col-xs-12">School name: </label>
    <div class="col-sm-9 col-xs-12">
	<input type="text" class="form-control" placeholder="School name" value="<?= isset($school) ? $school : set_value('school'); ?>" name="school">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-xs-12">
	<button type="submit" class="btn btn-primary pull-right-md">Add School <i class="fa fa-check-circle"></i></button>
    </div>
</div>

<?= form_close() ?>
	    
	