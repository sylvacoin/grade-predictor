<div class="col-sm-6 col-sm-offset-3">
    <div class="card">
        <div class="card-body">
	<center>
	    <span class="fa-stack fa-lg fa-4x">
		    <i class="fa fa-square-o fa-stack-2x" style="color: #ccc;"></i>
		    <i class="fa fa-question fa-stack-1x"></i>
	    </span>
	    <br/>
	    <span class="text-lg text-bold text-primary">RECOVER PASSWORD</span>
	    <br/><br/>
	</center>
	    
        <?= form_open('','class="form-horizontal"') ?>
        <div class="alert alert-info text-info col-sm-12">Please enter your Matriculation number below</div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <?= form_input('username', set_value('username', '', true), 'class="form-control" placeholder="Mat. number"') ?>
            </div>
        </div>
        <div class="form-group">
        <?= form_submit('submit', 'Recover Password', 'class="btn style-primary "') ?>
        </div>

        <div class="col-sm-6"><?= anchor('auth/login','back to login') ?></div>
        </div>
    </div>
</div>