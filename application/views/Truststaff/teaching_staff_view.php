<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-warning">
        <div class="panel-heading">
            <h4>Teaching Staff List</h4>
            </div>

	<hr>		
 <table class="table table-striped table-bordered user_list">
                      <thead>
                        <tr>
						
                         <th>Sl No:</th>
                         <th>Staff Name</th>
                         <th>Staff Address</th>
                         <th>Contact Number</th>
                         <th>Date of Birth</th>
                         <th>Date of Joining</th>
                         <th>Staff Image</th>
						 </thead>
						 <tbody>
                        <?php 
						$i=1;
						foreach($teacher as $row){?>
				 <tr>
            	   <td><?php echo $i++;?></td>
				   <td><?php echo $row['staff_name']; ?> </td>
				   <td><?php echo $row['staff_address']; ?>, <?php echo $row['staff_place']; ?>,<br> <?php echo $row['staff_district']; ?>, <?php echo $row['staff_state']; ?></td>
				   <td><?php echo $row['staff_ph_number']; ?> </td>
				   
				   <td><?php echo $row['staff_dob'];?></td>
				   <td><?php echo $row['staff_join_date']; ?></td>
				  <td> <img src="<?php echo base_url("./resource/uploads/");  if($row['staff_img']) echo $row['staff_img']; else echo "noimages.png"; ?>" alt="" height="25" width="25"/></td>
			</tr>
							<?php
							 }
							  ?>  

 </tbody>
</table>

<form>
</div>
</div>
</div>
<script>
$(document).ready(function() {
my_table = $(".user_list").dataTable({
"fnRowCallback": function (nRow, aData, iDisplayIndex) {
$("td:first", nRow).html(iDisplayIndex + 1);
return nRow;
},
});
});
  </script>