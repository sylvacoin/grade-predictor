<div class="col-sm-6 col-sm-offset-3">
    <center>
    <span class="fa-stack fa-lg fa-4x">
            <i class="fa fa-square-o fa-stack-2x" style="color: #ccc;"></i>
            <i class="fa fa-spinner fa-stack-1x"></i>
    </span>
    <h4>Login User</h4>
    </center>
        <?= validation_errors('<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>', '</div>') ?>
        <?php
        if ($this->session->flashdata('error') != NULL) {
            echo '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('error').'</div>';
        }

        if ($this->session->flashdata('success') != NULL) {
            echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('success').'</div>';
        }
        ?>
            <?= form_open_multipart('auth/submit/'.$this->session->user_id ) ?>

            <div class="form-group">
                <label class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9 input-group">
                <?= form_input('first', ( isset($first)? $first :set_value('first')), 'class="form-control" placeholder="Enter First Name"') ?>
                </div>
            </div> <!-- /.form-group -->

            <div class="form-group">
                <label class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9 input-group">
                <?= form_input('last', ( isset($last)? $last :set_value('last')), 'class="form-control" placeholder="Enter Last Name"') ?>
                </div>
                
            </div> <!-- /.form-group -->

            <div class="form-group">
                <label class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-female"></i>
                    </span>
                    <?= form_custom_gender_dropdown('sex',((isset($sex)) ? $sex: set_value('sex')), 'class="form-control"') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Email Address</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope-square"></i>
                    </span>
                    <?= form_input('email', ( isset($email)? $email :set_value('email')), 'class="form-control" placeholder="Enter email Address"') ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Phone Number</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                    </span>
                    <?= form_input('phone', ( isset($phone)? $phone :set_value('phone')), 'class="form-control" placeholder="Enter Phone Number"') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Upload</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-image"></i>
                    </span>
                    <?= form_upload('image', ( isset($image)? $image :set_value('image')), 'class="form-control" id="file" placeholder="Upload Photo"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9 input-group">
                <?= form_input('country', ( isset($country)? $country :set_value('country')), 'class="form-control" placeholder="Enter Country of Origin"') ?>
                </div>
                
            </div> <!-- /.form-group -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Residential Address</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                    </span>
                    <?= form_input('addr',( isset($addr)? $addr :set_value('addr')), 'class="form-control" placeholder="Enter Residential Address"') ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-key"></i>
                    </span>
                <input type="password" name="pswd" placeholder="Enter password"   class="form-control" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-key"></i>
                    </span>
                <input type="password" name="pswd1" placeholder="Confirm password"   class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <?= form_submit('submit', 'Register', 'class="col-sm-12 btn btn-inverse btn-md"') ?>
            </div>
</div>
<div class="pull-left col-sm-3">
    <img src="../assets/img/default.png" height="160px" width="128px" id="preview" class="img-responsive img-rounded" />
</div>