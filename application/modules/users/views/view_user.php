<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>
            <i class="fa fa-fw fa-stack">
                <i class="fa fa-fw fa-stack-2x fa-circle"></i>
                <i class="fa fa-stack-1x fa-fw fa-eye" style="color:#337ab7;"></i>
            </i>
            View Patients and Records
        </h4>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="dataTables-example_wrapper">
                <div class="row">
                <div class="col-sm-12">
                    <table aria-describedby="dataTables-example_info" role="grid" class="table table-striped table-bordered table-hover dataTable no-footer" id="example">
                <thead>
                    <tr role="row">
                        <th aria-label="Browser: activate to sort column ascending" style="width: 149px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Card No.</th>
                        <th aria-label="Platform(s): activate to sort column ascending" style="width: 137px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Patients First Name</th>
                        <th aria-label="Engine version: activate to sort column ascending" style="width: 110px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Patients Last Name</th>
                        <th aria-label="CSS grade: activate to sort column ascending" style="width: 78px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting">Sex</th>
                        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 130px;" colspan="1" rowspan="1" aria-controls="dataTables-example" tabindex="0" class="sorting_asc">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>                               
                <?php 
                if (count($patients) > 0 ) :
                    $i = 1;
                foreach($patients as $p): 
                ?>
                    <tr role="row" class="gradeA odd">
                    <td><?= $p->cardno ?></td>
                    <td><?= $p->firstname ?></td>
                    <td class="center"><?= $p->lastname ?></td>
                    <td class="center"><?= $p->sex ?></td> 
                    <td>
                    <?= anchor('users/edit/'.$p->user_id, '<i class="fa fa-edit"></i> Edit', 'class="pull-left"') ?> &nbsp;
                    <?= anchor('users/profile/'.$p->user_id, '<i class="fa fa-eye"></i> View', 'class="text-center"') ?> &nbsp;
                    <a href="#deleteModal<?= $p->user_id ?>" id="uid<?= $p->user_id ?>" data-toggle="modal" class="text-danger pull-right"><i class="fa fa-trash"></i> Delete</a></td>
                    </tr>
                    
                    <!-- user delete modal -->
                    <div id="deleteModal<?= $p->user_id ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3><i class="fa fa-trash-o"></i> Delete Dialog</h3> 
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger">
                                        Are you Sure you Want to <strong>Delete</strong>&nbsp; this Patient  
                                        <b><?= $p->firstname ?> <?= $p->lastname ?></b>
                                        and all (his/her) medical records?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="<?= site_url('users/delete/'.$p->user_id) ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end delete modal -->
                <?php 
                endforeach;
                else:
                    echo  '<tr>'
                        . '<td colspan="4">No data available</td>'
                        . '</tr>';
                endif;
                
                ?>
                    
                </tbody>
            </table>
                </div>
            </div>
            
    <!-- /.panel-body -->
    
</div>
<!-- /.panel -->
</div>