<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Expense</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Expense</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addexpense", "class" => "form-horizontal");
                echo form_open_multipart("Admin/expense_add", $attributes);?>
              <div class="box-body">
                   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Department</label>
                  <div class="col-sm-6">
				  <select class="form-control" name="dept" required>
				  <option>--Choose a Department--</option>
                  <?php 
     foreach($dept as $row)
     { 
       echo '<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>';
     }?>
				  </select>
                <span class="text-danger"><?php echo form_error('dept'); ?></span>
                  </div>
				    </div>
					<div class="form-group has-feedback">
                      <label for="name" class="col-sm-2 control-label">Expense Date</label>
                      <div class="col-sm-6">
                      <input type="date" name="edate" class="form-control" placeholder="Expense Date" value=""required ="required" >
					  <span class="text-danger"><?php echo form_error('edate'); ?></span>
                      </div>	
                   </div>
			     
				  	<div class="form-group has-feedback">
                    <label for="name" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-6">
                    <input type="text" name="amount" class="form-control" placeholder="Expense Amount" value=""required ="required" >
					 <span class="text-danger"><?php echo form_error('amount'); ?></span>
                    </div>
					
                  </div>
           
                </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
              <button type="submit" class="btn btn-warning">Submit</button>
              </div>
			  
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
       