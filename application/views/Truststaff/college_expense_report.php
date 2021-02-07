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
<?php if(isset($expenses)): ?>
        
		
		<center><u><h1>SNGCAS, Chelannur </u></center></h1>
	 <center><h3>Expense Details for the Month of <?php if($m==1){echo "January"; } elseif($m==2){echo "February"; }elseif($m==3){echo "March"; }elseif($m==4){echo "April"; }elseif($m==5){echo "May"; }elseif($m==6){echo "June"; }elseif($m==7){echo "July"; }elseif($m==8){echo "August"; }elseif($m==9){echo "September"; }elseif($m==10){echo "October"; }elseif($m==11){echo "November"; }elseif($m==12){echo "December"; }?>,  <?php echo $y;?></h3></center>
           
              <table id="t01" border="1" style="width:100%">

                <thead>
                <tr>
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
                  <td><?php echo  $row['dept_name']; ?></td>
                  <td><?php echo  $row['exp_date']; ?></td>
                  <td><?php echo  $row['exp_amount']; ?></td>
                </tr>
             
              <?php 
              } }
               ?>
            </tbody>
          </table>
         

<?php endif; ?>
 
</body>
</html>

