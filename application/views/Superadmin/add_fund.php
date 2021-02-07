
<body>     
<div class="container">
<div class="row">
    <div class="col-md-12" style="padding-bottom:25px;">
       <div class="box-body">
			<?php $attributes = array("name" => "news");
                echo form_open_multipart("Superadmin/Add_fund_pro", $attributes);?>
                <!-- text input -->
				<div class="col-md-12">
             	<div class="form-group col-md-6">
                  <label>Academic year</label>
                  <input type="text" class="form-control" placeholder="Academic Year(2016-2017)" name="ac-year"  value="" required>
				 <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Date of Transfer</label>
                  <input type="date" class="form-control" placeholder="" name="date_tr" value="" required>
				  <span class="text-danger"> <?php echo form_error('age'); ?></span>
                </div></div>
				<div class="col-lg-12">
			   <div class="form-group col-md-6">
                  <label>Amount</label>
                  <input type="text" class="form-control" placeholder="" name="amount" value="" required>
				  <span class="text-danger"> <?php echo form_error('age'); ?></span>
                </div>
				</div>
				
				<div class="box-footer">
                <button type="submit" class="col-xs-1 btn btn-warning">Submit</button>
                </div>
								 
 
               <?php echo form_close(); ?>
                
            </div>
            <!-- /.box-body -->
		
    </div>
</div>
</div>
</body>
</html>
