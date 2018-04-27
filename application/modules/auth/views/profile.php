<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h2><i class="fa fa-user"></i> Staff Profile</h2>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <?= validation_errors('<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>', '</div>') ?>
        <?php
        if ($this->session->flashdata('error') != NULL) {
            echo '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('error').'</div>';
        }

        if ($this->session->flashdata('success') != NULL) {
            echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('success').'</div>';
        }
        ?>
        <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>    
                            <tr>
                                <th>First Name</th>
                                <td><?= $staff->fname ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?= $staff->lname ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?= $staff->address ?></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td><?= $staff->phone ?></td>
                            </tr>
                            <tr>
                                <th>Staff Role</th>
                                <td><?= Modules::run('roles/get_where', $staff->role_id)->role;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    </div><!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>

<!-- user delete modal -->
<div id="addRecord" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3><i class="fa fa-plus-square"></i> Add Medical Record</h3> 
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url('records/add'); ?>" class="form-horizontal">
                <input type="hidden" name="userid" value="<?= $staff->user_id ?>" />
                <div class="form-group">
                    <label class="control-label col-sm-4">Doctors Name</label>
                    <div class="col-sm-8">
                        <?= form_input('docname',(isset($docname)?$docname:  set_value('docname')), 'class="form-control" placeholder="Doctors full name" required id="dname"') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Diagnoses</label>
                    <div class="col-sm-8">
                        <?= form_input('diagnoses',(isset($diagnoses)?$diagnoses:  set_value('diagnoses')), 'class="form-control" placeholder="Doctors diagnoses"  required id="diag"') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4">Medication</label>
                    <div class="col-sm-8">
                        <?= form_input('medication',(isset($medication)?$medication:  set_value('medication')), 'class="form-control" placeholder="medication" required id="med"') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Doctors Report</label>
                    <div class="col-sm-8">
                        <?= form_textarea('report', (isset($report)?$report:  set_value('report')), 'class="form-control" placeholder="Doctors Report" required id="report"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Patient admission status</label>
                    <div class="col-sm-8">
                    <div class="btn-group" data-toggle="buttons" id="opt">
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option1" value="true"> Admitted
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2" value="false"> Not Admitted
                        </label>
                    </div>
                    </div>
                </div> 
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save Record</button>   
            </form> 
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i>&nbsp;Cancel</button>
                
            </div>
            
        </div>
    </div>
</div>
<!-- end delete modal -->