<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Bugs entry</h1>
<?php 
if(isset($_GET['params']) && $_GET['params']=='true')
echo '<p class="confirm"><strong>Saved successfully</strong></p>';
if(isset($_GET['params']) && $_GET['params']=='false')
echo '<p class="error_msg"><strong>Bugs report on this date is already entered.</strong></p>'; 
    
?>
<form method="post" action="?controller=pages&action=savestatus" onsubmit="return validateStatusPForm();">
    
   <table>
        <tr>
            <td>
                <label>Select Project</label> 
            </td>
            <td>
               <select id="project_list" name="project_list">
                   <option value="">Select a Project</option>
                <?php foreach($projects as $prj) { ?>
                   <option value="<?php echo $prj['id']; ?>"><?php echo $prj['name']; ?></option>
                <?php } ?>           
               </select> 
            </td>
        </tr>
        
        <tr>
            <td>
                 <label>Select Date</label> 
            </td>
            <td>
                <input type="text" id="datepicker" value="" name="datepicker"> 
            </td>
        </tr>
        
        <tr>
            <td>
                <label>No. of Bugs </label>
            </td>
            <td>
                  <input type="text" id="bugs" value="" name="bugs" id="bugs">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>  <input type="submit" value="Submit" class="buttonClass"></td>
        </tr>
        
    </table>
    
    
</form>
