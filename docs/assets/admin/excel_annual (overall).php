<?php
 $curryear= date("Y");
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename='.$curryear.'_Report.xls');
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/mdb.min.css">
 <!--    <link rel="stylesheet" type="text/css" href="../mdb/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../mdb/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>

<body>
  
<?php

require("conn_config.php");
$output ='';
$curryear= date("Y");
$total="";

if(isset($_POST["export"]))
  {

    $output .='
      <table class="header table table bordered" style="text-align: center;">
      <tr>
      <thead class="grey lighten-2">
      <th class="pl-2 col-sm-2">Health Case</th>
      <th>Jan</th>
    <th>Feb</th>
    <th>Mar</th>
    <th>Apr</th>
    <th>May</th>
    <th>Jun</th>
    <th>July</th>
    <th>Aug</th>
    <th>Sep</th>
    <th>Oct</th>
    <th>Nov</th>
    <th>Dec</th>
    <th>Total</th>
    </thead>
    </tr>
';

  $hcases="SELECT * FROM hcases_tbl";
      foreach($dbConn->query($hcases) as $row) {
  
  $hcid=$row['hcase_id'];
  $hname=$row['hcase_name'];

 


// query 1
$jan="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='January' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jan) as $count) { 
        $january=$count['casecount'];
} 

// query 2
$feb="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='February' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($feb) as $count) { 
        $february=$count['casecount'];
}
// query 3
$mar="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='March' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($mar) as $count) { 
        $march=$count['casecount'];
}
// query 4
$apr="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='April' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($apr) as $count) { 
        $april=$count['casecount'];
}
// query 5
$may="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='May' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($may) as $count) { 
        $mayo=$count['casecount'];
}
// query 6
$jun="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='June' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jun) as $count) { 
        $june=$count['casecount'];
}

// query 7
$jul="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='July' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jul) as $count) { 
        $july=$count['casecount'];
}

// query 8
$aug="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='August' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($aug) as $count) { 
        $august=$count['casecount'];
}
// query 9
$sep="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='September' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($sep) as $count) { 
        $september=$count['casecount'];
}
// query 10
$oct="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='October' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($oct) as $count) { 
        $october=$count['casecount'];
}
// query 11
$nov="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='November' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($nov) as $count) { 
        $november=$count['casecount'];
}

// query 12
$dec="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTHNAME(per_reportdate)='December' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($dec) as $count) { 
        $december=$count['casecount'];
}

        
  $total=$january+$february+$march+$april+$mayo+$june+$july+$august+$september+$october+$november+$december;

 $output .= '
    <tr>
    <td class="col-sm-2" style="color:teal; text-align:left;">'.$hname . '</td>
    <td>'.$january.'</td>
    <td>'.$february.'</td>
    <td>'.$march.'</td>
    <td>'.$april.'</td>
    <td>'.$mayo.'</td>
    <td>'.$june.'</td>
    <td>'.$july.'</td>
    <td>'.$august.'</td>
    <td>'.$september.'</td>
    <td>'.$october.'</td><td>'.$november.'</td>
    <td>'.$december.'</td>
    <td style="color:red">'.$total.'</td></tr>
  ';

}


  $output .= "</table>";
  echo $output;
}

?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>