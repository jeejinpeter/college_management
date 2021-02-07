<style>
.red{color:#59d32c !important;}
</style>
 
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-warning">
            <div class="panel-heading">
 <div class="form-group">

					   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><h4 style="margin-top:-3px !important;">New College Admin</h4>
                        </label>
						
						<div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
					  <div>
                            <label>
                              <INPUT TYPE='radio'  class= "iradio_flat-green" NAME='cat' VALUE='1' onClick="javascript:return yourfunction(1)" checked="required"  ><ins class="iCheck-helper"/></ins>Add New Admin   </label>&nbsp; &nbsp;
							
                               <label> <INPUT TYPE='radio'class= "iradio_flat-green" NAME='cat' VALUE='0' onClick="javascript:return yourfunction(2)"/><ins class="iCheck-helper"></ins>&nbsp; List Admins
                            </label>
                            
							</div> 
							</div>
              </div>
              </div>
              </div>
							</div>
							<div class="container">
 
 
<div class="x_content">
				  <div id ="two" style ="display:none">							
   <table   class="table table-striped table-bordered" border="0">  
      <thead>  
         <tr>
		  <th><div>Sl. No</div></th>
                        <th><div>Admins</div></th>
                        <th><div>Action</div></th>
         </tr>  
		 </thead>
		 <tbody>
         <?php $i=1;
          foreach($list->result() as $val):?>
                       <tr>
              <td><?php echo $i++;?></td>
              <td><?php echo $val->username;?></td>
              <td> <div class="btn-group">
                  <button type="button" class="btn bg-teal color-palette">View</button>
                  <button type="button" class="btn bg-teal color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
           <li>
            <a href=""  class="admin_id" data-toggle="modal" data-id="<?php echo $val->login_id;?>"data-target="#myModal-<?=$val->login_id?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Truststaff/remove_admin/'.$val->login_id);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                          </tr>
  <!-- Modal edit class-->
  <div id="myModal-<?=$val->login_id?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Details</h4>
        </div>
        <div class="modal-body">
        <span class='ShowData'>
          
        </span>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>
  </div> 
  <!---------end modal---------------->
                          <?php endforeach;?>
         
      </tbody>  
   </table>  
 </div>
 </div>
 </div>
 
 <div class="container">
  <div class="x_content">
			   <div id ="one" >
     <?php $attributes = array("name" => "AddAdmin");
                echo form_open("Truststaff/admin_add_process", $attributes);?>
                  <div class="box-body">
                     <div class="col-md-8 col-md-offset-2">
                    <div class="input-group">
               <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" value="">
              </div>
              
        <span style="margin-left:30px;" class="text-danger"><?php echo form_error('username'); ?></span>
              <hr>
          <div class="input-group">
                 <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
<span style="margin-left:30px;" class="text-danger"><?php echo form_error('password'); ?></span>

              <hr>
      <div class="input-group">
                 <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
<span style="margin-left:30px;" class="text-danger"><?php echo form_error('email'); ?></span>

              <hr>          
           
              <div class="box-footer col-md-offset-4">
               <button type="submit" onclick="cancelFunction()" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
        </div>
                 </div> 
                   </div> 
                    <?php  echo form_close(); ?> 
   </div>
   </div>
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
  }
  else if(radioid == 2)
  {  
   document.getElementById('two').style.display = '';
   document.getElementById('one').style.display = 'none';
  }
}</script>

<script>
$('.admin_id').click(function()
    {
        var Id = $(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"admin_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script>