<!DOCTYPE html>
<html>

<head>
<style>
table, th, td {
    border: 1px solid black;
   
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}

</style>
</head>

<body>
<?php if(isset($students)): ?>
        
		
		<center><u><h1>Fees Details</u></center></h1>
	 <h4> <?php echo $stud_name;?><br/>
			 Admission no:<?php echo $stud_addm;?><br/>
			 <?php echo $stud_course;?>&nbsp;&nbsp;<?php echo $stud_sem;?>&nbsp;&nbsp;<?php echo $stud_batch;?><br/>
			 <span style="color:red;">Total Fees amount:Rs.<?php echo $fees_amt;?>&nbsp;&nbsp;Due amount:Rs.<?php echo $fees_due;?></span>  
			  </h4>
           
              <table id="t01" border="1" style="width:100%">

                <thead>
                <tr>
                    <th>Serial no</th>               
                  <th>Date of Payment</th>
                  <th>Fees Amount Paid</th>
                  <th>Fine(If Any)</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php
		
                $i=1;    
         foreach ($students as $row)  
         { 
			
				
          ?>
               <tr>
                
                 <td><?php echo $i++;?></td>
                  <td><?php echo $row['fee_pay_date']; ?></td>
					<td><?php echo  $row['fee_pay_amount'];?></td>
                  <td><?php echo  $row['fee_pay_fine'];?></td>
				
            
                </tr>
             
              <?php 
              }
              ?>  
            </tbody>
          </table>
         

<?php endif; ?>
 
</body>
</html>

