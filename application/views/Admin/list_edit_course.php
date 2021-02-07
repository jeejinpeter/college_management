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
 <section class="content">
<div class="col-md-12 col-md-offset-0">
<div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title col-md-12 col-md-offset-0"> List Details</h3>
            </div>
           <?php $attributes = array("name" => "updatecourse", "class" => "form-horizontal");
            echo form_open_multipart("Admin/update_course", $attributes);?>
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
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem1" class="form-control Select1" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="'.$rows['semester1_id'].'">Semester &nbsp;&nbsp;'.$rows['semester1_id'].'</option>';
					}
			 foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="sem1fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem1_couse_fee'];?>" >
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
					<input type="text" class="form-control" placeholder="Enter Sem fees"  
					value="<?php if(isset($subject1)){echo $subject1;}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="sem1_s" value="<?php echo $rows['sem1_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="sem1_subject[]" data-placeholder="Select sem subject">
				   
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?>
            	
            </select>
				</div>
					</div>
					
			<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem2" class="form-control Select22" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="'.$rows['semester2_id'].'">Semester &nbsp;&nbsp;'.$rows['semester2_id'].'</option>';
					}
			 foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?></select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="sem2fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem2_couse_fee'];?>">
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
					<input type="text" class="form-control" placeholder="Enter Sem fees" name=""  
					value="<?php if(isset($subject2)){echo $subject2;}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="sem2_s" value="<?php echo $rows['sem2_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="sem2_subject[]" data-placeholder="Select sem subject">
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
				</div>
					
					
				<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem3" class="form-control Select3" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="'.$rows['semester3_id'].'">Semester &nbsp;&nbsp;'.$rows['semester3_id'].'</option>';
					}
			 foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="sem3fees" class="form-control" placeholder="Enter Sem fees" 
					value="<?php echo $rows['sem3_couse_fee'];?>" >
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
					<input type="text" class="form-control" placeholder="Enter Sem fees" 
					value="<?php if(isset($subject3)){echo $subject3;}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="sem3_s" 
					value="<?php echo $rows['sem3_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="sem3_subject[]" 
				   data-placeholder="Select sem subject">
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
					</div>
	 	<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem4" class="form-control Select4" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="'.$rows['semester4_id'].'">Semester &nbsp;&nbsp;'.$rows['semester4_id'].'</option>';
					}
			 foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="sem4fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem4_couse_fee'];?>" >
                    </div>
					<span class="text-danger"><?php echo form_error('sem1fees'); ?></span>
					<div class="col-sm-3">
					 <?php
                   if(!empty($rows['sem4_subject_id'])){
					$sub4= array();
					$sub_list4= explode(",", $rows['sem4_subject_id']);
					array_push($sub4, $sub_list4);
					
					foreach ($subject ->result() as $l)  
					{ 
						if(in_array($l->subject_id, $sub4[0])){
						$new4[] = $l->subject_name;
						$subject4 = implode(',',$new4); 
					}
				   }}?>
					<input type="text" class="form-control" placeholder="Enter Sem fees"   
					value="<?php if(isset($subject4)){echo $subject4;}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="sem4_s" value="<?php echo $rows['sem4_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="sem4_subject[]" data-placeholder="Select sem subject">
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
					</div>
	 	<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem5" class="form-control Select5" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="'.$rows['semester5_id'].'">Semester &nbsp;&nbsp;'.$rows['semester5_id'].'</option>';
					}
			 foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="sem5fees" class="form-control" placeholder="Enter Sem fees" value="<?php echo $rows['sem5_couse_fee'];?>" >
                    </div>
					<span class="text-danger"><?php echo form_error('sem1fees'); ?></span>
					<div class="col-sm-3">
					 <?php
                   if(!empty($rows['sem5_subject_id'])){
					$sub5= array();
					$sub_list5= explode(",", $rows['sem5_subject_id']);
					array_push($sub5, $sub_list5);
					
					foreach ($subject ->result() as $rw)  
					{ 
						if(in_array($rw->subject_id, $sub5[0])){
						$new5[] = $rw->subject_name;
						$subject5 = implode(',',$new5); 
					}
				   }}?>
					<input type="text" class="form-control" placeholder="Enter Sem fees"  
					value="<?php if(isset($subject5)){echo $subject5;}?>" >
					<input type="hidden" class="form-control" placeholder="Enter Sem fees" name="sem5_s" value="<?php echo $rows['sem5_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="sem5_subject[]" data-placeholder="Select sem subject">
				<?php		
                 foreach($sub->result() as $rows)
            { 
              echo '<option value="'.$rows->subject_id.'">'.$rows->	subject_name.'</option>';
            }
            ?></select>
				</div>
					</div>	
	 	
				<div class="form-group ">
					<label for="title" class="col-sm-2 control-label " placeholder="">Semester</label>
					<div class="col-sm-2">
                    <select name="sem6" class="form-control Select6" placeholder="select semster"  >
					<?php foreach ($course as $rows) {
					echo '<option value="'.$rows['semester6_id'].'">Semester &nbsp;&nbsp;'.$rows['semester6_id'].'</option>';
					}
			 foreach($list->result() as $row)
            { 
              echo '<option value="'.$row->sem_id.'">'.$row->sem_name.'</option>';
            }
            ?>
					</select>
                    </div>
					<div class="col-sm-2">
                    <input type="text" name="sem6fees" class="form-control" placeholder="Enter Sem fees" 
					value="<?php echo $rows['sem6_couse_fee'];?>" >
                    </div>
					<span class="text-danger"><?php echo form_error('sem1fees'); ?></span>
					<div class="col-sm-3">
					 <?php
                   if(!empty($rows['sem6_subject_id'])){
					$sub6= array();
					$sub_list6= explode(",", $rows['sem6_subject_id']);
					array_push($sub6, $sub_list6);
					
					foreach ($subject ->result() as $rw)  
					{ 
						if(in_array($rw->subject_id, $sub6[0])){
						$new6[] = $rw->subject_name;
						$subject6 = implode(',',$new6); 
					}
				   }}?>
					<input type="text" class="form-control" placeholder="Enter Sem fees"  
					value="<?php if(isset($subject6)){echo $subject6;}?>" >
					<input type="hidden" class="form-control" placeholder="" name="sem6_s" 
					value="<?php echo $rows['sem6_subject_id'];?>" >
					</div>
				   <div class="col-sm-3">
				   <select class="form-control select2" multiple="multiple" name="sem6_subject[]" 
				   data-placeholder="Select sem subject">
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
			  <button type="submit" class="btn btn-warning">Save</button>
         
                <button type="submit"  onclick="cancelFunction()"  class="btn btn-default">Cancel</button>
                     </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
          </section>
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