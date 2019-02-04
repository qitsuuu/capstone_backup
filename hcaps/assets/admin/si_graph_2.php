<?php
$alua="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=1 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$calaba="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=2 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$malapit="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=3 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$mangga="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=4 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$poblacion="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=5 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$pulo="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=6 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$sanroque="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=7 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$stocristo="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=8 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

$tabon="SELECT per_hcaseid, hcase_name, COUNT(per_id) as 'casecount' FROM persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid = hcases_tbl.hcase_id WHERE per_brgyid=9 AND MONTHNAME(per_reportdate)='".$currmonth."' AND YEAR(per_reportdate)='".$curryear."' GROUP BY per_hcaseid ORDER BY casecount DESC LIMIT 10";

?>

<div class="pl-2 row">

    <!-- ALUA -->
<div class="comdiv1 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart1"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($alua) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

    <!-- CALABA -->
<div class="comdiv1 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart2"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($calaba) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

    <!-- malapit -->
<div class="comdiv1 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart3"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($malapit) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

<!-- MANGGA -->
<div class="comdiv2 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart4"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($mangga) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

<!-- POBLACION -->
<div class="comdiv2 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart5"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($poblacion) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

<!-- PULO -->
<div class="comdiv2 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart6"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($pulo) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

<!-- SAN ROQUE -->
<div class="comdiv3 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart7"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($sanroque) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

<!-- STO. CRISTO -->
<div class="comdiv3 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart8"></canvas>

<div class="comdiv3 p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($stocristo) as $row) {
 echo '<tr><td>'.$row['hcase_name'] ."</td><td>". $row['casecount']."</td></tr>";
}
?>
</table>
</div>
</div>

<!-- TABON -->
<div class="comdiv3 mb-1 p-2 col-sm-12 col-md-4" style="background-color:white; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.19);">

<canvas id="barChart9"></canvas>

<div class="p-2 mt-2 card" style="overflow-y: scroll; height: 120px;">
<table id="interprettbl">
<tr><th>Health Case</th><th>Count</th></tr>
<?php
foreach($dbConn->query($tabon) as $row) {
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

<!-- ALUA Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($alua) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($alua) as $row) {
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
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay ALUA'
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

<!-- CALABA Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($calaba) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($calaba) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    //   backgroundColor: [
                    // 'rgba(153, 102, 255, 0.5)',
                    // 'rgba(255, 206, 86, 0.5)',
                    // 'rgba(75, 192, 192, 0.5)',
                    // ],
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart2");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },
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
            text: 'Barangay CALABA'
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

<!-- MALAPIT Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($malapit) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($malapit) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart3");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },
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
            text: 'Barangay MALAPIT'
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

<!-- MANGGA Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($mangga) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($mangga) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor: 'rgba(20, 210, 5,1)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart4");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay MANGGA'
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

<!-- POBLACION Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($poblacion) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($poblacion) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor: 'rgba(255,99,132,1)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart5");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay POBLACION'
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

<!-- PULO Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($pulo) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($pulo) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor:'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart6");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay PULO'
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

<!-- SAN ROQUE Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($sanroque) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($sanroque) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor: 'rgba(153, 102, 255, 1)',
                     borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart7");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay SAN ROQUE'
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

<!-- STO.CRISTO Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($stocristo) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($stocristo) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                     backgroundColor: 'rgba(75, 192, 192, 1)',
                     borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart8");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay STO. CRISTO'
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

<!-- TABON Chart -->
<script type="text/javascript">

    $(document).ready(function(){
    $.ajax({
        success: function(data) {
            console.log(data);

            var chartdata = {
                labels: [
        <?php
        foreach($dbConn->query($tabon) as $row) {
            $p='"';
         echo $p.$row['hcase_name'].$p.",";
        }
        ?> ],
        
         datasets : [     
                {
                   data: [<?php
                        foreach($dbConn->query($tabon) as $row) {
                         echo $row['casecount'].",";
                        }
                        ?> ],

                    label: "1st dataset",
                    fillColor: "rgba(151,187,205,0.3)",
                    backgroundColor: 'rgba(200,0,200, 0.7)',
                    borderColor: 'rgba(255, 255, 255, 0.7)'
                  
                    }
                ]
            };

            var ctxB = $("#barChart9");
            var barGraph = new Chart(ctxB, {
                type: 'horizontalBar',
                data: chartdata,

         options: {
              scales: {
                yAxes: [{
                     scaleLabel: {
                        display: true,
                        labelString: "",
                        fontColor: "grey"
                      },

                    // ticks: {
                    //     beginAtZero:true,
                    //     max:30
                    // }
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
            text: 'Barangay TABON'
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