 <div class="col-md-8 col-md-offset-1">
          <div class="panel panel-warning">
            <div class="box-header">
        <div class="info-box-content ">
            <span class="info-box-text"><h3>Select the details</h3></span>
            </div>
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
       <div class="row">
	   <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
		 <?php $attributes = array("name" =>"subject_add");
           echo form_open("Superadmin/get_all_studentfees", $attributes);?>
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
                 <span class="text-danger"><?php echo form_error('sem_id'); ?> </span>
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
			  <span class="text-danger"><?php echo form_error('batch_id'); ?> </span>
			   </div>
             <div>
				 <button type="submit" class="btn btn-info">Enter</button>
				  <button type="submit"  onclick="cancelFunction()"  class="btn btn-warning">Cancel</button>
			</div>  
			</div>
	  <?php  echo form_close(); ?>    
	   </div>
	   </div>
	   </div>
     </div>
     </div>
     </div>