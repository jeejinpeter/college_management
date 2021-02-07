
 <div class="row">
   <div class="col-md-12">
        <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4>All Students List</h4>
            </div>
            </div>
                       
                    </div>
                </div>
            </div>
            <hr> 
<div class="container">


	
		 <div class="box-body">
         <table class="table table-bordered table-striped list">

                <thead>
                <tr>
                  <th>Serial no</th>
				  <th>Admission Number</th>
				  <th>Student Name</th>
                  <th>Course</th>				 
                  <th>Batch</th>				 
                  <th>Reason</th>				 
				  <th>Gender</th>   
				 
                </tr>
                </thead>
				  <tbody>
                  <?php 
          $i=1;		 
         foreach ($admission_list as $row)  
         {   
           
              $g=$row->gender;		 
              $d=$row->reason;		 
			  ?>
                <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->stud_admno;?></td>
				  <td><?php echo $row->stud_name;?></td>
				  <td><?php echo $row->c_name;?></td>			  
				  <td><?php echo $row->batch_year;?></td>			  
				  <?php  if($d==NULL){echo "<td> Admitted </td>";} else{echo "<td style='background:red;color:#fff;'> $d</td>"; }?>			  
				  <td><?php if($g==0) {echo "Male";}
				  else {echo "Female";}?></td>				  
                  
   
	
	
               
              </tr>
			  </tbody>
		   
	 <div class="modal fade" id="delete-<?=$row->student_id;?>" role="dialog" >
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Admin/Delete_Admission' ?>" >
    <input type="hidden" id="student_id"  name= "student_id"  value="<?php echo $row->student_id;?>">
	<textarea name="reason" value=""></textarea>
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>   
      </div>
        <div class="modal-footer ">
         <button name="save" type="submit" class="btn btn-success" ><span class="glyphicon 
		glyphicon-ok-sign"></span>Yes</button>
	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
      </div> 
	  </form>
        </div>
    <!-- /.modal-content --> 
  </div>
  
      <!-- /.modal-dialog --> 
	  
  </div>
		   
	<?php } ?>  
           
</table>	 
</div>
        <!-- /.box-body -->
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