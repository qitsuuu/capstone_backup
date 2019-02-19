<?php
include('server.php');
if(empty($_SESSION['username'])){
header('location: ../admin/signin.php');
}

$qhcases ="SELECT * FROM hcases_tbl";
$qstreet ="SELECT * FROM street_tbl";
$qbrgy ="SELECT * FROM brgy_tbl";
$sessionname = $_SESSION['username'];

$getroleinfo ="SELECT *, brgy_name FROM ((user_tbl INNER JOIN role_tbl ON user_tbl.reqrole_id=role_tbl.role_id) INNER JOIN brgy_tbl ON role_tbl.brgyid=brgy_tbl.brgy_id) WHERE username='$sessionname'";

    $result = $dbConn->query($getroleinfo);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
     $rolename=$row['role_name'];
     $roleid=$row['role_id'];
    $brgyid=$row['brgy_id'];
    $brgyname=$row['brgy_name'];
        
    }

$query="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid='".$brgyid."' AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";
?>

<div class="pl-2 row">

    <!-- query -->
<div class="comdiv1 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart1"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
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

 <!-- chart2 -->
<div class="comdiv1 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="chart2"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
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

 <!-- chart3 -->
<div class="comdiv1 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="chart3"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
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

</div>
 <!-- graph container-end -->

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="../js/myscript.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/mdb.min.js"></script>
<script src="../js/mdb.js" type="text/javascript"></script>

<!-- query Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
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
                     backgroundColor: 'rgba(255,99,132, 0.5)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart1");
            var barGraph = new Chart(ctxB, {
                type: 'bar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    ticks: {
                        beginAtZero:true,
                        max:20
                    }
                }],

                 xAxes: [{
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
            text: 'Bar Graph of Current Health Case Count'
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

<!-- query Chart2 -->
<script type="text/javascript">
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
                     backgroundColor: 'rgba(255,99,132, 0.5)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

var ctxP = document.getElementById("chart2").getContext('2d');
var myChart = new Chart(ctxP, {
    type: 'pie',
    data: chartdata,
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
            text: 'Pie Graph of Current Health Case Count'
        }
    }
});
</script>

<!-- query Chart3 -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
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
                     backgroundColor: 'rgba(255,99,132, 0.5)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#chart3");
            var barGraph = new Chart(ctxB, {
                type: 'doughnut',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    ticks: {
                        beginAtZero:true,
                        max:20
                    }
                }],

                 xAxes: [{
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
            text: 'Doughnut Graph of Current Health Case Count'
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


<script type="text/javascript">
    $(document).ready(function(){

    $(".chartdiv").hover(function(){
            $(".chartdiv .card").slideDown(500);
    },
    function () {
     $(".chartdiv .card").slideUp(500);
    }
    );

    $(".comdiv1").hover(function(){
            $(".comdiv1 .card").slideDown(500);
    },
    function () {
     $(".comdiv1 .card").slideUp(500);
    }
    );

    $(".comdiv2").hover(function(){
            $(".comdiv2 .card").slideDown(500);
    },
    function () {
     $(".comdiv2 .card").slideUp(500);
    }
    );

    $(".comdiv3").hover(function(){
            $(".comdiv3 .card").slideDown(500);
    },
    function () {
     $(".comdiv3 .card").slideUp(500);
    }
    );

    });
</script>