 <div class="content-wrapper">
   <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Subject</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
      <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Add Subject</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
       <div class="row">
	   <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
		 <?php $attributes = array("name" =>"subject_add");
           echo form_open("Admin/subject_add", $attributes);?>
           <div class="panel-body">
	          <div class="form-group">
                <label>Subject Name</label>
                  <input type="text" class="form-control" placeholder="Subject Name" name="sub_name" required  value="<?php echo set_value('sub_name'); ?>">
				 <span class="text-danger"><?php echo form_error('sub_name'); ?></span>
              </div>
			  	<div class="form-group">
                <label>Subject Code</label>
                  <input type="text" class="form-control" placeholder="Subject Code" name="sub_code" required  value="<?php echo set_value('sub_code'); ?>">
				 <span class="text-danger"><?php echo form_error('sub_code'); ?></span>
              </div>
             <div>
				 <button type="submit" class="btn btn-info">save</button>
				  <button type="submit"  onclick="cancelFunction()"  class="btn btn-warning">close</button>
			</div>  
			   
			   
			</div>
	  <?php  echo form_close(); ?>    
	   </div>
	   </div>
     </div>
     </section>
     <?php if(isset($list)) { ?>
     <section class="content">
     <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>List of all Subjects</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
       <div class="row">
        <div class="col-xs-12">
     <div class="box box-warning">
     <div class="box-header">
              <h3 class="box-title">Subject List</h3>
            </div>
           <div class="box-body">
       
         <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
            <th><div>Sl. No:</div></th>
                        <th><div>Subject Name</div></th>
                      <th><div>Subject Code</div></th>
            <th><div>Action</div></th>
                      </tr>
          </thead>
                    <tbody>
          <tr>
          <?php 
           $i=1; 
          foreach ($list as $row):?>
          <td><?php echo $i++;?></td>
              <td><?php echo $row['subject_name'];?></td>
               <td><?php echo $row['subject_code'];?></td>
               <td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
           <li>
            <a href=""  class="teacher_id" data-toggle="modal" data-id="<?php echo $row['subject_id'];?>"data-target="#myModal-<?=$row['subject_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_subject/'.$row['subject_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
               </tr> 
               <div id="myModal-<?=$row['subject_id']?>" class="modal fade" role="dialog">
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
               <?php endforeach;?></tbody>
                 </table>
      

 
    </div>
      </div> </div>        
        </div>    
 </section>
 <?php } ?>
	   </section>
	   </div>
    <script>
$('.teacher_id').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"subject_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script>