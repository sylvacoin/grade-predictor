<!--row -->
<!-- ============================================================== -->
<!-- Horizontal tab -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="white-box">
	    <h3 class="box-title"><?= isset($page_title) ? $page_title : '' ?></h3>
	    <ul class="list-inline text-right">
		<li>
		    <h5><i class="fa fa-circle m-r-5 text-success"></i></h5> </li>
		<li>
		    <h5><i class="fa fa-circle m-r-5 text-warning"></i></h5> </li>
		<li>
		    <h5><i class="fa fa-circle m-r-5 text-danger"></i></h5> </li>
	    </ul>
	    <div id="ct-visits" style="min-height: 405px;">
		<?php
		if ($this->session->flashdata('error') != NULL) {
		    echo DIV_ERR . $this->session->flashdata('error') . DIV_CLOSE;
		}

		if ($this->session->flashdata('success') != NULL) {
		    echo DIV_SUCCESS . $this->session->flashdata('success') . DIV_CLOSE;
		}
		?>
		<?= validation_errors(DIV_ERR, DIV_CLOSE) ?>
		<div class="" role="tabpanel" data-example-id="togglable-tabs">
		    <ul id="myTab" class="nav nav-tabs customtab" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-plus-circle"></i> Add Department</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Manage Departments</a>
                        </li>
		    </ul>
		    <div id="myTabContent" class="tab-content">
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
    </div>
</div>
<!-- /.row -->