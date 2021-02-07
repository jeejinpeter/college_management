<style>
.panel-warning {
    border-color: #ffc107;
	border-width:3px;
}

</style>
<div class="content-wrapper">
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
       
       <div class="row">
	   <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-warning">
		 <?php $attributes = array("name" =>"subject_add");
           echo form_open("Superadmin/get_class_students", $attributes);?>
           <div class="panel-body">
		    <div class="info-box-content col-md-12">
            <span class="info-box-text"><h3>Fees Details</h3></span>
            </div>
	          <div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Course</label>
               <select name="course_id" class="form-control selectboxit" required>
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
           <select class="form-control" name="sem_id" style="width: 100%;" required>
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
<div class="col-md-12 col-md-offset-1">
        <div class="col-md-10 ">
          <div class="panel panel-warning">
            <div class="box-header">
			  <div class="info-box-content col-md-12">
            <span class="info-box-text"><h3 class="text-center">Student's List</h3></span>
            </div>
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
              <table class ="table table-bordered table-hover st_list"  border="3">

                <thead>
                <tr>
                  <th>Admission No:</th>
                  <th>Student's Name</th>                  
                  <th>View Fees</th>
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
        echo form_open("Superadmin/view_fees_processing", $attributes);?>
                  <td> <?php echo $row['stud_admno'];?></td>
                  <td><?php echo $row['stud_name'];?></td>
				   <input type="hidden" class="form-control"  name="course_id" value="<?php echo $course;?>" >
				    <input type="hidden" class="form-control"  name="sem_id" value="<?php echo $sem;?>" >
					<input type="hidden" class="form-control"  name="batch_id" value="<?php echo $batch1;?>" >
					 <input type="hidden" class="form-control"  name="stud_cour_id" value="<?php echo $row['course_id'];?>" > 
				   <input type="hidden" class="form-control"  name="stud_adm" value="<?php echo $row['stud_admno'];?>" >
				    <input type="hidden" class="form-control"  name="stud_name" value="<?php echo $row['stud_name'];?>" >
					 <input type="hidden" class="form-control"  name="stud_cour_id" value="<?php echo $row['course_id'];?>" > 
				 <input type="hidden" class="form-control"  name="stud_sem_id" value="<?php echo $row['sem_id'];?>" >
				 <input type="hidden" class="form-control"  name="stud_batch_id" value="<?php echo $row['batch_id'];?>" >
				 <input type="hidden" class="form-control"  name="stud_cour" value="<?php echo $row['c_name'];?>" > 
				 <input type="hidden" class="form-control"  name="stud_sem" value="<?php echo $row['sem_code'];?>" >
				 <input type="hidden" class="form-control"  name="stud_batch" value="<?php echo $row['batch_year'];?>" >
            <td><button type="submit" class="btn btn-warning">View</button></td>
				 
				
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
    <script>
$(document).ready(function() {
my_table = $(".st_list").dataTable({
"fnRowCallback": function (nRow, aData, iDisplayIndex) {
$("td:first", nRow).html(iDisplayIndex + 1);
return nRow;
},
});
});
  </script>