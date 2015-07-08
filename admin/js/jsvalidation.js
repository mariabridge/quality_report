/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
   
//    $( "#datepicker" ).datepicker();
//    
//    $("#datepicker").on("change",function(){
//       
//        var selected = $(this).val();
//        alert(selected);
//    });
var curdate = new Date().toJSON().slice(0,10);

function formatDate(curdate) {
  var p = curdate.split(/\D/g);
return [p[2],p[1],p[0] ].join("-");
}

var currdate = formatDate(curdate);



var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy',

maxDate:currdate
}).val(currdate);
  
var datefrom = $('#datepickerfrom').datepicker({ dateFormat: 'dd-mm-yy'}).val();

var dateto = $('#datepickerto').datepicker({ dateFormat: 'dd-mm-yy',

maxDate: curdate
}).val();



});



function requireValidation(id)
{
    
    if(id=='')
        return false;
    else
        return true;
}

function checkNumber(num)
{
    if(isNaN(num)==true)
    {
        return false;
    }
    else
    {
        
        if(isInt(num))
        return true;
        else
         return false;
    }
}

function isInt(n){
        if(n%1===0 && n!=0)
         return true;
         else
         return false;
}

 function validateCRPForm() {
      
      var proj_name = $('#proj_name').val();
           
       if(requireValidation(proj_name)==false)
       {
          alert("Please enter a valid project name");
           return false;
       }
       else
       {
           return true;
       }
   }
   
   
    function validateStatusPForm()
    {
        var bugs = $('#bugs').val();
      
        var datepicker = $('#datepicker').val();
        var proj = $('#project_list option:selected').val();
        if(requireValidation(proj)==false)
       {
           alert("Please select a project");
           return false;
       }
       else if(requireValidation(datepicker)==false)
       {
           alert("Please enter a valid date");
           return false;
       }
        else if(requireValidation(bugs)==false)
       {
          alert("Bugs field cannot be empty");
           return false;
       } else if(checkNumber(bugs)==false)
       {
          alert("Please enter a valid number on bugs field");
           return false;
       }
       
             
       else 
       {
           return true;
       }
    }
    
    function validateReportForm()
    {
       
         var datepickerfrom = $('#datepickerfrom').val();
         var datepickerto = $('#datepickerto').val();
         
     var datef = datepickerfrom.substring(0, 2);
    var monthf = datepickerfrom.substring(3, 5);
    var yearf = datepickerfrom.substring(6, 10);
 
    var datefCompare = new Date(yearf, monthf - 1, datef);
    
    var datet = datepickerto.substring(0, 2);
    var montht = datepickerto.substring(3, 5);
    var yeart = datepickerto.substring(6, 10);
 
    var datetCompare = new Date(yeart, montht - 1, datet);
   
         
        if(requireValidation(datepickerfrom)==false)
       {
           alert("Please select a From Date");
           return false;
       }
         else if(requireValidation(datepickerto)==false)
       {
           alert("Please select a To Date");
           return false;
       }
       else if(datetCompare<datefCompare)
         {
             alert("The To Date should be a date after from date");
             return false;
         }
         else
         {
             return true;
         }
        
    }