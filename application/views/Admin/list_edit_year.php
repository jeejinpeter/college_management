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
            <h3 class="box-title"> List Details</h3>
            </div>
           <?php $attributes = array("name" => "updatecourse", "class" => "form-horizontal");
            echo form_open_multipart("Admin/update_year", $attributes);?>
              <div class="box-body col-md-12">
			   <?php foreach($course as $rows): ?>
			   <input type="hidden" name="c_id" class="form-control" placeholder="Course Name" value="<?php echo $rows['course_id'];?>" >
                   <div class="form-group ">
						<label for="title" class="col-sm-2 control-label">Course Name</label>
						<div class="col-md-10">
						<input type="text" name="c_name" class="form-control" placeholder="Course Name" value="<?php echo $rows['c_name'];?>" >
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
                  </div>
				  
				  <div class="form-group ">
						<label for="category" class="col-sm-2 control-label">Course Category</label>
						<div class="col-sm-10">
						<input type="text" name="c_category" class="form-control" placeholder="" value="<?php echo $rows['c_category'];?>" >
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
                  </div>
				   <div class="form-group ">
  
						<label for="title" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
						<input type="text" name="c_description" class="form-control" placeholder="Course Name" value="<?php echo $rows['c_description']?>" >
						</div>
						<span class="text-danger"><?php echo form_error('c_name'); ?></span>
				 </div>
				<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Year</label>
					<div class="col-sm-2">
                    <select name="year1" class="form-control Select1" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="y1">'.$rows['semester1_id'].'</option>';
					}  ?>
					<option value="y1">y1</option>
					<option value="y2">y2</option>
					<option value="y3">y3</option>
			 
          
					</select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="year1fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem1_couse_fee'];?>" >
                    </div>
					<span class="text-danger"><?php echo form_error('sem1fees'); ?></span>
					
					<div class="col-sm-3">
					 <?php
                   if(!empty($rows['sem1_subject_id'])){
					$sub1= array();
					$sub_list1= explode(",", $rows['sem1_subject_id']);
					array_push($sub1, $sub_list1);
					
					foreach ($subject ->result() as $li)  
					{ 
						if(in_array($li->subject_id, $sub1[0])){
						$new1[] = $li->subject_name;
						$subject1 = implode(',',$new1); 
					}
				   }}?>
					<input type="text" class="form-control" placeholder="Enter Sem fees"  value="<?php if(isset($subject1)){echo $subject1;} else {echo "Nill";}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="year1_s" value="<?php echo $rows['sem1_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="year1_subject[]" data-placeholder="Select sem subject">
				   
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
				</div>
					<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Year</label>
					<div class="col-sm-2">
                    <select name="year2" class="form-control Select1" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="y2">'.$rows['semester2_id'].'</option>';
					}  ?>
					<option value="y1">y1</option>
					<option value="y2">y2</option>
					<option value="y3">y3</option>
			 </select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="year2fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem2_couse_fee'];?>" >
                    </div>
					<span class="text-danger"><?php echo form_error('sem1fees'); ?></span>
					
					<div class="col-sm-3">
					 <?php
                   if(!empty($rows['sem2_subject_id'])){
					$sub2= array();
					$sub_list2= explode(",", $rows['sem2_subject_id']);
					array_push($sub2, $sub_list2);
					
					foreach ($subject ->result() as $lis)  
					{ 
						if(in_array($lis->subject_id, $sub2[0])){
						$new2[] = $lis->subject_name;
						$subject2 = implode(',',$new2); 
					}
				   }}?>
					<input type="text" class="form-control" placeholder="Enter Sem fees"  value="<?php if(isset($subject2)){echo $subject2;} else {echo "Nill";}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="year2_s" value="<?php echo $rows['sem2_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="year2_subject[]" data-placeholder="Select sem subject">
				   
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
					</div>
			
				<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Year</label>
					<div class="col-sm-2">
                    <select name="year3" class="form-control Select1" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="y3">'.$rows['semester3_id'].'</option>';
					}  ?>
					<option value="y1">y1</option>
					<option value="y2">y2</option>
					<option value="y3">y3</option>
			 </select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="year3fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem3_couse_fee'];?>" >
                    </div>
					<span class="text-danger"><?php echo form_error('sem1fees'); ?></span>
					
					<div class="col-sm-3">
					 <?php
                   if(!empty($rows['sem3_subject_id'])){
					$sub3= array();
					$sub_list3= explode(",", $rows['sem3_subject_id']);
					array_push($sub3, $sub_list3);
					
					foreach ($subject ->result() as $ls)  
					{ 
						if(in_array($ls->subject_id, $sub3[0])){
						$new3[] = $ls->subject_name;
						$subject3 = implode(',',$new3); 
					}
				   }}?>
					<input type="text" class="form-control" placeholder="Enter Sem fees"  value="<?php if(isset($subject3)){echo $subject3;} else {echo "Nill";}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="year3_s" value="<?php echo $rows['sem3_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="year3_subject[]" data-placeholder="Select sem subject">
				   
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
					</div>	
				
	 	
	 	
					
					</div>
			
		<?php endforeach;?> 
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