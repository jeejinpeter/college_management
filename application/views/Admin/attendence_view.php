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
      <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Select Attendance</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
       <div class="row">
	   <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
		 <?php $attributes = array("name" =>"subject_add");
           echo form_open("Admin/list_attendance_view_processing", $attributes);?>
           <div class="panel-body">
	          <div class="form-group">
					
                   	<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Select Month</label>
					<input name="myDate" class="form-control monthPicker" required>
                   
				</div>	
			   </div>
			<div class="form-group">
                <label>Staffs</label>
                <select class="form-control" name="role">
                  <option value="">Select a role</option>
                  <option value="2">Teaching Staffs</option>
                  <option  value="3">Non Teaching Staffs</option>
				
                </select>
              </div>
             <div>
				 <button type="submit" class="btn btn-info">OK</button>
				  <button type="submit"  onclick="cancelFunction()"  class="btn btn-warning">close</button>
			</div>  
			   
			   
			</div>
	  <?php  echo form_close(); ?>    
	   </div>
	   </div>
	   </section>
	   </div>
	   <script type="text/javascript">
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
<style type="text/css">
    body
    {
        font-family: arial ;
    }

    th,td
    {
        margin: 0;
        text-align: center;
        border-collapse: collapse;
        outline: 1px solid #e3e3e3;
    }

    td
    {
        padding: 5px 10px;
    color: black;
    }

    th
    {
        background: #666;
        color: white;
        padding: 5px 10px;
    }

   .ui-datepicker-calendar {
    display: none;
}
    </style>

