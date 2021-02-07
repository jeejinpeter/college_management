
  <div class="col-md-8 col-md-offset-1">
          <div class="panel panel-warning">
            <div class="box-header">
        <div class="info-box-content ">
            <span class="info-box-text"><h3>Expense Details</h3></span>
            </div>
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
	 <?php $attributes = array("name" => "add section");
        echo form_open("Superadmin/get_month_expense", $attributes);?>
       <div class="col-md-7">
        <label>Select a month</label>
        
					<select class="form-control"  name="month">
          <option value="">----Select Month------</option>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
          </select>
          </div>
	<button type="submit" class="btn btn-success" style="margin-top:12px;">Go!</button>
 <?php  echo form_close(); ?> 
</div>
<?php if(isset($expenses)): ?>
<div class="col-md-12 ">

        <div class="col-md-12 ">
		<br/><br/>
          <div class="panel panel-warning">
            <div class="box-header">
			 
           <center><h3>Expense Details for the Month of <?php if($m==1){echo "January"; } elseif($m==2){echo "February"; }elseif($m==3){echo "March"; }elseif($m==4){echo "April"; }elseif($m==5){echo "May"; }elseif($m==6){echo "June"; }elseif($m==7){echo "July"; }elseif($m==8){echo "August"; }elseif($m==9){echo "September"; }elseif($m==10){echo "October"; }elseif($m==11){echo "November"; }elseif($m==12){echo "December"; }?>,  <?php echo $y;?></h3></center>
     
			  <div class="info-box-content col-md-12">
            <span class="info-box-text"><h3> </h3></span>
            </div>
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">

            <a class="btn btn-default" href="<?php echo base_url('Superadmin/generate_expenses_pdf/'.$m); ?>">Convert to PDF</a>
              <table class ="table table-bordered table-hover expenses_table"  border="3">

                <thead>
                <tr> 
                <th>#</th>             
                  <th>Department</th>
                  <th>Date Entered</th>
                  <th>Expense Amount</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php
		    if(!empty($expenses)){
         foreach ($expenses as $row)  
         { 
			?>
               <tr>
               <td></td>
                  <td><?php echo  $row['dept_name']; ?></td>
					        <td><?php echo  $row['exp_date']; ?></td>
                  <td><?php echo  $row['exp_amount']; ?></td>
				        </tr>
             
              <?php 
              } }
               ?>

            </tbody>
          </table>

          </div>
          </div>
          </div>
          </div>


<?php endif; ?>
	   </div>
     </div>
     </div>
<script>
$(document).ready(function() {
my_table = $(".expenses_table").dataTable({
"fnRowCallback": function (nRow, aData, iDisplayIndex) {
$("td:first", nRow).html(iDisplayIndex + 1);
return nRow;
},
});
});
  </script>