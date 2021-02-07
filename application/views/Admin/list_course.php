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
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
       <h3 class="box-title">Select Course Type</h3>
       <div class="row">
        <div class="col-xs-12">
           <div class="box-body">
			       <ul class="nav nav-tabs bordered">
			          <li class="active">
            	     <a href="#list" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;Semester</i> 
				          </a>
                </li>
			          <li><a href="#add" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;Year</i>
				            </a>
                </li>
		        </ul>
			</br>
			 <div class="tab-content">
   <!----Listing class-->
            <div class="tab-pane box active" id="list">
				 <table id="example1" class="table table-bordered table-hover">
                	<thead>
                		<tr>
                    	<th><div>Course Name</div></th>
                    		<th><div>Category</div></th>
                    		<th><div>Duration</div></th>
							          <th><div>Action</div></th>
							
                    	</tr>
					</thead>
                    <tbody>
					<?php foreach($list as $val):?>
                    	 <tr>
                            <td><?php echo $val['c_name'];?></td>
							<td><?php echo $val['c_category'];?></td>
							<td><?php echo $val['c_duration'];?></td>
							<td><div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="semester_id" data-toggle="modal" data-id="<?php echo $val['course_id'];?>"data-target="#myModal-<?=$val['course_id']?>"><i class="fa fa-eye" aria-hidden="true"></i>View More</a>
					</li>
					<li>
				    <a href="<?php echo base_url('Admin/edit_semester_details/'.$val['course_id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Update</a>
					</li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_course/'.$val['course_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                          </tr>
<!-- Modal view semester-->
	<div id="myModal-<?=$val['course_id']?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Semester Details</h4>
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
			<div class="tab-pane box" id="add">
                	 <table id="example2" class="table table-bordered table-hover">
                	<thead>
                		<tr>
                    	<th><div>Course Name</div></th>
                    		<th><div>Category</div></th>
                    		<th><div>Duration</div></th>
							<th><div>Action</div></th>
							
                    	</tr>
					</thead>
                    <tbody>
					<?php foreach($year as $list):?>
                    	 <tr>
                            <td><?php echo $list['c_name'];?></td>
							<td><?php echo $list['c_category'];?></td>
							<td><?php echo $list['c_duration'];?></td>
							<td><div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="course_id" data-toggle="modal" data-id="<?php echo $list['course_id'];?>"data-target="#myyearModal-<?=$list['course_id']?>"><i class="fa fa-eye" aria-hidden="true"></i>View More</a>
					</li>
					<li>
				    <a href="<?php echo base_url('Admin/edit_year_details/'.$list['course_id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Update</a>
					</li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_course/'.$list['course_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                          </tr>
<!-- Modal view year-->
	<div id="myyearModal-<?=$list['course_id']?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Year Details</h4>
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
			<!----CREATION FORM ENDS-->
		</div>
      </div> 
    </div>
    </div>
    </div>
    </section>
    </div>
<!----get class_id-------->
  <script>
$('.semester_id').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"semester_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script>

<script>
$('.course_id').click(function()
    {
        var Id=$(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"year_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script>
