<div class="content-wrapper">
  <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Department</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
       <h3 class="box-title">Manage Department</h3>
       <div class="row">
        <div class="col-xs-12">
           <div class="box-body box box-warning">
			<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;list</i> 
				</a></li>
			<li><a href="#add" data-toggle="tab"><i class="fa fa-plus">&nbsp;&nbsp;Add</i>
				</a></li>
		    </ul>
			</br>
			 <div class="tab-content">
   <!----Listing class-->
            <div class="tab-pane box active" id="list">
				 <table id="example1" class="table table-bordered table-hover">
                	<thead>
                		<tr>
						 <th><div>Sl. No:</div></th>
                    	<th><div>Department Name</div></th>
                    		<th><div>Department Code</div></th>
                    		<th><div>Action</div></th>
                    	</tr>
					</thead>
                    <tbody>
					
					<?php 
					 $i=1;    
					foreach($list as $val):?>
                    	 <tr>
							<td><?php echo $i++;?></td>
                            <td><?php echo $val['dept_name'];?></td>
							<td><?php echo $val['dept_code'];?></td>
							<td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="teacher_id" data-toggle="modal" data-id="<?php echo $val['dept_id'];?>"data-target="#myModal-<?=$val['dept_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
					</li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_department/'.$val['dept_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                          </tr>
<!-- Modal edit class-->
	<div id="myModal-<?=$val['dept_id']?>" class="modal fade" role="dialog">
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
	<!--------end modal-------------->
<?php endforeach;?>
            </tbody>
         </table>
			</div>
<!----list End--->
 <!----Add Class---->
			<div class="tab-pane box col-md-12" id="add">
                <div class="box-content">
				</br>
				 <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-cog"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Add Department</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  </br>
		   <?php $attributes = array("name" => "department_add");
           echo form_open("Admin/department_add", $attributes);?>
                	<div class="padded">
                     <div class="col-md-12">
                      <div class="col-md-4">
                     <div class="form-group">
                                <label class="col-sm-12 control-label">Department Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required name="dept_name"  data-validate="required"/>
									
                                </div>
							</div>
              </div>
              <div class="col-md-4">
							 <div class="form-group">
							 <label class="col-sm-12 control-label">Department Code </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required name="dept_code"/>
                                </div>
								
                            </div>
							</div>
               <div class="col-md-4">
						 <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
						<br>
                                  <button type="submit" class="btn btn-warning">&nbsp;Add Department&nbsp;</button>
                              </div>
							</div>
              </div>
							
                 </div>   </div>  <?php  echo form_close(); ?>              
			</div>
			<!----CREATION FORM ENDS-->
		</div>
      </div> </div>   </div>        
           
 </section>
</div>
<!----get class_id-------->
  <script>
$('.teacher_id').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"department_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
	
</script>