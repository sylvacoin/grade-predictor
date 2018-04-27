<div class="row">
<div class="col-sm-4 col-sm-offset-4">
<center>
<span class="fa-stack fa-lg fa-4x">
        <i class="fa fa-circle fa-stack-2x" style="color: #ccc;"></i>
        <i class="fa fa-user fa-stack-1x"></i>
</span>
<h4>Login as administrator</h4>
</center>

<!-- <div class="alert alert-success">This is an alert</div>
<div class="alert alert-danger">This is an alert</div> -->
    <?php
    if ($this->session->flashdata('error') != NULL) {
        echo '<div class="alert alert-error alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('error').'</div>';
    }

    if ($this->session->flashdata('success') != NULL) {
        echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('success').'</div>';
    }
    ?>
    <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
        <form method="post" class="form-horizontal" action="<?= site_url('auth/login_admin/true?redirect=dashboard') ?>">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Username or email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" name="pswd" placeholder="Password">
            </div>
        </div>
       
        <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm col-sm-12"><i class="fa fa-inbox"></i> Login</button>
        </div>
        <div class="form-group">
            <div class="col-sm-10"><a href="http://localhost/ci_pms/auth/recovery.php">i have forgotten my password?</a></div>
        </div>
        </form>
</div>	
</div>