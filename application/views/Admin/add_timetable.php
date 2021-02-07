<div class="content-wrapper">
    <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Timetable</a></li>
      </ol>
    </section>
<h4><?php if(isset($error)) echo $error; ?>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Timetable</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "news", "class" => "form-horizontal");
                echo form_open_multipart("Admin/add_timetable_uploading", $attributes);?>
              <div class="box-body">
                   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Department</label>
                  <div class="col-sm-6">
                   <select class="form-control" id="department" name="department" required> 
                    <option value ="">--select--</option>
					<?php
					foreach($dept as $row)
					{
	 
       echo '<option value="'.$row->dept_id.'">'.$row->dept_name.'</option>';
                     }
	               ?>
                    </select>
                    </div>
                <span class="text-danger"><?php echo form_error('standard'); ?></span>
                  </div>
				       <div class="form-group has-feedback">
                  <label for="course" class="col-sm-2 control-label">Course</label>
                  <div class="col-sm-6">
				  <select class="form-control" id="course" name="course" required> 
                    <option value ="">--select--</option>
                    
				 </select>
                   
                    </div>
                <span class="text-danger"><?php echo form_error('section'); ?></span>
                  </div>
				   <div class="form-group has-feedback">
                  <label for="sem" class="col-sm-2 control-label" placeholder="">Semester</label>
                  <div class="col-sm-6">
				    <select class="form-control"  name="sem" required> 
                    <option value ="">--select--</option>
                    <?php
					foreach($sem as $row1)
					{
	 
       echo '<option value="'.$row1->sem_id.'">'.$row1->sem_code.'</option>';
                     }
	               ?>
				 </select>
                    
                <span class="text-danger"><?php echo form_error('sem'); ?></span>
                  </div>
				  </div>
          <div class="form-group has-feedback">
                  <label for="image" class="col-sm-2 control-label">Upload Image</label>
                   <div class="col-sm-6">
                    <input type="file"  name="timetable" value="<?php echo set_value('timetable'); ?>" class="imageupload" id="exampleInputFile" required>
             				     </div>
									
				
		
						<div id="preview-image"></div><br/><br/><br/><br/>
              
                       <span class="text-danger"> <?php echo form_error('timetable'); ?></span>
					     </div>
                </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
                <button type="reset"  class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-warning">Save</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
		  <script type="text/javascript">
       $(document).ready(function(){
    $('#department').on('change',function(){
        var deptID = $(this).val(); 
     if(deptID){
            $.ajax({
                type:'POST',
                url:'getCourse/'+deptID,
                cache:false,
                success:function(html){
                    $('#course').html(html);
					    }
            }); 
			}else{
            $('#course').html('<option value="">Select department first</option>');
 }
    });
  });
</script>					