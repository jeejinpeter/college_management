
        <div class="col-md-8 col-md-offset-1">
          <div class="panel panel-warning">
            <div class="box-header">
			  <div class="info-box-content ">
            <span class="info-box-text"><h3>Send Message</h3></span>
            </div>
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
                <?php $attributes = array("name" =>"subject_add");
           echo form_open("Truststaff/send_message_to_admin", $attributes);?>
<div class="col-md-12">
  <div class="form-group">
                <label>Subject</label>
           <input type="text" name="sub" class="form-control" required>
                 <span class="text-danger"><?php echo form_error('sub'); ?> </span>
              </div>

              <div class="form-group">
                <label>Message</label>
           <textarea name="message" class="form-control" rows="5" style="resize:none;"></textarea> 
                 <span class="text-danger"><?php echo form_error('message'); ?> </span>
              </div>
               <div class="col-md-offset-5">
         <button type="submit" class="btn btn-success">Send</button>
          <button type="submit"  onclick="cancelFunction()"  class="btn btn-warning">Cancel</button>
      </div> 
</div>
           <?php echo form_close(); ?> 
          </div>
      </div>
      </div>