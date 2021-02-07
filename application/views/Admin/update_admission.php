<script language="Javascript">
 function FillBilling(f) 
 {
 if(f.billingtoo.checked == true) 
 {
 f.address2.value = f.address1.value; 
 
 } 
 else 
 { 
 f.address2.value = "";
 
 } 
 }
 </script>
<style type="text/css">
.thumbimage {
    float:left;
    width:100px;
    position:relative;
    padding:5px;
}
</style>

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
      <div class="box-body">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Student</h3>
			 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php $attributes = array("name" => "news");
                echo form_open_multipart("Admin/update_processing", $attributes);?>
            
              <h4><?php echo $this->session->flashdata('msg'); ?></h4><br>
                <!-- text input -->
				<?php 
          $i=1;		 
         foreach ($admission_update as $row)  
         {  		   ?>
		 <input type="hidden" value="<?php echo $row->student_id; ?>" name="s_id">
		 <input type="hidden" value="<?php echo $row->gender; ?>" name="gender">
				<div class="col-md-12">
				 <div class="form-group col-md-6">
                  <label>Admission Number</label>
                  <input type="text" class="form-control" placeholder="Admission Number" name="admno"  value="<?php echo $row->stud_admno; ?>" required>
				 <span class="text-danger"><?php echo form_error('admno'); ?></span>
                </div>
             	<div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Name" name="stdname"  value="<?php echo $row->stud_name;?>" required>
				 <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Roll number</label>
                  <input type="text" class="form-control" placeholder="Roll number" name="rollno"  value="<?php echo $row->stud_roll_no;?>" >
				 <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
				</div>
				<div class="col-md-12">
				<div class="form-group col-md-6">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control" placeholder="Date of birth" name="dob" value="<?php echo $row->date_of_birth;?>" required>
				  <span class="text-danger"> <?php echo form_error('age'); ?></span>
                </div></div>
			
				 <div class="form-group col-md-6">
                  <label>Date of Joining</label>
                  <input type="date" class="form-control" placeholder="Date of join" name="doj" value="<?php echo $row->stud_join_date;?>" required>
				   <span class="text-danger"> <?php echo form_error('year'); ?></span>
                </div>
				</div>
				
			    <div class="col-md-12">	
				<div class="form-group col-md-6">
                  <label>Cast</label>
                  <input type="text" class="form-control" placeholder="Cast" name="cast" value="<?php echo $row->stud_join_date;?>" required>
				   <span class="text-danger"> <?php echo form_error('date'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Religion</label>
                  <input type="text" class="form-control" placeholder="Religion" name="religion" value="<?php echo $row->stud_religion;?>" required>
				   <span class="text-danger"> <?php echo form_error('religion'); ?></span>
                </div>
			   </div>
				
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Student_Place</label>
                  <input type="text" class="form-control" placeholder="Student place" name="stud_place" value="<?php echo $row->stud_place;?>" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>
		<div class="form-group col-md-6">
                  <label>Student_District</label>
                  <input type="text" class="form-control" placeholder="" name="stud_district" value="<?php echo $row->stud_district;?>" required>
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>		
		</div>
		
				<div class ="col-md-12">
				<div class="form-group col-md-6">
                  <label>Student_state</label>
                  <input type="text" class="form-control" placeholder="Student State" name="stud_state" value="<?php echo $row->stud_state;?>" required>
				   <span class="text-danger"> <?php echo form_error('national'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Student_phone</label>
                  <input type="text" class="form-control" placeholder="phone number" name="stud_phone" value="<?php echo $row->stud_ph;?>" required>
				   <span class="text-danger"> <?php echo form_error('state'); ?></span>
                </div>
                </div>
				
				<div class ="col-md-12">
				<div class="form-group col-md-6">
                  <label>Student Guardian</label>
                  <input type="text" class="form-control" placeholder="Guardian" name="guardian" value="<?php echo $row->stud_guardian;?>" required>
				   <span class="text-danger"> <?php echo form_error('national'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Student Guardian Occupation</label>
                  <input type="text" class="form-control" placeholder="" name="guardian_occ" value="<?php echo $row->stud_guardian_occupation;?>" required>
				   <span class="text-danger"> <?php echo form_error('national'); ?></span>
                </div>
                </div>
				
		<div class="col-md-12">		
				
				
				  <div class="form-group col-md-6">
                  <label>Present Residential Address</label>
                   <input type="text" class="form-control" placeholder="" name="address1" value="<?php echo $row->stud_address;?>" required>
				  <span class="text-danger"><?php echo form_error('address1');?></span>
                </div>
				
     
				 <div class="form-group col-md-6">
                  <label>Permanent Address</label>
                 <input type="text" class="form-control" placeholder="" name="address2" value="<?php echo $row->stud_p_address;?>" required>
				  <span class="text-danger"><?php echo form_error('address2');?></span>
                </div>
				</div>
				<div class="col-md-12">		
		    <div class="form-group col-md-6">
                  <label>Permanent Place</label>
                  <input type="text" class="form-control" placeholder="Student place" name="per_place" value="<?php echo $row->stud_p_place;?>" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
           </div>
		<div class="form-group col-md-6">
                  <label>Permanent District</label>
                  <input type="text" class="form-control" placeholder="" name="per_district" value="<?php echo $row->stud_p_district;?>" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>		
		</div>
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Permanent state</label>
                  <input type="text" class="form-control" placeholder="Student State" name="per_state" value="<?php echo $row->stud_p_state;?>" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>	
		</div>		
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Nationality</label>
                  <input type="text" class="form-control" placeholder="" name="nation" value="<?php echo $row->stud_nationality;?>" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>
		<div class="form-group col-md-6">
                  <label>Student Qualification</label>
                  <input type="text" class="form-control" placeholder="" name="per_qual" value="<?php echo $row->stud_qualifiication;?>" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>		
		</div>
					

<div class="col-md-12">		
		<div class="form-group col-md-6">
            <label>Admitted to Batch</label>
			<input type="text" class="form-control" placeholder="Batch" name="class2" value="<?php echo $row->stud_batch_id; ?>" required>	    
        <span class="text-danger"> <?php echo form_error('class'); ?></span>       
		</div>
		
		<div class="form-group col-md-6">
		<label for="exampleInputFile">Photo</label>
				<input type="file"  name="file" value="" class="imageupload" id="exampleInputFile">
				<input type="hidden" value="<?php echo $row->stud_img; ?>" name="image">
		<p>Current Image</p> <img  src="<?php echo base_url("resource/images/"); if($row->stud_img) echo $row->stud_img; else echo "no-img.jpg"; ?>" height="50" width="50"/></br>
		New image
		<div id="preview-image"></div><br/><br/><br/><br/>
		<span class="text-danger"> <?php echo form_error('photo'); ?></span>
		</div>	
</div>	
 <?php } ?>			
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Admitted to course</label>
				   
              <select class="form-control" required name="class" required>
				  <option value="">--select--</option>
				   <?php 
          $i=1;		 
         foreach ($course as $row)  
         {   ?>
				  <option value="<?php echo $row->course_id; ?>"><?php echo $row->c_name; ?></option>
				  
		 <?php }
     // foreach($classes as $row)
     // { 
     //   echo '<option value="'.$row->class_id.'">'.$row->class_name.'</option>';
     // }
     ?>
	   </select>
       <span class="text-danger"><?php echo form_error('class'); ?></span>       
	   </div>
     <div class="form-group col-md-6">
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
	   </div>		
				
									
				<div class="box-footer">
                <button type="submit" class="col-xs-1 btn btn-warning">Submit</button>
              </div>
								 
 
               <?php echo form_close(); ?>
		
            </div>
            <!-- /.box-body -->
          </div>
		
        </div>
        <!-- /.box-body -->
      
        <!-- /.box-footer-->
      
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /.content-ends -->
<script type="text/javascript">
 $(".imageupload").on('change', function () {
 
     var countFiles = $(this)[0].files.length;
 
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image");
     image_holder.empty();
 
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
 
             for (var i = 0; i < countFiles; i++) {
 
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumbimage"
                     }).appendTo(image_holder);
                 }
 
                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }
 
         } else {
             alert("It doesn't supports");
         }
     } else {
         alert("Select Only images");
     }
 });
 </script>
