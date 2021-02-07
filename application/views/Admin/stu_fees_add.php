<script language="Javascript">
 function FillBilling(f) 
 {
 if(f.billingtoo.checked == true) 
 {
 f.address2.value = f.address1.value; 
 
 } 
 else 
 { 
 f.address2.value = "";
 
 } 
 }
 </script>
<style type="text/css">
.thumbimage {
    float:left;
    width:100px;
    position:relative;
    padding:5px;
}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Student</a></li>
      </ol>
    </section>
    <!-- Main content --> <h4><?php echo $this->session->flashdata('msg'); ?></h4><br>
    <section class="content">

      <!-- Default box -->
      <div class="box-body">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Fees</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php $attributes = array("name" => "news");
                echo form_open_multipart("Admin/addstudent_fees_process", $attributes);?>
             
                <!-- text input -->
				 <?php
		  
         foreach ($student as $row)  
         { ?>
				<div class="col-md-12">
				 <div class="form-group col-md-6">
                  <label>Admission Number</label>
                  <input type="text" class="form-control" placeholder="" name="admno"  value="<?php echo $row->stud_admno;?>" readonly>
				
                </div>
             	<div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="" name="stdname"  value="<?php echo $row->stud_name;?>" readonly>
				 
                </div>
				 <?php } ?>
				<div class="form-group col-md-6">
                  <label>Total Fees</label>
                  <input type="number" class="form-control" placeholder="" name="fees"  value="" required>
				
                </div>
					
				</div>
		<div class="form-group col-md-6">
                  <button type="submit" class=" btn btn-warning">Submit</button>
              
                </div>
               <?php echo form_close(); ?>
				
		
				
									
			
                
            </div>
            <!-- /.box-body -->
          </div>
		
        </div>
        <!-- /.box-body -->
      
        <!-- /.box-footer-->
      
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /.content-ends -->
<script type="text/javascript">
 $(".imageupload").on('change', function () {
 
     var countFiles = $(this)[0].files.length;
 
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image");
     image_holder.empty();
 
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
 
             for (var i = 0; i < countFiles; i++) {
 
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumbimage"
                     }).appendTo(image_holder);
                 }
 
                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }
 
         } else {
             alert("It doesn't supports");
         }
     } else {
         alert("Select Only images");
     }
 });
 </script>
