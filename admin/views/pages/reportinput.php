<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form method="post" action="?controller=reports&action=index" onsubmit="return validateReportForm();">
    
    <table>
        <tr>
            <td>
                <label>Select From Date</label>
            </td>
            <td>
               <input type="text" id="datepickerfrom" value="" name="datepickerfrom">  
            </td>
        </tr>
        <tr>
            <td>
                <label>Select To Date</label>
            </td>
            <td>
              <input type="text" id="datepickerto" value="" name="datepickerto"> 
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                 <input type="submit" value="Generate Report" class="buttonClass">
            </td>
        </tr>
    </table>
        
    
    
</form>