<?php
$curryear =date("Y");
$currmonth=date("F");

$query1="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=1 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

// foreach($dbConn->query($query) as $row) {
//  echo $row['per_hcaseid'] ." ". $row['hcase_name'] ." ". $row['casecount']."<br>";
// }

$query2="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=2 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query3="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=3 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query4="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=4 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query5="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=5 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query6="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=6 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query7="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=7 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query8="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=8 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$query9="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=9 GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

?>

<div class="pl-2 row">

<!-- Jquery ajax Chart
 -->
<div class="ml-4 mr-2 mb-3 col-sm-12 col-md-6" style="background-color:white; box-shadow: 5px 3px 5px 2px rgba(0, 0, 0, 0.19);">

<canvas id="barChart"></canvas>

<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        // url: "http://localhost/data.php",
        // method: "GET",
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($query) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [
                  
                {
                     data: [<?php
        foreach($dbConn->query($query) as $row) {
         echo $row['casecount'].",";
        }
        ?> ],
                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor: "rgba(255,99,132, 0.5",
                    //   backgroundColor: [
                    // 'rgba(255,99,132, 0.5)',
                    // 'rgba(54, 162, 235, 0.5)',
                    // 'rgba(255, 206, 86, 0.5)',
                    // 'rgba(75, 192, 192, 0.5)',
                    // 'rgba(153, 102, 255, 0.5)',
                    // 'rgba(255, 159, 64, 0.5)'
                    // ],
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                     }
                ]
            };

            var ctxB = $("#barChart");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                // yAxes: [{

                //     ticks: {
                //         beginAtZero:true,
                //         max:50
                //     }
                // }],

                 xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Health Cases Count",
                        fontColor: "grey"
                      },
                       ticks: {
                        beginAtZero:true,
                        max:20
                    }

                 }]
                },

            legend: {
            display: false,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
                     }
                    },

            title: {
            display: true,
            text: 'Bar Graph of 10 Monitored Cases is San Isidro'
                 }

             }
         });
    },
        error: function(data) {
            console.log(data);
        }
    });
});

</script>
<div class="mt-3 p-2 card">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php

