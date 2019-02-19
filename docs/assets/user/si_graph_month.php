<?php
require("conn_config.php"); 

if(isset($_POST['month']))
{
    $curryear =$_POST["year"];
    $currmonth =$_POST["month"];
    include("si_graph_3.php");
 } 

else {

    $curryear =date("Y");
    $currmonth=date("F");
   include("si_graph_2.php");
    }
?>