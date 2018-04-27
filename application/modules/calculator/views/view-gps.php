<div class="row">
    <div class="card card-underline">
	<div class="card-head">
	    <header><?= isset($page_title)?$page_title:'' ?></header>
	</div>
	<div class="card-body">
	    <div class="table-responsive">
	    <table class="table table-bordered table-banded table-responsive table-striped">
		<thead>
		    <tr>
			<th>S/N</th>
			<th>Level </th>
			<th>Semester</th>
			<th>No of<br> Courses</th>
			<th>Total <br>credit units</th>
			<th>Total <br>Credit points</th>
			<th>Grade <br>Point Average</th>
		    </tr>
		</thead>
		<tbody>
		    <?php if ( isset($scores) && count($scores) > 0 ): $i=1;
			foreach( $scores as $level ): ?>
			<tr>
			<td><?= $i ?></td>
			<td><?= $level->level_id ?> level</td>
			<td><?= $level->semester ?> Semester</td>
			<td><?= $level->total_courses ?></td>
			<td><?= $level->total_credits ?></td>
			<td><?= $level->total_gp ?></td>
			<td><?= $level->points ?></td>
			</tr>
		    <?php
			$i++;
			endforeach;
		    else: ?>
			<tr>
			    <td colspan="7"> No G.P has been calculated yet</td>
			</tr>
		    <?php
		    endif; ?>
		    
		</tbody>
	    </table>
	    </div>
	    <button id="btnAdd" class="btn btn-info" onclick="showAjaxModal('calculator/calculate_cgpa')"><i class="fa fa-info-circle"></i> Calculate C.G.P.A for all semesters</button>
	</div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
	var $container = $('#body');
	
	$(document).on('click', '#btnAdd', function(){
	    console.log($container);
	    var $sn = $container.children('tr').length + 1;
	    var content = '<tr>' +
				'<td>\n\
				    <button class="btnRemove"><i class="fa fa-minus-circle text-info"></i></button></td>'+
				'<td>'+ $sn +'</td>'+
				'<td><input type="text" class="form-control control-invisible"/></td>'+
				'<td><input type="text" class="form-control control-invisible"/></td>'+
				'<td>'+
				    '<select name="" class="form-control">'+
					'<option value="A">A</option>'+
					'<option value="B">B</option>'+
					'<option value="C">C</option>'+
					'<option value="D">D</option>'+
					'<option value="E">E</option>'+
					'<option value="F">F</option>'+
				    '</select>'+
				'</td>'+
			    '</tr>';
		$container.append(content);
	});
	
	$(document).on('click', '.btnRemove', function(){
	    $(this).parent('td').parent('tr').remove();
	    var rows = $container.children('tr');
	    
	});
    });
</script>