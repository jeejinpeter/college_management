<div class="content-wrapper">
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

<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
  <section class="content">                
     <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Student List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "news", "class" => "form-horizontal");
                echo form_open_multipart("Admin/get_by_search", $attributes);?>
              <div class="box-body">
                   
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Admitted to course</label>
                  <div class="col-sm-6">
                   <select class="form-control" required  name="course" id="course" required>
				  <option value="">--select--</option>
				   <?php 
          $i=1;		 
         foreach ($course as $row)  
         {   ?>
				  <option value="<?php echo $row->course_id; ?>"><?php echo $row->c_name; ?></option>
				  
		 <?php }
     ?> </select>
                <span class="text-danger"><?php echo form_error('course'); ?></span>
                  </div>
				  </div>
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-6">
                    <select class="form-control" required name="sem" required>
                   <option value="">--Select--</option>
           <?php    
         foreach ($sem as $row)  
         {   ?>
          <option value="<?php echo $row['sem_id']; ?>"><?php echo $row['sem_code']; ?></option>
          
     <?php }
     ?> </select>
                <span class="text-danger"><?php echo form_error('sem'); ?></span>
                  </div>
				  </div>
                
           </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
                
                <button type="submit" class="btn btn-warning">Submit</button>
              </div>
              <!-- /.box-footer -->
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
				  <th>Actions</th>
                </tr>
                </thead>
				  <tbody>
                  <?php 
          $i=1;		 
         foreach ($admission_list as $row)  
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
                  
   
	<td> <div class="btn-group">
  <button type="button" class="btn btn-warning btn-flat">Actions</button>
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('Admin/edit_Admission/'.$row->student_id); ?>">Edit </a></li>
        <li><a href="<?php echo site_url('Admin/student_fee_view/'.$row->stud_admno); ?>">Add Fees</a></li>
          <li><a data-toggle="modal" data-target="#delete-<?=$row->student_id?>" href="#">Delete</a></li>
                 </ul>
                </div>
               </td>
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
  </div><!-- /.modal-dialog-->
    </div>  
		    
	<?php }  
         ?>  
       </table>
       </div>
       </div>
       </div>
       </section>
       </div>   
		 
