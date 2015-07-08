<?php 
/** Author : Maria **/
 ?>
<form method="post" action="?controller=pages&action=createform" onsubmit="return validateCRPForm();" id="create_projct_form" >
   
    <?php /*if(isset($_GET['params'])&& $_GET['params']=='1') {
        
         echo '<p class="confirm">Project created successfully</p>';
    }
   if(isset($_GET['params']) && $_GET['params']== '0') {
         echo '<p class="error_msg">Project already exist</p>';
    }*/
?>
    <table>
        <thead>Delete Projects</thead>
        <tr>
            <td><label>Project Name: </label>
            <td>Actions</td>
        </tr>
        <?php 
        foreach ($projects as $project) {
           ?> 
           <tr>
            <td><label><?php echo $project['name']; ?> </label>
            <td><a onClick="return confirm('Delete this project?')" href="?controller=pages&action=delete&id=<?php echo $project['id']; ?>">Delete</a></td>
        </tr>

       <?php  
    }
        ?>
         
       
        
       
      
    
   </table>
</form>

