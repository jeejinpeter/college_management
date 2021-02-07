<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Student</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
          <h3 class="box-title"></h3>

         <h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
        
        <div class="box-body">
    
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Student Admitted</h3>
              </div>
        
            <!-- /.box-header -->
         <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">

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
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->