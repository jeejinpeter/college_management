<div class="content-wrapper">
 <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Staff</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
   
      <section class="content">
       <h3 class="box-title">Staff</h3>
       
        <div class="col-md-offset-10">
         <button type="button" class="btn bg-yellow color-palette" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true">Add Staff</i></button>
        </div>
<!--Add Teacher Modal -->
    <div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
				<a class="btn btn-block btn-social bg-orange disabled color-palette">Staff Details</a></h4>
				</div>
	   <?php $attributes = array("name" => "registration");
        echo form_open_multipart("Admin/add_staff", $attributes);?>
			<div class="modal-body">
				<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label">Staff Name</label>
                    <input type="text" class="form-control" name="sname" required>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Gender</label>
                    <select name="gender" class="form-control selectboxit">
					  <option>---Select gender---</option>
                      <option value="1">male</option>
                      <option value="0">female</option>
                    </select>
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Address</label>
                    <input type="text" class="form-control" name="address" value="" >
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Place</label>
                    <input type="text" class="form-control" name="place" value="">
				</div>
        <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label">District</label>
                    <input type="text" class="form-control" name="district" required>
        </div>  
        <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label">State</label>
                    <input type="text" class="form-control" name="state" required>
        </div>
        <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" required>
        </div>
        <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label">Phone</label>
                    <input type="number" class="form-control" name="phone" required>
        </div>
         <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label">Qualification</label>
                    <input type="text" class="form-control" name="quali" required>
        </div>
        <div class="form-group">
          <label for="field-1" class="col-sm-3 control-label">Join Date</label>
                    <input type="date" class="form-control" name="jdate" required>
        </div>
				<div class="form-group">
					<label for="field-1"  class="col-sm-3 control-label">Email ID</label>
					<input type="email" class="form-control" name="email" required>
				</div>
        <div class="form-group">
          <label for="field-2" class="col-sm-3 control-label"> Username</label>
                    <input type="text" class="form-control" name="uname" required >
        </div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label"> password</label>
                    <input type="password" class="form-control" name="password" required >
				</div>
				<div class="form-group">
					<label for="field-2" class="col-sm-3 control-label">Role</label>
                    <select name="role" class="form-control selectboxit">
					<option>---Select role---</option>
                    <option value="2">Teaching</option>
                    <option value="3">Non-Teaching</option>
                     </select>
				</div>
				<div class="form-group">
								  <label for="exampleInputFile">Photo</label>
									
					<input type="file"  name="photo"  class="imageupload" id="exampleInputFile">
		
						<div id="preview-image"></div><br/><br/><br/><br/>
              
                       <span class="text-danger"> <?php echo form_error('photo'); ?></span>
									
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
<div>
       <center>
                    <label>
                              <INPUT TYPE='radio'  class= "iradio_flat-green" NAME='cat' VALUE='1' onClick="javascript:return yourfunction(1)" checked="required"  ><ins class="iCheck-helper"/></ins>All  </label>&nbsp &nbsp
              
                               <label> <INPUT TYPE='radio' class= "iradio_flat-green" NAME='cat' VALUE='0' onClick="javascript:return yourfunction(2)"/><ins class="iCheck-helper"></ins>&nbsp Teaching
                            </label>
                             <label> <INPUT TYPE='radio' class= "iradio_flat-green" NAME='cat' VALUE='0' onClick="javascript:return yourfunction(3)"/><ins class="iCheck-helper"></ins>&nbsp Non-Teaching
                            </label>
                            </center>
                            </div>
<div class="row">
     <hr>
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box">
            <div class="box-body">
            <div id="one">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
				          <th>Photo</th>
                  <th>Name</th>
				          <th>Phone No</th>
                  <th>Email</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($list as $row): ?>
              <tr>
			      <td>  <img src="<?php echo base_url("resource/uploads/"); 
                     if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="50" width="50"/></td>
                  <td><?php echo $row['staff_name'];?></td>
                  <td><?php echo $row['staff_ph_number'];?></td> 
				  <td><?php echo $row['email'];?></td>
                  <td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="staff_id" data-toggle="modal" data-id="<?php echo $row['staff_id'];?>" data-target="#myModal-<?=$row['staff_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
					</li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_staff/'.$row['staff_login_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                </tr>
<!-- Modal edit teacher-->
	<div id="myModal-<?=$row['staff_id']?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Details</h4>
				</div>
				<div class="modal-body">
				   <img src="<?php echo base_url("resource/uploads/"); 
                     if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="50" width="50"/>
				<span class='ShowData'></span>
				<div class="modal-footer">
				</div>
				</div>
				</div>
		</div>
	</div> 
  <?php endforeach;?>
  </tbody>
  </table>
  </div>
  </div>
  <div class="box-body">
  <div id="two" style ="display:none">
              <table id="myTable" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>Email</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
        <?php foreach($teacher as $row): ?>
              <tr>
            <td>  <img src="<?php echo base_url("resource/uploads/"); 
                     if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="50" width="50"/></td>
                  <td><?php echo $row['staff_name'];?></td>
                  <td><?php echo $row['staff_ph_number'];?></td> 
          <td><?php echo $row['email'];?></td>
                  <td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
           <li>
            <a href=""  class="teacher" data-toggle="modal" data-id="<?php echo $row['staff_id'];?>" data-target="#myModal2-<?=$row['staff_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_staff/'.$row['staff_login_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                </tr>
<!-- Modal edit teacher-->
  <div id="myModal2-<?=$row['staff_id']?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Details</h4>
        </div>
        <div class="modal-body">
           <img src="<?php echo base_url("resource/uploads/"); 
                     if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="50" width="50"/>
        <span class='Data'></span>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>
  </div>
  
  <?php endforeach;?> 
  </tbody>
  </table>
  </div>
  </div>
  <div class="box-body">
  <div id="three" style ="display:none">
              <table id="Table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Phone No</th>
                  <th>Email</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
        <?php foreach($nonteacher as $row): ?>
              <tr>
            <td>  <img src="<?php echo base_url("resource/uploads/"); 
                     if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="50" width="50"/></td>
                  <td><?php echo $row['staff_name'];?></td>
                  <td><?php echo $row['staff_ph_number'];?></td> 
          <td><?php echo $row['email'];?></td>
                  <td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
           <li>
            <a href=""  class="nonteacher" data-toggle="modal" data-id="<?php echo $row['staff_id'];?>" data-target="#myModal1-<?=$row['staff_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_staff/'.$row['staff_login_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                </tr>
<!-- Modal edit teacher-->
  <div id="myModal1-<?=$row['staff_id']?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Details</h4>
        </div>
        <div class="modal-body">
           <img src="<?php echo base_url("resource/uploads/"); 
                     if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="50" width="50"/>
        <span class='non'></span>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>
  </div> 
  <?php endforeach;?>
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
   
   document.getElementById('one').style.display = 'none';
   document.getElementById('two').style.display = '';
   document.getElementById('three').style.display = 'none';
  }
  else if(radioid == 3)
  {
   document.getElementById('one').style.display = 'none';
   document.getElementById('two').style.display = 'none';
   document.getElementById('three').style.display = '';
  }
}
</script>
<script>
$('.staff_id').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"staff_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
$('.teacher').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"staff_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".Data").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
$('.nonteacher').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"staff_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".non").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
$(document).ready(function(){
    $('#myTable').DataTable();
});
$(document).ready(function(){
    $('#Table').DataTable();
});
</script>