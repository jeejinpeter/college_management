<style>
.ui-datepicker-calendar {
    display: none;
}

</style>
<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Staff Attendance</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
       <h3 class="box-title">Add Staff Attendance</h3>
        <div class="col-md-offset-10">
        
        </div>
<div>
      <label>Select Role : </label>
                            &nbsp; &nbsp;<label>
                              <INPUT TYPE='radio'  class= "iradio_flat-green" NAME='cat' VALUE='1' onclick="javascript:return yourfunction(2)" checked="required"  ><ins class="iCheck-helper"/></ins>&nbsp;Teaching Staffs  </label>&nbsp; &nbsp;
              
                               <label> <INPUT TYPE='radio'class= "iradio_flat-green" NAME='cat' VALUE='0' onClick="javascript:return yourfunction(1)"/><ins class="iCheck-helper"></ins> &nbsp; Non-teaching Staffs </label>
 	
				
            
              </div> 

<div class="row">
     <hr>
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body">
			  <div id ="two" >
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Serial no</th>
                  <th>Staff name</th>
                  <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
          $i=1;		 
         foreach ($list as $row)  
         {   
            ?>
                <tr>
				   <td><?php echo $i++;?></td>
                  <td><?php echo $row->staff_name;?></td>
                  		 
                 <td> 
                  <a href=""  style="color:#fff;" class="btn bg-orange color-palette" data-toggle="modal" data-id="<?php echo $row->staff_login_id;?>"data-target="#myModal-<?=$row->staff_login_id?>"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>
                 
               </td>
                </tr>
				<!--Add Teacher Modal -->
   <div id="myModal-<?=$row->staff_login_id?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
				<a class="btn btn-block btn-social bg-orange disabled color-palette">Add Attendance</a></h4>
				</div>
	   <?php $attributes = array("name" => "attendance");
        echo form_open("Admin/add_attendance_processing", $attributes);?>
		<input type="hidden" name="login_id" value="<?php echo $row->staff_login_id;?>">
			<div class="modal-body">
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Month</label>
					<input name="myDate" class="form-control monthPicker" required>
                   
				</div>	
				
				
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Total Presents</label>
                    <input type="number" class="form-control" name="presents" value="" required>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Total Absents</label>
                    <input type="number" class="form-control" name="absents" value="" required>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Total Leave</label>
                    <input type="number" class="form-control" name="leaves" value="" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Half Day</label>
					<input type="number" class="form-control" name="hd" required>
				</div>
				
			<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Casual Leave</label>
					<input type="number" class="form-control" name="cl" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Late </label>
					<input type="number" class="form-control" name="late" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">LOP </label>
					<input type="number" class="form-control" name="lop" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Remarks</label>
					<textarea class="form-control" name="remark" required></textarea>
				</div>
			</div>
            <div class="modal-footer">
				<button type="submit" class="btn btn-info">save</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			</div>
		<?php  echo form_close(); ?>
			</div>
		</div>
	</div>
	<!---------end- model---------->
		 <?php }?>
                </tbody>

              </table>
			  </div>
			  </div>
               <div class="x_content">
          
				 <div id ="one" style ="display:none">
               <table id="example2" class="table table-bordered table-hover"><span><?php echo $this->session->flashdata('msg'); ?></span>
                <thead>
                <tr>
                  <th>Serial no</th>
                  <th>Staff name</th>
                  <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
          $i=1;		 
         foreach ($list2 as $row)  
         {   
            ?>
                <tr>
				   <td><?php echo $i++;?></td>
                  <td><?php echo $row->staff_name;?></td>
                  		 
               <td> 
                  <a href=""  style="color:#fff;" class="btn bg-orange color-palette" data-toggle="modal" data-id="<?php echo $row->staff_login_id;?>"data-target="#myModal1-<?=$row->staff_login_id?>"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>
                 
               </td>
                </tr>
				<!--Add Teacher Modal -->
   <div id="myModal1-<?=$row->staff_login_id?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
				<a class="btn btn-block btn-social bg-orange disabled color-palette">Add Attendance</a></h4>
				</div>
	   <?php $attributes = array("name" => "attendance");
        echo form_open("Admin/add_attendance_processing", $attributes);?>
		<input type="text" name="login_id" value="<?php echo $row->staff_login_id;?>">
			<div class="modal-body">
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Month</label>
					<input name="myDate" class="form-control monthPicker" required>
                   
				</div>	
				
				
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Total Presents</label>
                    <input type="number" class="form-control" name="presents" value="" required>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Total Absents</label>
                    <input type="number" class="form-control" name="absents" value="" required>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Total Leave</label>
                    <input type="number" class="form-control" name="leaves" value="" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Half Day</label>
					<input type="number" class="form-control" name="hd" required>
				</div>
				
			<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Casual Leave</label>
					<input type="number" class="form-control" name="cl" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Late </label>
					<input type="number" class="form-control" name="late" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">LOP </label>
					<input type="number" class="form-control" name="lop" required>
				</div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Remarks</label>
					<textarea class="form-control" name="remark" required></textarea>
				</div>
			</div>
            <div class="modal-footer">
				<button type="submit" class="btn btn-info">save</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			</div>
		<?php  echo form_close(); ?>
			</div>
		</div>
	</div>
	<!---------end- model---------->
		 <?php }?>
                </tbody>

              </table>
			  </div>
			  </div>
			</div>
		  </div>
        </div>
 </div>
 </section>
</div>
<!----get techer_id------->
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
  else if(radioid == 3)
  {  
   document.getElementById('three').style.display = '';
   document.getElementById('two').style.display = 'none';
   document.getElementById('one').style.display = 'none';
  }							
			
 
}
$(function() {
 $('.monthPicker').datepicker({
  changeMonth: true,
  changeYear: true,
  showButtonPanel: true,
  dateFormat: 'MM yy'
 }).focus(function() {
  var thisCalendar = $(this);
  $('.ui-datepicker-calendar').detach();
  $('.ui-datepicker-close').click(function() {
   var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
   var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
   thisCalendar.datepicker('setDate', new Date(year, month, 1));
  });
 });
});

</script>


