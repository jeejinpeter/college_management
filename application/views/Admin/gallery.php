<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Gallery</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Gallery </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addgallery", "class" => "form-horizontal");
                echo form_open("Admin/addgallery", $attributes);?>
              <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="Title" value=""required ="required" >
					 <span class="text-danger"><?php echo form_error('title'); ?></span>
                    </div>
					
                  </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Photo</label>
                   <div class="col-sm-10">
				   <input type="file" name="file" class="imageupload" placeholder="" id="exampleInputFile" value="" required ="required">
                   <span class="text-danger"><?php echo form_error('photo'); ?></span>  
                  </div>				  
                </div>
				          
                           </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
                <button type="submit" class="btn btn-warning">Add Gallery</button>
				<button type="submit"  onclick="cancelFunction()"  class="btn btn-default">Cancel</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
          