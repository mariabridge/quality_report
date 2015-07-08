<?php
/**
controller to get analtics of test reports
Created by @Soumya
Date: 29/06/2015
*/
class ReportsController {
/**
** Function to plot graphs
***/

public function index() {

  if(isset($_POST) && !empty($_POST['datepickerfrom']) && !empty($_POST['datepickerto']))
  {
    echo $datefrom = $_POST['datepickerfrom'];
    $dateto = $_POST['datepickerto'];
  }


  $projectsArray = Project::all();

  /**Get all projects from databa se */
  $result_array =Report::all();
  if(!empty($result_array))
  {
    foreach($result_array as $key=>$res)
    {
      $project[$key]['name'] = $res['name'];
      $projects[$key]['id'] = $res['id'];

      $COL_MIN_AVG= 64;
        $COL_MAX_AVG= 192;
        $COL_STEP=16;
       $range = $COL_MAX_AVG - $COL_MIN_AVG;
        $factor = $range / 256;
        $offset = $COL_MIN_AVG;

        $base_hash = substr(md5($res['name']), 0, 6);
        $b_R = hexdec(substr($base_hash,0,2));
        $b_G = hexdec(substr($base_hash,2,2));
        $b_B = hexdec(substr($base_hash,4,2));

        $f_R = floor((floor($b_R * $factor) + $offset) / $COL_STEP) * $COL_STEP;
        $f_G = floor((floor($b_G * $factor) + $offset) / $COL_STEP) * $COL_STEP;
        $f_B = floor((floor($b_B * $factor) + $offset) / $COL_STEP) * $COL_STEP;
      
       $colorcode  = sprintf('#%02x%02x%02x', $f_R, $f_G, $f_B);

      $project[$key]['color'] = $colorcode;
    }

  }
  else
  {
    echo '<p class="error_msg">No data available in this range</p> <p>Please click <a href="?controller=pages&action=reportdata">Report</a> to select another range</p>';
    exit;
  }


  $date_range = $this->getDatesFromRange($datefrom, $dateto);

  $xaxis_data = json_encode($date_range);

  for($rs=0; $rs<count($project); $rs++)
  {
    foreach($date_range as $dt)
    {

      $bugs[$rs] = Report::find($projects[$rs]['id'],$dt);
      $project[$rs]['data'][] = intval($bugs[$rs][$projects[$rs]['id']]['bugs']);
    }



  }


  $result_array = json_encode($project);

  require_once('views/reports/index.php');
}

/* public function show() {
// we expect a url of form ?controller=posts&action=show&id=x
// without an id we just redirect to the error page as we need the post id to find it in the database
if (!isset($_GET['id']))
return call('pages', 'error');

// we use the given id to get the right post
$post = Post::find($_GET['id']);
require_once('views/reports/show.php');
} */




function getDatesFromRange($start, $end){



  $datediff = strtotime($end) - strtotime($start);
  $datediff = floor($datediff/(60*60*24));
  for($i = 0; $i < $datediff + 1; $i++){
    $dates[] = date("d-m-Y", strtotime($start . ' + ' . $i . 'day'));
  }

  return $dates;
}

    /** Author : maria
    Date :  08/07/2015 **/

public function getCurrentReport(){

  $datefrom =  date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")-14, date("Y")));
  $dateto = date("d-m-Y");
  $projectsArray = Project::all();

  /**Get all projects from databa se */
  $result_array =Report::all();
  if(!empty($result_array))
  {
    foreach($result_array as $key=>$res)
    {
      $project[$key]['name'] = $res['name'];
      $projects[$key]['id'] = $res['id'];

        $COL_MIN_AVG= 64;
        $COL_MAX_AVG= 192;
        $COL_STEP=16;
       $range = $COL_MAX_AVG - $COL_MIN_AVG;
        $factor = $range / 256;
        $offset = $COL_MIN_AVG;

        $base_hash = substr(md5($res['name']), 0, 6);
        $b_R = hexdec(substr($base_hash,0,2));
        $b_G = hexdec(substr($base_hash,2,2));
        $b_B = hexdec(substr($base_hash,4,2));

        $f_R = floor((floor($b_R * $factor) + $offset) / $COL_STEP) * $COL_STEP;
        $f_G = floor((floor($b_G * $factor) + $offset) / $COL_STEP) * $COL_STEP;
        $f_B = floor((floor($b_B * $factor) + $offset) / $COL_STEP) * $COL_STEP;
      
       $colorcode  = sprintf('#%02x%02x%02x', $f_R, $f_G, $f_B);

      $project[$key]['color'] = $colorcode;
    }

  }
  else
  {
    echo '<p class="error_msg">No data available in this range</p> <p>Please click <a href="?controller=pages&action=reportdata">Report</a> to select another range</p>';
    exit;
  }


  $date_range = $this->getDatesFromRange($datefrom, $dateto);

  $xaxis_data = json_encode($date_range);

  for($rs=0; $rs<count($project); $rs++)
  {
    foreach($date_range as $dt)
    {
         
         
       // print_r($colorcode);
      $bugs[$rs] = Report::find($projects[$rs]['id'],$dt);
      $project[$rs]['data'][] = intval($bugs[$rs][$projects[$rs]['id']]['bugs']);
     
    }



  }
  //echo "<pre>";
  //print_r($project);
  $result_array = json_encode($project);
//print_r($result_array);
  require_once('views/reports/index.php');

}

}
?>