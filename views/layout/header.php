<?php session_start();
  require_once("configs/config.php");
  require_once("helpers/helper.php");
  require_once("libraries/library.php");
  require_once("models/model.php");
  require_once("controllers/controller.php");
  
  // if(!isset($_SESSION["uid"])) header("location:$base_url");
  // $uid=$_SESSION["uid"];
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=$base_url?>/assets/images/pills_8507306.png" style="border-radius: 10px;">

    <title>Coup Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?=$base_url?>/assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?=$base_url?>/assets/css/style.css">
	<link rel="stylesheet" href="<?=$base_url?>/assets/css/skin_color.css">
	<link rel="stylesheet" href="<?=$base_url?>/assets/css/custom.css">
	<!-- DataTables CSS -->
    <link rel="stylesheet" href="<?=$base_url?>/assets/cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">	
		<!-- Logo -->
		<a href="index.html" class="logo">
		  <!-- logo-->
		  <div class="logo-mini w-30">
			  <span class="light-logo"><img src="<?=$base_url?>/assets/images/logo-letter.png" alt="logo"></span>
			  <span class="dark-logo"><img src="<?=$base_url?>/assets/images/logo-letter.png" alt="logo"></span>
		  </div>
		  <div class="logo-lg">
			  <span class="light-logo"><img src="<?=$base_url?>/assets/images/logo-dark-text.png" alt="logo"></span>
			  <span class="dark-logo"><img src="<?=$base_url?>/assets/images/logo-light-text.png" alt="logo"></span>
		  </div>
		</a>	
	</div>
	<?php include "navbar.php" ?>
  </header>
  
  <?php include "sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper overflow-visible">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">