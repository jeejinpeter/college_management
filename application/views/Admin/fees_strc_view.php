 <div class="content-wrapper">
 <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Fees</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
      <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Pending Fees Details</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
       <div class="row">
	   <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
		 <?php $attributes = array("name" =>"subject_add");
           echo form_open("Admin/get_all_studentfees", $attributes);?>
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


	   </section>
	   </div>
     <!----fee remittance-------->
  <!--script>
$('.section_id').click(function()
    {
        var Id = $(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"section_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script-->