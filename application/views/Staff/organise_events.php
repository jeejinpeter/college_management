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
				<h1 class="page-header">Events List</h1>
				
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Events List</div>
					<div class="panel-body">
						<table id="example1"class="table table-hover">
                      <thead>
                        <tr>
						<th><div>Sl. No:</div></th>
                    	<th><div>Event</div></th>
                    	 <th><div>Venue & Time</div></th>
                        <th><div>Photo</div></th>
                        </tr>
                      </thead>
<tbody>
				 <?php 
					 $i=1;    
					foreach($event as $val){?>
                    	 <tr>
							<td><?php echo $i++;?></td>
                            <td><?php echo $val['event_name'];?></td>
							</td>
              <td><?php echo $val['event_place'];?>, on <?php echo $val['event_date'];?></td>
              <td><img src="<?php echo base_url("resource/images/"); 
             if($val['event_img']) echo $val['event_img']; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/></td>
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
		<!--/.row-->	