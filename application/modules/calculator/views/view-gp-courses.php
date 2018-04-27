<div class="row">
    <div class="card card-underline">
	<div class="card-head">
	    <header>Quiz result</header>
	</div>
	<div class="card-body">
	    <button id="btnAdd"><i class="fa fa-plus-circle"></i></button>
	    <div class="table-responsive">
	    <table class="table table-bordered table-banded  table-striped">
		<thead>
		    <tr>
			<th></th>
			<th>S/N</th>
			<th>Course code </th>
			<th>Credit unit</th>
			<th>Grade</th>
		    </tr>
		</thead>
		<tbody id="body">
		    <tr>
			<td><button class="btnRemove"><i class="fa fa-minus-circle text-info"></i></button></td>
			<td>1</td>
			<td><input type="text" class="form-control control-invisible"/></td>
			<td><input type="text" class="form-control control-invisible"/></td>
			<td>
			    <select name="" class="form-control">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>
				<option value="F">F</option>
			    </select>
			</td>
		    </tr>
		</tbody>
	    </table>
	    </div>
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