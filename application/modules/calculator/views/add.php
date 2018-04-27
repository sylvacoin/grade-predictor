
<?= form_open('', 'class="form-horizontal form-label-left"') ?>
<div class="form-group">
    <label class="control-label col-sm-3 col-xs-12">Department: </label>
    <div class="col-sm-9 col-xs-12">
	<input type="text" class="form-control" placeholder="Department name" value="<?= isset($department) ? $department : set_value('department'); ?>" name="department">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-xs-12">
	<button type="submit" class="btn btn-primary pull-right-md">Add Department <i class="fa fa-check-circle"></i></button>
    </div>
</div>

<?= form_close() ?>
	    