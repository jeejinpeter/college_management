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
        
		<center><u><h1>Student's List- Pending Fees</u></center></h1>
	 <h4> <?php echo $c_name;?>&nbsp;&nbsp;<?php echo $s_name;?><br/><?php echo $b_name;?>
			  </h4>
           
              <table id="t01" border="1" style="width:100%">

                <thead>
                <tr>
                    <th>Admission No</th>
                  <th>Student's Name</th>                  
                  <th>Fees Amount</th>
                  <th>Fees pending</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php
		
              
         foreach ($students as $row)  
         { 
			
				
          ?>
               <tr>
                
                 <td> <?php echo $row['stud_admno'];?></td>
                  <td><?php echo $row['stud_name'];?></td>
                  <td><?php echo $row['cfees_amount'];?></td>
                  <td><?php echo $row['cfees_dues'];?></td>
				
            
                </tr>
             
              <?php 
              }
              ?>  
            </tbody>
          </table>
         

<?php endif; ?>
 
</body>
</html>

