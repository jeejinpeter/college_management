<script src="<?php echo  base_url('resource/bootstrap/js/zoomify.min.js'); ?>"></script>
<link href="<?php echo  base_url('resource/css/zoomify.min.css'); ?>" rel="stylesheet">

<style>
.green{color:#ff0c0c !important}
.red{color:#59d32c !important;}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	<div class="row">
			
		</div><!--/.row-->	
<!--/.row-->

<!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Timetable</h1>
				
			</div>
		</div><!--/.row-->	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Timetable</div>
					<div class="panel-body">
					<table id="Table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						<th>Sl. No:</th>
                        <th>Course</th>                                
                        <th>Semester</th>
                        <th>Timetable</th>
					    <th>Downloadable Link</th>    
                        </tr>
                      </thead>
<tbody>

 <?php
                $i=1;    
         foreach ($rout->result() as $row)  
         { 
          ?>
                <tr>
                  <td><?php echo $i++;?></td>
                 
                  <td><?php echo $row->c_name;?></td>
				  <td><?php echo $row->sem_name;?></td>
                    <td><img class="myImage" width="60px" height="50px" src="<?php echo base_url("resource/uploads/"); if($row->timetable) echo $row->timetable; else echo "no-user.jpg"; ?>"></td>
                  <td><a href="<?php echo base_url('Staff/timetable_download/'.$row->timetable); ?>" ><strong><?php echo $row->timetable; ?></td>
							  
                  
   
	
	
               
              </tr>
			 
   
		   
	<?php }  
         ?>  
				
				
      <!--price_wrap_start-->

	 
	</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
		 <script type="text/javascript">
      $('img.myImage').zoomify(); 
    </script> 
		<!--/.row-->	
		<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});

$(document).ready(function(){
    $('#Table').DataTable();
});
</script>