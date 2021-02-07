 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Admin</a></li>
      </ol>
    </section>


<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Welcome Admin..</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Started creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--div><?php echo $this->session->flashdata('msgs'); ?></div-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      <div class="col-md-7 col-md-offset-2">
       <div class="box box-warning">
        <div class="box-header with-border">
          <center><h3 class="box-title wa"><b>SN TRUST ALLOTED FUND</b> </h3></center>

           </div>
       
     <?php    
                                foreach ($fund as $row)  
                                { ?>
           <div><center><h3 class="box-title"><br><b style="font-size:17px;">Your college is alloted with a <u>fund of &nbsp;<i class="fa fa-inr"></i><?php echo $row->amount;?>/- </u>&nbsp;for the year&nbsp<?php echo  date("Y");?>.</b></h3></center></div>
      <?php }
                    ?>
                     <hr>
                    </div>

                    </div>
                    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 