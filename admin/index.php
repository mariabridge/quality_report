<?php

  ini_set('display_errors','off');
  
  define('BASE_URL', 'http://localhost/report/admin/');
 
  ?>

  <?php
  require_once('connection.php');
   if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'index';
  }
   ob_start();
  session_start();
  require_once('views/admin_layout.php');
?>