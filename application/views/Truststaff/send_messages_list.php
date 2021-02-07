<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-warning">
        <div class="panel-heading">
            <h4>Sent Messages</h4>
            </div>

	<hr>		
 <table class="table table-striped table-bordered user_list">
                      <thead>
                        <tr>
						
                         <th>Sl No:</th>
                         <th>Sent Date</th>
                         <th>Subject</th>
                         <th>Message</th>
						 </thead>
						 <tbody>
                        <?php 
						$i=1;
						foreach($messages as $row){?>
				 <tr>
            	   <td><?php echo $i++;?></td>
				   <td><?php echo $row['m_date']; ?> </td>
				   
				   <td><?php echo $row['m_subject'];?></td>
				   <td><?php echo $row['message']; ?></td>
				  
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