<div class="content-wrapper col-md-offset-1">
<style>
 .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
 background-color:#ea9f16;
 }
 </style>
   
      <section class="content co-md-12 col-md-offset-1">
       <h3 class="box-title col-md-offset-1">Student Lists</h3>
       <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
       <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <div class="box-body">
			
			</br>
			 <div class="tab-content">
   <!----Listing class-->
           
				  <table   class ="table table-bordered table-hover expenses_table"  border="1">
                	<thead>
                		<tr>
                    	<th>Serial no</th>
				  <th>Admission No</th>
                  <th>Name</th>
				  <th>Actions</th>
							
                    	</tr>
					</thead>
                    <tbody>
					<?php 
          $i=1;		 
         foreach ($stu_list as $row)  
         {   
            ?>
                <tr>
				  <td><?php echo $i++;?></td>
					<td><?php echo $row->stud_admno;?></td>				  
                  <td><?php echo $row->stud_name;?></td>
							<td>
  <div class="btn-group">
  <button type="button" class="btn btn-warning btn-flat">Actions</button>
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('Staff/addmark_details/'.$row->student_id); ?>">Mark</a></li>
					</ul>
                </div>


</td>
                          </tr>
<!-- Modal view semester-->
	
	<!--------end modal-------------->
	
		 <?php }?>
            </tbody>
         </table>
		
<!----list End--->
 <!----Add Class---->
			
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
