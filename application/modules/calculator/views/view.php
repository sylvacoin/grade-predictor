<div class="table-responsive">
<table class="table table-bordered table-condensed table-responsive table-striped">
    <thead class="bg-warning">
	<tr>
	    <th>S/N</th>
	    <th>Course code </th>
	    <th>Credit unit</th>
	    <th>Grade</th>
	</tr>
    </thead>
    <tbody>
	<?php if ( isset($courses) && count( $courses->result() ) > 0 ): $i = 1;
	    foreach ($courses->result() as  $course): ?>
	    <tr>
	    <td><?= $i ?></td>
	    <td><?= $course->code ?></td>
	    <td><?= $course->unit ?></td>
	    <td><?= $course->grade ?></td>
	    </tr>
    	<?php
	    $i++;
	    endforeach;
	endif;
	?>
	
    </tbody>
</table>
</div>