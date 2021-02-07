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
                echo form_open_multipart("Admin/addstudent_pro", $attributes);?>
            
              <h4><?php echo $this->session->flashdata('msg'); ?></h4><br>
                <!-- text input -->
				<div class="col-md-12">
				 <div class="form-group col-md-6">
                  <label>Admission Number</label>
                  <input type="text" class="form-control" placeholder="" name="admno"  value="" required>
				 <span class="text-danger"><?php echo form_error('admno'); ?></span>
                </div>
             	<div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="" name="stdname"  value="" required>
				 <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Roll number</label>
                  <input type="text" class="form-control" placeholder="" name="rollno"  value="">
				 <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
				</div>
				<div class="col-md-12">
		  <div class="form-group col-md-6">
          <label>Sex(M/F)</label>
           <div class="form-group">
                  <div class="radio">
                    &nbsp;&nbsp; &nbsp;<label>
                      <input type="radio" name="gender" id="optionsRadios1" value="0">
                     Male
                    </label>&nbsp;&nbsp; &nbsp;
          <label>
                      <input type="radio" name="gender" id="optionsRadios2" value="1">
                      Female
                    </label>
                  </div>
                  <span class="text-danger"> <?php echo form_error('sex'); ?></span>
                 
                </div>
                </div>
				
				
				<div class="form-group col-md-6">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control" placeholder="" name="dob" value="" required>
				  <span class="text-danger"> <?php echo form_error('age'); ?></span>
                </div>
				
				</div>
			
				 <div class="form-group col-md-6">
                  <label>Date of Joining</label>
                  <input type="date" class="form-control" placeholder="" name="doj" value="" required>
				   <span class="text-danger"> <?php echo form_error('year'); ?></span>
                </div>
				</div>
				
			   <div class="col-md-12">	
				<div class="form-group col-md-6">
                  <label>Caste</label>
                  <input type="text" class="form-control" placeholder="" name="cast" value="" required>
				   <span class="text-danger"> <?php echo form_error('date'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Religion</label>
                  <input type="text" class="form-control" placeholder="" name="religion" value="" required>
				   <span class="text-danger"> <?php echo form_error('religion'); ?></span>
                </div>
			   </div>
				
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Student_Place</label>
                  <input type="text" class="form-control" placeholder="" name="stud_place" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>
		<div class="form-group col-md-6">
                  <label>Student_District</label>
                  <input type="text" class="form-control" placeholder="" name="stud_district" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>		
		</div>
		
				<div class ="col-md-12">
				<div class="form-group col-md-6">
                  <label>Student_state</label>
                  <input type="text" class="form-control" placeholder="" name="stud_state" value="" required>
				   <span class="text-danger"> <?php echo form_error('national'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Student_phone</label>
                  <input type="text" class="form-control" placeholder="" name="stud_phone" value="" required>
				   <span class="text-danger"> <?php echo form_error('state'); ?></span>
                </div>
                </div>
				
				<div class ="col-md-12">
				<div class="form-group col-md-6">
                  <label>Student Guardian</label>
                  <input type="text" class="form-control" placeholder="" name="guardian" value="" required>
				   <span class="text-danger"> <?php echo form_error('national'); ?></span>
                </div>
				<div class="form-group col-md-6">
                  <label>Student Guardian Occupation</label>
                  <input type="text" class="form-control" placeholder="" name="guardian_occ" value="" required>
				   <span class="text-danger"> <?php echo form_error('national'); ?></span>
                </div>
                </div>
				<div class="col-md-12">
				 <input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)">
            <em>Check this box if Present Residential Address and Permanent Address are the same.</em>
			</div>
		<div class="col-md-12">		
				
				
				   <div class="form-group col-md-6">
                  <label>Present Residential Address</label>
                   <input type="text" class="form-control" placeholder="" name="address1" value="" required>
				  <span class="text-danger"><?php echo form_error('address1');?></span>
                </div>
				
     
				 <div class="form-group col-md-6">
                  <label>Permanent Address</label>
                 <input type="text" class="form-control" placeholder="" name="address2" value="" required>
				  <span class="text-danger"><?php echo form_error('address2');?></span>
                </div>
				</div>
				<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Permanent Place</label>
                  <input type="text" class="form-control" placeholder="" name="per_place" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>
		<div class="form-group col-md-6">
                  <label>Permanent District</label>
                  <input type="text" class="form-control" placeholder="" name="per_district" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>		
		</div>
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Permanent state</label>
                  <input type="text" class="form-control" placeholder="" name="per_state" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>	
		</div>		
		<div class="col-md-12">		
		<div class="form-group col-md-6">
                  <label>Nationality</label>
                  <input type="text" class="form-control" placeholder="" name="nation" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>
		<div class="form-group col-md-6">
                  <label>Student Qualification</label>
                  <input type="text" class="form-control" placeholder="" name="per_qual" value="" required>				  
				  <span class="text-danger"> <?php echo form_error('caste'); ?></span>
        </div>		
		</div>
					
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
     ?> </select>
       <span class="text-danger"> <?php echo form_error('class'); ?></span>       
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


<div class="col-md-12">		
		  <div class="form-group col-md-6">
                  <label>Admitted to Batch</label>
           
              <select class="form-control" required name="class2" required>
          <option value="">--select--</option>
           <?php 
          $i=1;    
         foreach ($batch as $row)  
         {   ?>
          <option value="<?php echo $row->batch_id; ?>"><?php echo $row->batch_year; ?></option>
          
     <?php }
     ?> </select>
       <span class="text-danger"> <?php echo form_error('class'); ?></span>       
        </div>
		
		<div class="form-group col-md-6">
		<label for="exampleInputFile">Photo</label>
				<input type="file"  name="file" value="" class="imageupload" id="exampleInputFile">
		<div id="preview-image"></div><br/><br/><br/><br/>
		<span class="text-danger"> <?php echo form_error('photo'); ?></span>
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
