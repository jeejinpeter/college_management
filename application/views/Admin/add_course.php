<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Courses</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
<div class="col-md-12 col-md-offset-0">
<div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title"> Add Course</h3>
            </div>
          <?php $attributes = array("name" => "addcourse", "class" => "form-horizontal");
            echo form_open_multipart("Admin/add_course", $attributes);?>
              <div class="box-body col-md-12">
                   <div class="form-group ">
						<label for="title" class="col-sm-2 control-label">Course Name</label>
						<div class="col-sm-6">
						<input type="text" name="c_name" class="form-control" placeholder="Course Name" value="<?php echo set_value('c_name');?>" >
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
                  </div>
                  <div class="form-group ">
            <label for="title" class="col-sm-2 control-label">Department</label>
            <div class="col-sm-6">
            <select name="dept" class="form-control " placeholder="select semster"  >
          <option >--Select Department--</option>
            <?php 
         foreach($dep as $rowss)
            { 
              echo '<option value="'.$rowss['dept_id'].'">'.$rowss['dept_name'].'</option>';
            }
            ?>
          </select>
            </div>
            <span class="text-danger"><?php echo form_error('dept'); ?></span>
                  </div>
				  <div class="form-group ">
						<label for="category" class="col-sm-2 control-label">Course Category</label>
						<div class="col-sm-6">
						<select name="c_cate" class="form-control" placeholder="select Course Category" value="<?php echo set_value('c_cate');?>" >
						<option value="">----category-----</option>
						<option value="PG">PG</option>
						<option value="UG">UG</option>
						</select>
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
                  </div>
				<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Type</label>
						<div class="col-sm-6">
						<input type='radio'  class= "iradio_flat-green" name='r1' value='1' onclick="javascript:return yourfunction(2)" checked="required"  ><ins class="iCheck-helper"/></ins>&nbsp;Semster </label>&nbsp; &nbsp;
						<label> <input type='radio'class= "iradio_flat-green" NAME='r1' value='2' onClick="javascript:return yourfunction(1)"/><ins class="iCheck-helper"></ins> &nbsp; Year</label>&nbsp; &nbsp; <label>
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
				</div>
				<div id ="two" >
					<div class="form-group ">
						<label for="title" class="col-sm-2 control-label" placeholder="">Duration</label>
						<div class="col-sm-6">
							<input type="text" name="duration1" class="form-control" placeholder="Course duration" value="<?php echo set_value('duration1');?>" >
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
					</div>
					<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="semm1" class="form-control Select1" placeholder="select semster"  >
					<option >--Select Semester--</option>
					  <?php 
         foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
					 </div><span class="text-danger"><?php echo form_error(''); ?></span>
					<div class="col-sm-2">
                    <input type="text" name="sem1fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('sem1fees');?>" ><span class="text-danger"><?php echo form_error('c_name'); ?></span>
                    </div>
					
					<div class="col-sm-2">
					<select class="form-control select2" multiple="multiple" name="sem1_subject[]" data-placeholder="Select sem subject">
					 <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div><span class="text-danger"><?php echo form_error('sem1_subject[]'); ?></span>
					</div>
					<div class="form-group ">
						<label for="title" class="col-sm-2 control-label" placeholder="">Semester</label>
						<div class="col-sm-2">
						<select name="sem2" class="form-control Select22" placeholder="select semster" value="<?php echo set_value('sem2');?>" >
						<option >--Select Semester--</option> <?php 
         foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
						</select>
						<span class="text-danger"><?php echo form_error('sem2'); ?></span>
						</div>
						<div class="col-sm-2">
						<input type="text" name="sem2fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('fees');?>" ><span class="text-danger"><?php echo form_error('c_name'); ?></span>
                    </div>
						
						<div class="col-sm-2">
						<select class="form-control select2" multiple="multiple" name="sem2_subject[]" data-placeholder="Select sem subject">
						 <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
						</select>
						</div>
						<span class="text-danger"><?php echo form_error('sem1_subject[]'); ?></span>
					</div>
					<div class="form-group ">
					<label for="title" class="col-sm-2 control-label" placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem3" class="form-control Select3" placeholder="select semster" value="<?php echo set_value('sem3');?>" >
					<option value="">--Select Semester--</option> <?php 
         foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div><div class="col-sm-2">
                    <input type="text" name="sem3fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('sem3fees');?>" ><span class="text-danger"><?php echo form_error('c_name'); ?></span>
                    </div>
                
				<div class="col-sm-2">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select sem subject" name="sem3_subject[]">
                   <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div>
				<span class="text-danger"><?php echo form_error('sem1_subject[]'); ?></span>
             </div>	
	  <div class="form-group ">
				<label for="title" class="col-sm-2 control-label" placeholder="">Semester</label>
                   <div class="col-sm-2">
                    <select name="sem4" class="form-control Select4" placeholder="select semster" value="<?php echo set_value('sem4');?>" >
					<option value="">--Select Semester--</option> <?php 
         foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div><div class="col-sm-2">
                    <input type="text" name="sem4fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('sem4fees');?>" >
					<span class="text-danger"><?php echo form_error('c_name'); ?></span>
                    </div>
                
				<div class="col-sm-2">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select sem subject" name="sem4_subject[]">
                 <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div><span class="text-danger"><?php echo form_error('sem1_subject[]'); ?></span>
             </div>
	  <div class="form-group ">
				<label for="title" class="col-sm-2 control-label" placeholder="">Semester</label>
                   <div class="col-sm-2">
                    <select name="sem5" class="form-control Select5" placeholder="select semster" value="<?php echo set_value('sem5');?>" >
					<option >--Select Semester--</option>
				 <?php 
         foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div><div class="col-sm-2">
                    <input type="text" name="sem5fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('sem5fees');?>" ><span class="text-danger"><?php echo form_error(''); ?></span>
                    </div>
                
				<div class="col-sm-2">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select sem subject" name="sem5_subject[]">
                   <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div><span class="text-danger"><?php echo form_error(''); ?></span></span>
             </div>		
	  <div class="form-group ">
				<label for="title" class="col-sm-2 control-label" placeholder="">Semester</label>
                   <div class="col-sm-2">
                    <select name="sem6" class="form-control Select6" placeholder="select semster" value="<?php echo set_value('sem6');?>" >
					<option value="">--Select Semester--</option>
					 <?php 
         foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div><div class="col-sm-2">
                    <input type="text" name="sem6fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('sem1');?>" > <span class="text-danger"><?php echo form_error(''); ?></span>
                    </div>
               
				<div class="col-sm-2">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select sem subject" name="sem6_subject[]">
                  <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div><span class="text-danger"><?php echo form_error(''); ?></span>
             </div>			 </div>
			 
	<!-=============end==============-/>	 
		<div id ="one" style="display:none;">
			<div class="form-group ">
				<label for="title" class="col-sm-2 control-label" placeholder="">Duration</label>
                <div class="col-sm-6">
                <input type="number" name="duration" class="form-control" placeholder="Course duration" value="<?php echo set_value('duration');?>" >
                </div>
                <span class="text-danger"><?php echo form_error('c_name'); ?></span>
			</div>
			<div class="form-group ">
				<label for="title" class="col-sm-2 control-label " placeholder="">Year</label>
                <div class="col-sm-2">
                <select name="year1" class="form-control Select11" placeholder="select Year" value="<?php echo set_value('year');?>" >
				<option>Select year</option>
				<option value="y1">1st Year</option>
				<option value="y2">2nd Year</option>
				<option value="y3">3rd year</option>
				</select>
                </div>
				<div class="col-sm-2">
                <input type="text" name="year1fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('year1fees');?>" >
                <span class="text-danger"><?php echo form_error('c_name'); ?></span> </div>
				<div class="col-sm-2">
                <select name="year1subject[]"class="form-control select2" multiple="multiple" data-placeholder="Select subject">
                  <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div> <span class="text-danger"><?php echo form_error('sem1_subject[]'); ?></span>
                </div> 
			    <div class="form-group ">
				<label for="title" class="col-sm-2 control-label "  placeholder="">Year</label>
                <div class="col-sm-2">
                 <select name="year2" class="form-control Select33" placeholder="select Year" >
				<option>Select year</option>
				<option value="y1">1st Year</option>
				<option value="y2">2nd Year</option>
				<option value="y3">3rd year</option>
				</select>
                </div>
				<div class="col-sm-2">
                 <input type="text" name="year2fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('year2fees');?>" >
				 <span class="text-danger"><?php echo form_error('c_name'); ?></span>
                 </div>
                <div class="col-sm-2">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select  subject" name="year2subject[]">
                 <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div><span class="text-danger"><?php echo form_error('sem1_subject[]'); ?></span>
             </div><div class="form-group ">
				<label for="title" class="col-sm-2 control-label " placeholder="">Select Year</label>
                   <div class="col-sm-2">
                    <select name="year3" class="form-control Select44" placeholder="select semster"  >
					<option>Select year</option><option value="y1">1st year</option>
					<option value="y2">2nd year</option>
					<option value="y3">3rd year</option>
					</select>
                    </div><div class="col-sm-2">
                    <input type="text" name="year3fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo set_value('year3fees');?>" ><span class="text-danger"><?php echo form_error(''); ?></span>
                    </div>
                
				<div class="col-sm-2">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select  subject" name="year3subject[]">
                 <?php 
         foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
                </select>
				</div><span class="text-danger"><?php echo form_error(''); ?></span>
             </div>
               </div>
			    <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label" placeholder="">Description</label>
                   <div class="col-sm-6">
                    <textarea name="description" class="form-control" value="<?php echo set_value('description');?>"></textarea>
                    </div>
                <span class="text-danger"><?php echo form_error('description'); ?></span>
				  </div>  
                   </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
                <button type="submit"  onclick="cancelFunction()"  class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-warning">Save</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
