<?php
  class Report {
    
    public static function all() {
		
      $db = Db::getInstance();
      $sql = 'SELECT name, proj_id FROM `project`';
		$result=mysqli_query($db,$sql);


		$result_array = array();
		 $r=0;
		while($row =  $result->fetch_assoc()) {
		   
			$result_array[$r]['name'] = $row["name"];
			$result_array[$r]['id'] = $row["proj_id"];
			$r++;

		}
		
		return $result_array;

   }

    public static function find($id, $dt) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
	  $sql = 'SELECT SUM(bugs) as bugs, date FROM `quality_data` where project_id = '.$id.' and date="'.$dt.'"';
	  

	$result=mysqli_query($db,$sql);

	$result_array = array();

	while($row =  $result->fetch_assoc()) {
		
		if($row['bugs']==null)
			$row['bugs']=0;
		else
			intval($row["bugs"]);
		
		$result_array[$id]['bugs'] = $row['bugs'];
		$result_array[$id]['date'] = $row['date'];
	}
	
	
	  return $result_array;
    }
  }
?>
