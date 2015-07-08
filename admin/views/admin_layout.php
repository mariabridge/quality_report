<!DOCTYPE HTML>
<html>
	<head>
        
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Quality Testing Report</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	 <script type="text/javascript" src="../js/jsvalidation.js"></script>
         
	 </head>
	<body>
    <header>
      
     <h1>Quality Analysis - Admin Panel</h1>

        <div id="menu_nav">
        <ul>
       <!--  <li><a href="<?php //echo BASE_URL; ?>">Home</a></li> -->
       <li><a href="<?php echo BASE_URL; ?>">Admin</a></li>
       <ul>
        <li><a href="<?php echo BASE_URL; ?>?controller=pages&action=home">Create Project</li></a>
        <li><a href="<?php echo BASE_URL; ?>?controller=pages&action=createstatus">Add Entry for Bugs</a></li>
       </ul> 
        <li><a href="<?php echo BASE_URL; ?>?controller=pages&action=reportdata">Select Date Range</a></li>
        <li><a href="<?php echo BASE_URL; ?>?controller=pages&action=current_report">Report</a></li>
        <li><a href="<?php echo BASE_URL; ?>?controller=pages&action=delete_project">Delete Projects</a></li>
        


        <!--<li><a href="?controller=reports&action=index">Generate Report</a></li>-->
        </ul>
        </div>
     
    </header>

    <?php  require_once('routes.php'); ?>
	
     <script src="http://code.highcharts.com/highcharts.js"></script>
     <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <div class="footer">
     Quality Report - For Freedom Finance team
    </div>
	
  <body>
<html>
    
 