<script>
 function yourfunction(radioid)
{
  if(radioid == 1)
  {    
  document.getElementById('one').style.display = '';
    document.getElementById('two').style.display = 'none';
    document.getElementById('three').style.display = 'none';
  }
  else if(radioid == 2)
  {  
   document.getElementById('two').style.display = '';
   document.getElementById('one').style.display = 'none';
   document.getElementById('three').style.display = 'none';
  }						
}
</script>
<script>
$(".Select22").change(function(){
  if($(this).val() == $(".Select1").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select3").change(function(){
  if($(this).val() == $(".Select1").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});

$(".Select4").change(function(){
  if($(this).val() == $(".Select1").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select5").change(function(){
  if($(this).val() == $(".Select1").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select6").change(function(){
  if($(this).val() == $(".Select1").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
</script>
<script>
$(".Select1").change(function(){
  if($(this).val() == $(".Select22").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select3").change(function(){
  if($(this).val() == $(".Select22").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});

$(".Select4").change(function(){
  if($(this).val() == $(".Select22").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select5").change(function(){
  if($(this).val() == $(".Select22").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select6").change(function(){
  if($(this).val() == $(".Select22").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
</script>
<script>
$(".Select3").change(function(){
  if($(this).val() == $(".Select22").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select1").change(function(){
  if($(this).val() == $(".Select3").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});

$(".Select4").change(function(){
  if($(this).val() == $(".Select3").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select5").change(function(){
  if($(this).val() == $(".Select3").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select6").change(function(){
  if($(this).val() == $(".Select3").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
</script>
<script>
$(".Select1").change(function(){
  if($(this).val() == $(".Select4").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select22").change(function(){
  if($(this).val() == $(".Select4").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});

$(".Select3").change(function(){
  if($(this).val() == $(".Select4").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select5").change(function(){
  if($(this).val() == $(".Select4").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select6").change(function(){
  if($(this).val() == $(".Select4").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
</script>
<script>
$(".Select1").change(function(){
  if($(this).val() == $(".Select5").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select22").change(function(){
  if($(this).val() == $(".Select5").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});

$(".Select3").change(function(){
  if($(this).val() == $(".Select5").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select4").change(function(){
  if($(this).val() == $(".Select5").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select6").change(function(){
  if($(this).val() == $(".Select5").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
</script>
<script>
$(".Select1").change(function(){
  if($(this).val() == $(".Select6").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select22").change(function(){
  if($(this).val() == $(".Select6").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});

$(".Select3").change(function(){
  if($(this).val() == $(".Select6").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select5").change(function(){
  if($(this).val() == $(".Select6").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select4").change(function(){
  if($(this).val() == $(".Select6").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select33").change(function(){
  if($(this).val() == $(".Select11").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select44").change(function(){
  if($(this).val() == $(".Select11").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select11").change(function(){
  if($(this).val() == $(".Select33").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select44").change(function(){
  if($(this).val() == $(".Select33").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select11").change(function(){
  if($(this).val() == $(".Select44").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
$(".Select33").change(function(){
  if($(this).val() == $(".Select44").val()) {
    alert('Already Semester Selected');
    $(this).val('');
  }
});
</script>