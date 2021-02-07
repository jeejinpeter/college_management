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
       <h3 class="box-title">View Attendance</h3>
       <a href="<?php echo base_url('Admin/excel/'.$month.'/'.$role);?>" class="btn bg-olive btn-flat margin pull-left"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Export Excel</a>
        <div class="col-md-offset-10">
        <a  href="<?php echo base_url('Admin/list_attendance_view');?>" class="btn bg-olive btn-flat margin pull-right">Previous</a>
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
			  <h3 class="box-title">View Attendance:<?php echo $month;?></h3>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Staff name</th>
                  <th>Total Presents</th>
                  <th>Total Absents</th>
                  <th>Total Leaves</th>
                  <th>Half days</th>
                  <th>Casual Leaves</th>
                  <th>Lates</th>
                  <th>Lop</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
          $i=1;		 
         foreach ($teacher as $row)  
         {   
            ?>
                <tr>
                  <td><?php echo $row->staff_name;?></td>
                  <td><?php echo $row->presents;?></td>
                  <td><?php echo $row->absents;?></td>
                  <td><?php echo $row->leaves;?></td>
                  <td><?php echo $row->half_day;?></td>
                  <td><?php echo $row->casual_leave;?></td>
                  <td><?php echo $row->late;?></td>
                  <td><?php echo $row->lop;?></td>
                  	<td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
           <li>
            <a href=""  class="attend_id" data-toggle="modal" data-id="<?php echo $row->attend_id;?>" data-target="#myModal-<?=$row->attend_id?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_staff_attendance/'.$row->attend_id);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                </tr>
                <div id="myModal-<?=$row->attend_id?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Details</h4>
        </div>
        <div class="modal-body">
           
        <span class='ShowData'></span>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>
  </div> 
				
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
<script>
$('.attend_id').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"attendance_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
    </script>
<!----get techer_id------->
 <script>
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


