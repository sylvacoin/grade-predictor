
<?php
$grad_yr = $this->session->grad_yr;

if (is_numeric($this->session->user_id)):
    for ( $i = 100; $i <= $grad_yr; $i = $i + 100 ):
	?>
	<li class="gui-folder">
	    <a>
		<div class="gui-icon"><i class="md md-assignment"></i></div>
		<span class="title"><?= $i ?> Level G.P</span>
	    </a>

	    <ul>
	    <li><a href="<?= site_url('calculator/'.$i.'/1') ?>"><span class="title">First Semester</span></a></li>
	    <li><a href="<?= site_url('calculator/'.$i.'/2') ?>"><span class="title">Second Semester</span></a></li>
	    </ul>
	</li>
	<?php
    endfor;

endif;
?>
