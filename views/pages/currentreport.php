<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<script type="text/javascript">

$(function () {
  
var xaxis_data = <?php echo $xaxis_data; ?>;
var yaxis_data = <?php echo $result_array; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Bug Report'
        },
        xAxis: {
            categories: xaxis_data,
           
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of bugs per project'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        credits: {
              enabled: false
            },
        legend: {
            align: 'left',
            x: 25,
            verticalAlign: 'top',
            y: -10,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    align:"center",
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                         fontWeight: 'bold',
                         
                    },
                    padding:20,
                    crop:false,
                    zIndex:10,
                    x:0.5,
                    y:0
                }
            }
        },
        series: yaxis_data,
            //        exporting:{
            // enabled: true
            //}
                    

        exporting: {
            enabled:true,
            scale: 1,
            buttons: {
            contextButton: {
                
                symbolStroke: "white",
                symbolSize: 24,
                symbolX: 23,
                symbolY: 21,
                symbolStrokeWidth: 2,
                  
                
        
        theme: {
             fill:"red"
                    },
                    height: 40,
                    width: 48,

                }
            },  width:2000
        },
        
                lang: {
            printChart: 'Export Report',
            downloadPNG: 'Download as PNG',
            downloadJPEG: 'Download as JPEG',
            downloadPDF: 'Download as PDF',
            downloadSVG: 'Download as SVG',
            contextButtonTitle: 'Export menu'
        },
        navigation: {
            menuStyle: {
                border: '1px solid black',
                background: 'pink',
                padding: '5px 0'
            },
            menuItemStyle: {
                padding: '0 10px',
                background: 'NONE',
                color: '#303030',
                fontSize: '18px'
            },
            menuItemHoverStyle: {
                background: '#4572A5',
                color: '#FFFFFF'
            },
        
            buttonOptions: {
                symbolFill: 'red',
                symbolSize: 14,
                symbolStroke: 'red',
                symbolStrokeWidth: 3,
                symbolX: 12.5,
                symbolY: 10.5,
                align: 'right',
                buttonSpacing: 3,
                height: 22,
                // text: null,
                theme: {
                    fill: 'white', // capture hover
                    stroke: 'none'
                },
                verticalAlign: 'top',
                width: 24
            }
        },
        
    });
});
</script>
        
 <div id="container" ></div>
<!-- <form method="post" action="?controller=reports&action=index" onsubmit="return validateReportForm();">
    
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
        
    
    
</form> -->