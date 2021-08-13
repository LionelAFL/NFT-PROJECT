<?php
session_start();
include('../database.inc.php');
include('../function.inc.php');
include('../constant.inc.php');

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

if(!isset($_SESSION['IS_LOGIN'])){
	redirect('login.php');
}
$page_title='';
if($cur_path=='' || $cur_path=='index'){
	$page_title='Dashboard';
}elseif($cur_path=='web_info'){
	$page_title='Site settings';
}elseif($cur_path=='social'){
	$page_title='Social';
}elseif($cur_path=='contact'){
	$page_title='Contact';
}elseif($cur_path=='faq'){
	$page_title='Faq settings';
}elseif($cur_path=='email'){
	$page_title='Email settings';
}elseif($cur_path=='details'){
	$page_title='Page settings';
}elseif($cur_path=='user'){
	$page_title='Users';
}elseif($cur_path=='asset'){
	$page_title='Assets';
}elseif($cur_path=='profile'){
	$page_title='Profile';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
	<?php
					$sql="select * from info ";
					$res=mysqli_query($con,$sql);
					 ?>
					 <?php
		while($row=mysqli_fetch_assoc($res)){?>
	<meta content="<?php echo $row['meta_tag']?>" name="description">
<!--        <meta  name="hosting-dcv"  content="69c0c54aa0a52d52619a7006633e7858-34251f765d2ed6df619c8aa38c878d27">-->

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['favicon']?>" sizes="32x32">
	<link rel="apple-touch-icon" href="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['favicon']?>">
<?php } ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
	<link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>

        </ul>
				<?php
								$sql="select * from details ";
								$res=mysqli_query($con,$sql);
								 ?>
								 <?php
					while($row=mysqli_fetch_assoc($res)){?>
				<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo']?>" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo']?>" alt="logo"/></a>
        </div>
			<?php } ?>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['ADMIN_USER']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="profile">
                <i class="mdi mdi-logout text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>

          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

					<li class="nav-item">
            <a class="nav-link" href="user">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>

					<li class="nav-item">
            <a class="nav-link" href="asset">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Assets</span>
            </a>
          </li>

		  <li class="nav-item drop">
            <a class="nav-link" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
						<ul class="drop-content" aria-labelledby="dropdownMenu">
							<li><a class="nav-link mdi mdi-view-headline menu-icon" href="web_info">Site Settings</a></li>
							<li><a class="nav-link mdi mdi-view-headline menu-icon" href="details">Page Settings</a></li>
							<li><a class="nav-link mdi mdi-view-headline menu-icon" href="email">Email Settings</a></li>
							<li><a class="nav-link mdi mdi-view-headline menu-icon" href="faq">Faq Settings</a></li>
						</ul>
          </li>
					<li class="nav-item">
		            <a class="nav-link" href="social">
		              <i class="mdi mdi-view-headline menu-icon"></i>
		              <span class="menu-title">Social Settings</span>
		            </a>
		          </li>
		  <li class="nav-item">
            <a class="nav-link" href="contact">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Contact Us</span>
            </a>
          </li>



        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
