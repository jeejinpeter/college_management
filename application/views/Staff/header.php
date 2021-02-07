<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SNGC-Chelannur|Staff</title>
<link rel="shortcut icon" href="<?php echo base_url();?>resource/front/assets/img/icon.png" type="image/x-icon">
<script  src="<?php echo base_url('resource/lumino/js/jquery-2.1.1.min.js');?>"></script>
<link href="<?php echo base_url('resource/lumino/css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('resource/lumino/css/datepicker3.css');?>" rel="stylesheet">
<link href="<?php echo base_url('resource/lumino/css/styles.css');?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo  base_url('resource/css/jquery-ui.css');?>">
<link rel="stylesheet" href="<?php echo  base_url('resource/lumino/datatables/dataTables.bootstrap.css'); ?>">
<script  src="<?php echo base_url('resource/lumino/js/bootstrap.min.js');?>"></script>
<script  src="<?php echo base_url('resource/lumino/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo  base_url('resource/lumino/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo  base_url('resource/lumino/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo  base_url('resource/plugins/jQueryUI/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo  base_url('resource/plugins/jQueryUI/jquery-ui.js'); ?>"></script>
<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
  

<!--Icons-->
 <script  src="<?php echo base_url('resource/lumino/js/lumino.glyphs.js');?>"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style>
.panel-primary>.panel-heading{
background-color: #f1d5a8;
border-color: #f1d5a8;
}
.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus{
background-color: #f1d5a8;
    border-color: #f1d5a8;
}
</style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Welcome</span>&nbsp;&nbsp;Staff</a>
				
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Staff <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('Staff/staff_home_page');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>Home</a></li>
							<li><a href="<?php echo base_url('User/logout');?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<br/><br/>
		<ul class="nav menu">
			<li class="active"><a href="<?php echo base_url('Staff/staff_home_page');?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			
						<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Students  </span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="<?php echo base_url('Staff/list_Admission');?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg>Courses</span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="<?php echo base_url('Staff/course_list'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List
						</a>
					</li>
				</ul>
			</li>
			
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg> Time table</span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li>
						<a class="" href="<?php echo base_url('Staff/timetable_list'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Exam</span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li>
						<a class="" href="<?php echo base_url('Staff/list_exam'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>Marks</span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li>
						<a class="" href="<?php echo base_url('Staff/addmark'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add 
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('Staff/marklist'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-6"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>Student Attendance</span>
				</a>
				<ul class="children collapse" id="sub-item-6">
					<li>
						<a class="" href="<?php echo base_url('Staff/add_stud_attendance'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add 
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('Staff/list_stud_attendance'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-7"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Noticeboard</span>
				</a>
				<ul class="children collapse" id="sub-item-7">
					<li>
						<a class="" href="<?php echo base_url('Staff/notice_list'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-8"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Events</span>
				</a>
				<ul class="children collapse" id="sub-item-8">
					<li>
						<a class="" href="<?php echo base_url('Staff/show_events_page'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-9"><svg class="glyph stroked map"><use xlink:href="#stroked-map"/></svg>Expense</span>
				</a>
				<ul class="children collapse" id="sub-item-9">
					<li>
						<a class="" href="<?php echo base_url('Staff/expense'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add 
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url('Staff/expense_list'); ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List 
						</a>
					</li>
				</ul>
			</li>
		</ul>

	</div><!--/.sidebar-->
