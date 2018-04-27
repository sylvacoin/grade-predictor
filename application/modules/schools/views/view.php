<div class="table-responsive">
    <table class="table" id="dataTable">
	<thead>
	    <tr>
		<th>#</th>
		<th>Type</th>
		<th>School Name</th>
		<th>&nbsp;</th>
	    </tr>
	</thead>
	<tbody>
	    <?php if ($schools->num_rows() > 0): foreach ( $schools->result() as $row ): ?>
		    <tr>
			<th scope="row"><?= @ ++$i ?></th>
			<td><?php echo $row->type; ?></td>
			<td><?php echo $row->schoolname; ?></td>
			<td>
			    
			    <div class="btn-group  btn-group-sm">
	                        <a href="<?= site_url('schools/delete/'.$row->school_id) ?>" class="btn btn-default" type="button"><i class="fa fa-trash"></i> Delete</a>
				<a href="<?= site_url('schools/edit/'.$row->school_id) ?>" class="btn btn-default" type="button"><i class="fa fa-pencil"></i> Edit</a>
			    </div>
			    
			</td>
		    </tr>
		<?php endforeach;
	    else:
		?>
    	    <tr>
    		<th colspan="5">no schools available at the moment</th>
    	    </tr>
<?php endif; ?>
	</tbody>
    </table>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->  
<!--<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        $(document).ready(function () {
            var handleDataTableButtons = function () {
                if ($("#dataTable").length > 0) {
                    $("#dataTable").DataTable();

                    $(".dataTables_wrapper select").select2({
                        minimumResultsForSearch: -1
                    });
                }
            };

            TableManageButtons = function () {
                "use strict";
                return {
                    init: function () {
                        handleDataTableButtons();
                    }
                };
            }();

            TableManageButtons.init();

        });
    });

</script>-->
