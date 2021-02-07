  <div class="content-wrapper">
  <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Fees</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
      <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Fees Details</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
     <div class="row">
	  <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
       
       
		 <?php $attributes = array("name" =>"subject_add");
           echo form_open("Admin/get_class_students", $attributes);?>
           <div class="panel-body">
	          <div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Course</label>
                    <select name="course_id" class="form-control selectboxit">
					<option value="">----Select Course-------</option>
					  <?php  foreach($list as $row)
            { 
              echo '<option value="'.$row['course_id'].'">'.$row['c_name'].'</option>';
            }
			?> </select>
      <span class="text-danger"><?php echo form_error('course_id'); ?> </span>
			   </div>
			<div class="form-group">
                <label>Semester</label>
                <select class="form-control" name="sem_id" style="width: 100%;">
                <option value="">----Select Semester-------</option>
                  <?php  foreach($val as $row)
            { 
              echo '<option value="'.$row['sem_id'].'">'.$row['sem_name'].'</option>';
            }
			?> 
                </select>
                 <span class="text-danger"><?php echo form_error('sem'); ?> </span>
              </div>
			  <div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Batch</label>
               <select name="batch_id" class="form-control selectboxit" required>
					<option value="">----Select Batch-------</option>
					  <?php  foreach($batch as $row1)
            { 
         echo '<option value="'.$row1->batch_id.'">'.$row1->batch_year.'</option>';
            }
			?> </select>
			 
			   </div>
             <div>
				 <button type="submit" class="btn btn-info">Enter</button>
				  <button type="submit"  onclick="cancelFunction()"  class="btn btn-warning">Cancel</button>
			</div>  
			</div>
	  <?php  echo form_close(); ?>    
	    </div>
	   </div>
<?php if(isset($students)): ?>
<div class="col-md-12">
        <div class="col-md-10 col-md-offset-1">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Student's List- Fees Payment </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

                <thead>
                <tr>
                  <th>Admission No:</th>
                  <th>Student's Name</th>                  
                  <th>Date of Payment</th>
                  <th>Fees Amount</th>
                  <th>Fine (if any)</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;    
         foreach ($students as $row)  
         { 
          ?>
                <tr>
                <?php $attributes = array("name" => "add section");
        echo form_open("Admin/add_fees", $attributes);?>
                  <td> <?php echo $row['stud_admno'];?></td>
                  <td><?php echo $row['stud_name'];?></td>
                  <td><input type="text" read-only class="form-control"   name="fee_date" value="<?php echo date('Y-m-d'); ?>"></td>
				   <input type="hidden" class="form-control"  name="admno" value="<?php echo $row['stud_admno'];?>" >
				  <input type="hidden" class="form-control"  name="sem" value="<?php echo $row['sem_id'];?>" >
				
					<td><input type="number" class="form-control" style="width:100px;" name="fee_amount"  value=""></td>
                  <td><input type="number" class="form-control" style="width:100px;" name="fine_amount" value=""></td>
				<td><button type="submit" class="btn btn-info">Save</button><td>
               <?php  echo form_close(); ?>  
                </tr>
             
              <?php 
              }
              ?>  
            </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>

<?php endif; ?>
	   </section>
	   </div>