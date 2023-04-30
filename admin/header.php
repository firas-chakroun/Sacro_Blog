<?php
include "../connect.php";
session_start();
if (!isset($_SESSION['SESS_FIRST_NAME'])) {
	header("location: sign-in.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>

	<title>admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<!-- chart -->
	<script src="js/Chart.js"></script>
	<!-- //chart -->
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="css/AdminLTE.min.css" type='text/css' />

	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!--//end-animate-->
	<!----webfonts--->
	<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic'
		rel='stylesheet' type='text/css'>
	<!---//webfonts--->
	<!-- Meters graphs -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- Placed js at the end of the document so the pages load faster -->
	<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
	<!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    /> -->
	<script src="../admin/ckeditor/ckeditor.js"></script>

</head>

<body class="sticky-header left-side-collapsed" onload="initMap()">
	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">

				<h1><a href="index.php">Blog </a></h1>

			</div>
			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li class=""><a href="all-tags.php"><i class="lnr lnr-tag"></i><span>All Tags</span></a></li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-pencil"></i>
							<span>Manage News</span></a>
						<ul class="sub-menu-list">
							<li><a href="compose-news.php">Compose News</a> </li>
							<li><a href="all-news.php">All News</a></li>
						</ul>
					</li>
					<li class="menu-list"><a href="#"><i class="fa fa-globe"></i> <span>Manage Events</span></a>
						<ul class="sub-menu-list">
							<li><a href="add-event.php">New Event</a> </li>
							<li><a href="all-events.php">All Events</a></li>
						</ul>
					</li>
					<li class="menu-list"><a href="#"><i class="fa fa-user"></i> <span>Manage blogeur</span></a>
						<ul class="sub-menu-list">
							<li><a href="add-admin.php">Add New</a> </li>
							<li><a href="adminlist.php">Blogeurs List</a> </li>
						</ul>
					</li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>LogOut</span></a></li>
				</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="main-header">

				<!--toggle button start-->
				<!-- <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a> -->
				<!--toggle button end-->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../uploads/<?php echo $_SESSION['SESS_PRO_PIC'] ?>" class="user-image"
									alt="User Image">
								<span class="hidden-xs">
									<?php echo $_SESSION['SESS_FIRST_NAME'] ?>
								</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="../uploads/<?php echo $_SESSION['SESS_PRO_PIC'] ?>" class="img-circle"
										alt="User Image">

									<p>
										<?php echo $_SESSION['SESS_FIRST_NAME']; ?>

									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<a href="#profile" data-toggle="modal" class="btn btn-default btn-flat"
											id="admin_profile">Update</a>
									</div>
									<div class="pull-right">
										<a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!--notification menu start -->
				<!--notification menu end -->
			</div>

			<!-- //header-ends -->
			<?php include 'profile_modal.php'; ?>