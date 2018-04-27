<!-- Title -->
    <h1>Contact us</h1>
    <h4>Your first online vehicle licensing website</h4>
    <!-- Sub title -->
    <p>Architecto numquam perspiciatis commodi laboriosam quod debitis placeat maxime quaerat soluta quia porro dicta sunt nemo voluptates!</p>

    
</div> <!-- /.col-md-7 -->

    <div class="col-md-5">
        
     <?= form_open_multipart('auth/submit') ?>
    <div class="form-group">
        <?= form_input('name', ( isset($name)? $name :set_value('name')), 'class="form-control" placeholder="Enter Full Name"') ?>
    </div> <!-- /.form-group -->
    
    <div class="form-group">
        <?= form_input('email', ( isset($email)? $email :set_value('email')), 'class="form-control" placeholder="Enter email Address"') ?>
    </div>   
    
    <div class="form-group">
        <?= form_textarea('address',( isset($address)? $address :set_value('address')), 'class="form-control" placeholder="Message Here"') ?>
    </div>
    
    <div class="form-group">
        <?= form_submit('submit', 'Proceed >>>', 'class="pull-right btn btn-danger btn-lg"') ?>
    </div>
    <?= form_close(); ?>