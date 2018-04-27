<div class="row">
    <div class="card card-underline">
	<div class="card-head">
	    <header><?= isset($page_title) ? $page_title : '' ?></header>
	    <ul id="myTab" class="nav nav-tabs customtab" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-plus-circle"></i> Add Department</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Manage Departments</a>
		</li>
	    </ul>
	</div>
	<div class="card-body tab-content">
	    <?php
	    if ($this->session->flashdata('error') != NULL) {
		echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
	    }

	    if ($this->session->flashdata('success') != NULL) {
		echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
	    }
	    ?>
	    <?= validation_errors(DIV_ERR, DIV_CLOSE) ?>

	    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
		<div class="col-sm-8">
		    <?= Modules::run('departments/add') ?>
		</div>


	    </div>
	    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
		<?= Modules::run('departments/view') ?>
	    </div>


	</div>
    </div>
</div>
</div>
<!-- /.row -->