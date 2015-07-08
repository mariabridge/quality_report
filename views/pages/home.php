<form method="post" action="?controller=pages&action=createform" onsubmit="return validateCRPForm();" id="create_projct_form" >
   
    <?php if(isset($_GET['params'])&& $_GET['params']=='1') {
        
         echo '<p class="confirm">Project created successfully</p>';
    }
   if(isset($_GET['params']) && $_GET['params']== '0') {
         echo '<p class="error_msg">Project already exist</p>';
    }
?>
    <table>
        <tr>
            <td><label>Project Name: </label>
            <td> <input type="text" value="" id="proj_name"  name="proj_name"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" class="buttonClass" \></td>
        </tr>
       
      
    
   </table>
</form>

