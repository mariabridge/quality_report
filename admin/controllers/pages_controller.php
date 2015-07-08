<?php
  class PagesController {
	  
    
    public function index() {
    
	//echo 'Project Created successfully';	  
	 //  require_once('views/pages/index.php');
    }
	
   public function home() {
          
           session_unset();
          
	  require_once('views/pages/home.php');
    }
	
	

    public function error() {
      require_once('views/pages/error.php');
    }

    
    public function createform()
    {
        
        if(isset($_POST) && !empty($_POST))
        {
            $proj_name = $_POST['proj_name'];
            
            if(!empty($_POST['proj_name']))
            {
                
              $project_exist = Project::findByattr($proj_name);
              
              if($project_exist)
              { 
                  $msg=0;
                
                 $this->redirecturl('pages', 'home', '0');  
              }
              else
              {
              $project = Project::insert($proj_name);
                              
                if($project==true)
                {    
                
                $msg=1;
               
               $this->redirecturl('pages', 'home', '1');
                
                }
//                else{
//                     $_SESSION['success']=0;
//                 require_once('views/pages/home.php');
//                }
              }     
            }
        }
        else
        {
             $msg=0;
             $this->redirecturl('pages', 'home', '0');
              
        }
        
      
    }
    
    public function createstatus()
    {
        
        $projects = Project::all();
      
        require_once('views/pages/status.php');
    }
    
    
    public function savestatus()
    {
        $projects = Project::all();
        $pr_id = $_POST['project_list'];
        $dateofbug = $_POST['datepicker'];
        $bugs = $_POST['bugs'];
        
        $exst = Project::checkBugsbypro($pr_id, $dateofbug);
        
        if($exst)
        {
            $update = Project::updateBugsbypro($bugs, $pr_id, $dateofbug);
            if($update)
            $this->redirecturl('pages', 'createstatus', 'true');
            else
               $this->redirecturl('pages', 'createstatus', 'false'); 
        }
        else
        {
        $bugsave = Project::insertBugs($pr_id, $dateofbug, $bugs);
        
        
        if($bugsave)
         $this->redirecturl('pages', 'createstatus', 'true');
        }
    }
    
    public function reportdata()
    {
        
        require_once('views/pages/reportinput.php');
    }
	
     public function redirecturl($controller, $action, $params=null)
     {
         $baseurl = BASE_URL;
         
         $fullurl = $controller.'&action='.$action;
         if($params!=null)
             $fullurl.='&params='.$params;
         
          header('Location: '.$baseurl.'?controller='.$fullurl);
     }

    /** Author : maria**/
     public function current_report() {
        $this->redirecturl('reports', 'getCurrentReport' ,'1');
        
    }
     public function delete_project(){
      $projects = Project::all();
      //print_r($projects);die;
      require_once('views/pages/project_action.php');
     }

      public function delete(){
       $project =Project::deleteById($_GET['id']);
       $this->redirecturl('pages', 'delete_project');
      //print_r($projects);die;
      //require_once('views/pages/project_action.php');
     }

     public function adminarea(){

     }



 /** Author : maria**/

	
  }
?>