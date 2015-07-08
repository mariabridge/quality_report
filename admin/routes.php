<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
          require_once('models/project.php');
        $controller = new PagesController();
      break;
      case 'reports':
        // we need the model to query the database later in the controller
          require_once('models/project.php');
        require_once('models/report.php');
        $controller = new ReportsController();
      break;
    }

    $controller->{ $action }();
  }

  $arr = array('index', 'home', 'error',  'createform', 'createstatus', 'savestatus','reportdata' ,'current_report' ,'delete_project','delete');
  $arr2 = array('index', 'show' ,'getCurrentReport');
  
  
  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => $arr, 'reports' => $arr2);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>