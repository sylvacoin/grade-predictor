<div class="row">
    <div class="card card-underline">
	<div class="card-head">
	    <header>Setup courses</header>
	</div>
	<div class="card-body">

	    <div class="row">
		<div class="col-sm-6 col-sm-offset-3">
		    <div class="row">
			
		
			    <form class="form">
				<div class="form-group">
				    <?php
				    $subjects = range(1, 24);
				    echo form_dropdown('noSubjects', $subjects, NULL, 'class="form-control" id="noSubjects"');
				    ?>
				    <label>No Subjects</label>
				</div>
				
			    </form>
		
		    </div>

		</div>
	    </div>
	    <form method="post" action="" class="form">
		<table class="table table-bordered table-condensed table-responsive table-striped">
		    <thead class="bg-warning">
			<tr>
			    <th>
				<button id="btnAdd" onclick="return false;">
				    <i class="fa fa-plus-circle text-info"></i>
				</button>	
			    </th>
			    <th>S/N</th>
			    <th>Course code </th>
			    <th>Credit unit</th>
			    <th>Grade</th>
			</tr>
		    </thead>
		    <tbody id="body">
			<?php if  ( isset( $courses) && $courses->num_rows() > 0 ):
			    $i = 1;
			foreach ($courses->result() as $c): ?>
			<tr>
			    <td><button class="btnRemove"><i class="fa fa-minus-circle text-info"></i></button></td>
			    <td><?= $i ?></td>
			    <td><input type="text" class="form-control control-invisible" name="course[<?= $i ?>][code]" value="<?= $c->code ?>"/></td>
			    <td><input type="text" class="form-control control-invisible" name="course[<?= $i ?>][unit]" value="<?= $c->unit ?>"/></td>
			    <td>
				<select name="course[<?= $i ?>][grade]" class="form-control">
				    <option value="A" <?= $c->grade == 'A' ? 'selected': '' ?>>A</option>
				    <option value="B" <?= $c->grade == 'B' ? 'selected': '' ?>>B</option>
				    <option value="C" <?= $c->grade == 'C' ? 'selected': '' ?>>C</option>
				    <option value="D" <?= $c->grade == 'D' ? 'selected': '' ?>>D</option>
				    <option value="E" <?= $c->grade == 'E' ? 'selected': '' ?>>E</option>
				    <option value="F" <?= $c->grade == 'F' ? 'selected': '' ?>>F</option>
				</select>
			    </td>
			</tr>
			<?php
			$i++;
			endforeach;
			endif;
			?>
		    </tbody>
		</table>
		<div class="form-group">
		    <input type="submit" class="btn btn-primary col-sm-4 col-sm-offset-4" value="Calculate and save" />
		</div>
	    </form>
	</div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var $container = $('#body');
        var content = '<tr>' +
                '<td>\n\
		    <button class="btnRemove"><i class="fa fa-minus-circle text-info"></i></button></td>' +
                '<td> AAA </td>' +
                '<td><input type="text" class="form-control control-invisible" name="course[AAA][code]" required/></td>' +
                '<td><input type="text" class="form-control control-invisible" name="course[AAA][unit]" required/></td>' +
                '<td>' +
                '<select name="course[AAA][grade]" class="form-control" required>' +
                '<option value="A">A</option>' +
                '<option value="B">B</option>' +
                '<option value="C">C</option>' +
                '<option value="D">D</option>' +
                '<option value="E">E</option>' +
                '<option value="F">F</option>' +
                '</select>' +
                '</td>' +
                '</tr>';
        $(document).on('change', '#noSubjects', function () {

            //var $sn = $container.children('tr').length + 1;

            $container.html('');

            for (var i = 1; i <= parseInt($(this).val()) + 1; i++) {
                ;
                $container.append(content.replace(/(AAA)/g, i));
            }

        });

        $(document).on('click', '#btnAdd', function (e) {
            var $sn = $container.children('tr').length + 1;
            $container.append(content.replace(/(AAA)/g, $sn));
        });

        $(document).on('click', '.btnRemove', function (e) {

            var mySiblings = $(this).parent('td').parent('tr').siblings('tr');

            i = 1;
            $.each(mySiblings, function () {
                $(this).children('td:nth-child(2)').html(i);
                i++;
            });

            $(this).parent('td').parent('tr').remove();

            return false;
        });
    });
</script>