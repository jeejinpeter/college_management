<script>
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});
</script>
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
        <li><a href="#">Notice Board</a></li>
      </ol>
    </section>
    <section class="content-header">
	 <?php echo $this->session->flashdata('msg'); ?>
    <center>  <h2>
  Notice List
      </h2></center>
     
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Notice List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                   <th>Sl. No:</th>
                  <th>Title</th>
                  <th>Notice</th>
                  <th>Date</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                $i=1;    
         foreach ($notice->result() as $row)  
         { 
          ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td> <?php echo $row->title;?></td>
                  <td><?php echo $row->notice;?></td>
                  <td><?php echo $row->date;?></td>
				      <td> <div class="btn-group">
                  <button type="button" class="btn btn-warning">Actions</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><p data-placement="top" data-toggle="tooltip" title="Order Feedback"><button class="btn btn-warning" data-title="Order Feedback" data-toggle="modal" data-target="#myModal2-<?=$row->notice_id?>" >Edit</button></p></li>
                    <li><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-warning" data-title="Delete" data-toggle="modal" data-target="#delete-<?=$row->notice_id?>" >Delete</span></button></p></li>
                    
                  </ul>
                </div>  </td>

 
              </tr> 

  <div class="modal fade " id="myModal2-<?=$row->notice_id?>" role="dialog" >
    <div class="modal-dialog modal-lg-12">
      <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Edit Notice</h2>
        </div>
        <div class="modal-body">
          <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Admin/update_notice' ?>" >
             <input type="hidden" name="notice_id"  value="<?php echo $row->notice_id; ?>">
              <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $row->title; ?>" >
					 <span class="text-danger"><?php echo form_error('title'); ?></span>
                    </div>
					
                  </div>
               
                <div class="form-group has-feedback">
                  <label for="notice" class="col-sm-2 control-label">Notice</label>
                   <div class="col-sm-10">
				   <textarea class="form-control" name ="notice" rows="3" placeholder="add notice ..."><?php echo $row->notice; ?></textarea>
                   <span class="text-danger"><?php echo form_error('notice'); ?></span>  
                  </div>				  
                </div>
				 
            <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" placeholder="" value="<?php echo $row->date; ?>" >
                    </div>
                  </div>
				
                   
                <div class="form-group has-feedback">
                  <label for="sms" class="col-sm-2 control-label"> send SMS</label>

                  <div class="col-sm-10">
                                <select class="form-control">
                    <option>Yes</option>
                    <option>No</option>
                    
                  </select>
                </div>
                  </div>
                </div>
                   
          <button name="save" type="submit" href="<?php echo base_url('Admin/edit_notice/'.$row->notice_id); ?>" class="btn btn-success" id="status">Update</button>
		   <button name="save" onclick="cancelFunction()" href="<?php echo base_url('Admin/delete_notice/'.$row->notice_id); ?>"  class="btn btn-default">Cancel</button>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
        </div>
        </div>
        </div></div> 
		
   <div class="modal fade " id="delete-<?=$row->notice_id?>" role="dialog" >
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Admin/delete_notice/'.$row->notice_id ?>" >
    <input type="hidden" id="notice_id"  name= "notice_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->notice_id?>">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>   
      </div>
        <div class="modal-footer ">
         <button name="save" type="submit" class="btn btn-success" ><span class="glyphicon 
		glyphicon-ok-sign"></span>Yes</button>
		    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
      </div> </form>
        </div>
    <!-- /.modal-content --> 
  </div>
  
      <!-- /.modal-dialog --> 
	  
    </div>
	
		 <?php }?>
                </tbody>
               
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

