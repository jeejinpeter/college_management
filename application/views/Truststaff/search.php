<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Admitted</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo site_url("bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css"/>
<script  src="<?php echo site_url();?>resource/js/jquery.min.js"></script>
<script  src="<?php echo site_url();?>resource/js/bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo site_url('resource/js/jquery.min.js'); ?>"></script>
 <link href="<?php echo site_url("bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf8" src="<?php echo site_url('resource/js/jquery.dataTables.min.js'); ?>"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo  site_url('resource/css/jquery.dataTables.min.css'); ?>">
</head>
 	<div class="row">
                    <div class="col-md-12">
                        <h3 class="page-header" style="border-bottom: 2px solid rgb(252, 186, 0)
						">Students Admitted</h3>
                        <h4>  </h4><br></div>
                    <div class="col-md-12">
                        <div class="row"><div class="col-md-10 col-md-offset-1">
						</div></div>
                       
                    </div>
                </div>
            </div>
        </div> 
<div class="container">


 <?php $attributes = array("name" => "news");
                echo form_open_multipart("Truststaff/get_by_search", $attributes);?>
		
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
		 <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>Serial no</th>
				  <th>Admission Number</th>
				  <th>Student Name</th>
                  <th>Course</th>				 
                  <th>Batch</th>				 
				  <th>Gender</th>   
				 
                </tr>
                </thead>
				  <tbody>
                  <?php 
          $i=1;
         if($search != NULL){		  
         foreach ($search as $row)  
         {   
           
              $g=$row->gender;		 
			  ?>
                <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->stud_admno;?></td>
				  <td><?php echo $row->stud_name;?></td>
				  <td><?php echo $row->c_name;?></td>			  
				  <td><?php echo $row->batch_year;?></td>			  
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
		   
		 <?php } }else{?>
			 <center><h3>No data Found</h3></center>
		<?php }
         ?>  
           
            </table>
		 
        </div>
        <!-- /.box-body -->

</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#course').on('change',function(){
        var StateID = $(this).val();
		console.log(StateID);
        if(StateID){
            $.ajax({
                type:'POST',
                url:'get_by_course',
                data:'id='+StateID,
                success:function(html){
                    $('tbody').html(html);
                }
            }); 
        }else{
            $('tbody').html('<option value="">Select State first</option>'); 
        }
    });   
});
</script>  