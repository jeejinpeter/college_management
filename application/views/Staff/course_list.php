<div class="content-wrapper col-md-offset-1">
<style>
 .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
 background-color:#ea9f16;
 }
 </style>
   
      <section class="content co-md-12 col-md-offset-1">
       <h3 class="box-title col-md-offset-1">Select Course Type</h3>
       <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <div class="box-body">
			<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;semester</i> 
				</a></li>
			<li><a href="#add" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;Year</i>
				</a></li>
		    </ul>
			</br>
			 <div class="tab-content">
   <!----Listing class-->
            <div class="tab-pane box active" id="list">
				  <table   class ="table table-bordered table-hover expenses_table"  border="1">
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
                  <button type="button" class="btn btn-warning color-palette">Actions</button>
                  <button type="button" class="btn btn-warning color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="semester_id" data-toggle="modal" data-id="<?php echo $val['course_id'];?>"data-target="#myModal-<?=$val['course_id']?>"><i class="fa fa-eye" aria-hidden="true"></i>View More</a>
					</li>
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
                	 <table  class ="table table-bordered table-hover expenses_table" >
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
                  <button type="button" class="btn btn-warning color-palette">Actions</button>
                  <button type="button" class="btn btn-warning color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="course_id" data-toggle="modal" data-id="<?php echo $list['course_id'];?>"data-target="#myyearModal-<?=$list['course_id']?>"><i class="fa fa-eye" aria-hidden="true"></i>View More</a>
					</li>
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
      </div> </div>   </div>        
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
