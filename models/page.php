<?php
  class Page {
    
    public function all() {
		echo 'model';  die();
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM project');
	
      // we create a list of Post objects from the database results
     
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);
    }
  }
?>