foreach($dbConn->query($query) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>

</table>
</div>
</div>


<div class="p-0 ml-2 mr-2 mb-3 mt-0 col-sm-12 col-md-5"  style="background-color:white; box-shadow: 5px 3px 5px 2px rgba(0, 0, 0, 0.19);">

<canvas id="pieChart"></canvas>

<script type="text/javascript">
        var c1=<?php echo json_encode($c1); ?>;
        var c2=<?php echo json_encode($c2); ?>;
        var c3=<?php echo json_encode($c3); ?>;
        var c4=<?php echo json_encode($c4); ?>;
        var c5=<?php echo json_encode($c5); ?>;
        var c6=<?php echo json_encode($c6); ?>;
        var c7=<?php echo json_encode($c7); ?>;
        var c8=<?php echo json_encode($c8); ?>;
        var c9=<?php echo json_encode($c9); ?>;
        var c10=<?php echo json_encode($c10); ?>;

        var c1=(c1/10)*100;
        var c2=(c2/10)*100;
        var c3=(c3/10)*100;
        var c4=(c4/10)*100;
        var c5=(c5/10)*100;
        var c6=(c6/10)*100;
        var c7=(c7/10)*100;
        var c8=(c8/10)*100;
        var c9=(c9/10)*100;
        var c10=(c10/10)*100;


var ctxP = document.getElementById("pieChart").getContext('2d');
var myChart = new Chart(ctxP, {
    type: 'pie',
    data: {
        title:{
            text: ["Health Case Count"]
        },
    labels: ["Animal Bite", "Hypertension", "Diabetis", "Diarrhea", "Pneumonina", "Pyodermas", "Rabies (Human)", "Tuberculosis", "Urinary Tract Infection", "Hepatitis"],
        datasets: [{
            label: 'aaa',
             data: [c1, c2, c3, c4, c5, c6, c7, c8, c9, c10],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'pink',
                'purple',
                'lightgray',
                'lime',
                'orange'
                
            ],
            borderColor: [
                // 'rgba(255,99,132,1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255,99,132,1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            // yAxes: [{
            //     ticks: {

            //     }
            // }]
        },

        legend: {
            display: true,
            position :'left',

            labels: {
                boxWidth : 10,
                fontColor: 'grey'
                // 'rgb(255, 99, 132)'
                 }
        },

         title: {
            display: true,
            text: 'Pie Graph of 10 Monitored Cases is San Isidro '
        }
    }
});
</script>

<div class="mt-5 p-2 card">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
echo'
    <tr>
    <td>Animal Bite</td><td>'.$c1.'</td>
</tr>
<tr>
    <td>Hypertension</td><td>'.$c2.'</td>
</tr>
<tr>
    <td>Diabetis</td><td>'.$c3.'</td>
</tr>
<tr>
    <td>Diarrhea</td><td>'.$c4.'</td>
</tr>
<tr>
    <td>Pneumonia</td><td>'.$c5.'</td>
</tr>
<tr>
    <td>Pyodermas</td><td>'.$c6.'</td>
</tr>
<tr>
    <td>Rabies</td><td>'.$c7.'</td>
</tr>
<tr>
    <td>Tuberculosis</td><td>'.$c8.'</td>
</tr>
<tr>
    <td>Urinary Tract Infection</td><td>'.$c9.'</td>
</tr>
<tr>
    <td>Hepatitis</td><td>'.$c10.'</td>
</tr>';
?>

</table>
</div>

</div>



<div class="p-0 m-3 ml-4 col-sm-12 col-md-6"  style="background-color:white; box-shadow: 5px 3px 5px 2px rgba(0, 0, 0, 0.19);">

<canvas id="lChart"></canvas>

<script type="text/javascript">
        var c1=<?php echo json_encode($c1); ?>;
        var c2=<?php echo json_encode($c2); ?>;
        var c3=<?php echo json_encode($c3); ?>;
        var c4=<?php echo json_encode($c4); ?>;
        var c5=<?php echo json_encode($c5); ?>;
        var c6=<?php echo json_encode($c6); ?>;
        var c7=<?php echo json_encode($c7); ?>;
        var c8=<?php echo json_encode($c8); ?>;
        var c9=<?php echo json_encode($c9); ?>;
        var c10=<?php echo json_encode($c10); ?>;

var ctxL = document.getElementById("lChart").getContext('2d');
var myChart = new Chart(ctxL, {
    type: 'line',
    data: {
        title:{
            text: ["Health Case Count"]
        },
            labels: ["Animal Bite", "Hypertension", "Diabetis", "Diarrhea", "Pneumonina", "Pyodermas", "Rabies (Human)", "Tuberculosis", "Urinary Tract Infection", "Hepatitis"],
             datasets: [{
            label: 'aaa',
            data: [c1, c2, c3, c4, c5, c6, c7, c8, c9, c10],
            backgroundColor: [
                'rgba(255, 206, 86, 0.5)'
                
            ],
            borderColor: [
                // 'rgba(255,99,132,1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{

                 scaleLabel: {
                        display: true,
                        labelString: "Health Cases Count",
                        fontColor: "grey"
                      },
                ticks: {
                        max:10
                }
            }]
        },

        legend: {
            display: false,
            position :'left',

            labels: {
                boxWidth : 10,
                fontColor: 'grey'
                // 'rgb(255, 99, 132)'
                 }
        },

         title: {
            display: true,
            text: 'Line Graph of 10 Monitored Cases is San Isidro'
        }
    }
});
</script>
<div class="mt-3 p-2 card">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
echo'
    <tr>
    <td>Animal Bite</td><td>'.$c1.'</td>
</tr>
<tr>
    <td>Hypertension</td><td>'.$c2.'</td>
</tr>
<tr>
    <td>Diabetis</td><td>'.$c3.'</td>
</tr>
<tr>
    <td>Diarrhea</td><td>'.$c4.'</td>
</tr>
<tr>
    <td>Pneumonia</td><td>'.$c5.'</td>
</tr>
<tr>
    <td>Pyodermas</td><td>'.$c6.'</td>
</tr>
<tr>
    <td>Rabies</td><td>'.$c7.'</td>
</tr>
<tr>
    <td>Tuberculosis</td><td>'.$c8.'</td>
</tr>
<tr>
    <td>Urinary Tract Infection</td><td>'.$c9.'</td>
</tr>
<tr>
    <td>Hepatitis</td><td>'.$c10.'</td>
</tr>';
?>

</table>
</div>

</div>



<div class="p-0 ml-2 mr-2 mt-3 mb-4 col-sm-12 col-md-5"  style="background-color:white; box-shadow: 5px 3px 5px 2px rgba(0, 0, 0, 0.19);">

<canvas id="barChart2"></canvas>


<script type="text/javascript">
         var c1=<?php echo json_encode($c1); ?>;
        var c2=<?php echo json_encode($c2); ?>;
        var c3=<?php echo json_encode($c3); ?>;
        var c4=<?php echo json_encode($c4); ?>;
        var c5=<?php echo json_encode($c5); ?>;
        var c6=<?php echo json_encode($c6); ?>;
        var c7=<?php echo json_encode($c7); ?>;
        var c8=<?php echo json_encode($c8); ?>;
        var c9=<?php echo json_encode($c9); ?>;
        var c10=<?php echo json_encode($c10); ?>;


var ctxZ = document.getElementById("barChart2").getContext('2d');
var myChart = new Chart(ctxZ, {
    type: 'doughnut',
    data: {
        title:{
            text: ["Health Case Count"]
        },
     labels: ["Animal Bite", "Hypertension", "Diabetis", "Diarrhea", "Pneumonina", "Pyodermas", "Rabies (Human)", "Tuberculosis", "uti", "Hepatitis"],
        datasets: [{
            label: '',
            data: [c1, c2, c3, c4, c5, c6, c7, c8, c9, c10],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
                
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{

                 scaleLabel: {
                        display: true,
                        labelString: "Health Cases Count",
                        fontColor: "grey"
                      },
                ticks: {
                        max:10
                }
            }]
        },

        legend: {
            display: true,
            position :'left',

            labels: {
                boxWidth : 10,
                fontColor: 'grey'
                // 'rgb(255, 99, 132)'
                 }
        },

         title: {
            display: true,
            text: 'Dougnut Chart of 10 Monitored Health Cases in San Isidro.'
        }
    }
});
</script>

<div class="mt-5 p-2 card">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
echo'
    <tr>
    <td>Animal Bite</td><td>'.$c1.'</td>
</tr>
<tr>
    <td>Hypertension</td><td>'.$c2.'</td>
</tr>
<tr>
    <td>Diabetis</td><td>'.$c3.'</td>
</tr>
<tr>
    <td>Diarrhea</td><td>'.$c4.'</td>
</tr>
<tr>
    <td>Pneumonia</td><td>'.$c5.'</td>
</tr>
<tr>
    <td>Pyodermas</td><td>'.$c6.'</td>
</tr>
<tr>
    <td>Rabies</td><td>'.$c7.'</td>
</tr>
<tr>
    <td>Tuberculosis</td><td>'.$c8.'</td>
</tr>
<tr>
    <td>Urinary Tract Infection</td><td>'.$c9.'</td>
</tr>
<tr>
    <td>Hepatitis</td><td>'.$c10.'</td>
</tr>';
?>

</table>
</div>


</div>
</div> 
<!-- graph container-end -->




 <script src="assets/js/jquery-3.3.1.min.js"></script>
   <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>
