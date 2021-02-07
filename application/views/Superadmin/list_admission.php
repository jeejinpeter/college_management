<div class="row">
                    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-warning">
        <div class="panel-heading">
            <h4>Student's Admitted</h4>
            </div>
            </div>
<div class="container">


 <?php $attributes = array("name" => "news");
                echo form_open_multipart("Superadmin/get_by_search", $attributes);?>
		
	  <div  class="col-lg-12">
	  <div class="form-group col-md-4">
                  <label>Admitted to course</label>
				   
              <select class="form-control" required  name="course" id="course" required>
				  <option value="">--select--</option>
				   <?php 
          $i=1;		 
         foreach ($course as $row)  
         {   ?>
				  <option value="<?php echo $row->course_id; ?>"><?php echo $row->c_name; ?></option>
				  
		 <?php }
     ?> </select>
       <span class="text-danger"> <?php echo form_error('class'); ?></span>       
		</div>
		
		<div class="form-group col-md-4">
                  <label>Semester</label>
                <select class="form-control" required name="sem" required>
                   <option value="">--Select--</option>
           <?php    
         foreach ($sem as $row)  
         {   ?>
          <option value="<?php echo $row['sem_id']; ?>"><?php echo $row['sem_code']; ?></option>
          
     <?php }
     ?> </select>
	
	 
        </div> 
         <div class="form-group col-md-12">		
		 <button type="submit" class="col-xs-1 btn btn-warning">Submit</button>
		</div>
		</div>
		 <?php echo form_close(); ?>

</div>
		 <div class="box-body">
     
<div class="alert alert-warning">
     <h3 class="text-center">List of Students</h3></div>
         <table id="example1" class="table table-bordered table-striped list">

                <thead>
                <tr>
                  <th>Sl. No:</th>
				          <th>Adm No:</th>
				          <th>Student Name</th>
                  <th>Course</th>				 
                  <th>Batch</th>				 
				          <th>Course Fees</th>
                  <th>Fees Pending</th> 
				        </tr>
                </thead>
				  <tbody>
<?php 
          $i=1;		 
         foreach($admission_list as $row)  
         {   	 
			  ?>
  <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->stud_admno;?></td>
				  <td><?php echo $row->stud_name;?></td>
				  <td><?php echo $row->c_name;?></td>			  
				  <td><?php echo $row->batch_year;?></td>			  
				  <td><?php if($row->cfees_amount) echo $row->cfees_amount; else echo "No Fees Added";  ?></td>	
          
          <td><?php if($row->cfees_dues) echo $row->cfees_dues; else echo "Fees details not available"; ?></td>			  
  </tr>
			  </tbody>
 <?php } ?>  
  </table>
		 </div>

</div>
</div>
</div>
<script>
$(document).ready(function() {
my_table = $(".list").dataTable({
"fnRowCallback": function (nRow, aData, iDisplayIndex) {
$("td:first", nRow).html(iDisplayIndex + 1);
return nRow;
},
});
});
  </script>