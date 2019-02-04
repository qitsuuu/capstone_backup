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
      <table class="header table table-bordered" style="text-align: center;">
    <tr>
    <thead class="grey lighten-1">
    <th style="width:150px;">Health Case</th>
    <th colspan="2">Jan</th>
    <th colspan="2">Feb</th>
    <th colspan="2">Mar</th>
    <th colspan="2">Apr</th>
    <th colspan="2">May</th>
    <th colspan="2">Jun</th>
    <th colspan="2">July</th>
    <th colspan="2">Aug</th>
    <th colspan="2">Sep</th>
    <th colspan="2">Oct</th>
    <th colspan="2">Nov</th>
    <th colspan="2">Dec</th>
    <th colspan="2">Total</th>
    <th style="width:1%;"></th>
    </thead>
</tr>

   <tr>
  <td style="width: 150px; background-color:lightgray;"></td>';
  
for($x=0; $x<=12; $x++)
{
$output .='<td style="width:3.44%; background-color:lightblue;">M</td><td style="width:3.44%; background-color:lightpink;">F</td>';
}

$output .='</tr>';
$hcases="SELECT * FROM hcases_tbl ORDER BY hcase_name ASC";
      foreach($dbConn->query($hcases) as $row) {
  
  $hcid=$row['hcase_id'];
  $hname=$row['hcase_name'];

 

// query 1
$jan="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='January' AND YEAR(per_reportdate)='".$curryear."'";

$jan2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='January' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jan) as $count) { 
        $january=$count['casecount'];
} 
    foreach($dbConn->query($jan2) as $count) { 
        $january2=$count['casecount'];
} 


// query 2
$feb="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='February' AND YEAR(per_reportdate)='".$curryear."'";
$feb2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='February' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($feb) as $count) { 
        $february=$count['casecount'];
    }

    foreach($dbConn->query($feb2) as $count) { 
        $february2=$count['casecount'];
    }

// query 3
$mar="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='March' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($mar) as $count) { 
        $march=$count['casecount'];
}

$mar2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='March' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($mar2) as $count) { 
        $march2=$count['casecount'];
}

// query 4
$apr="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='April' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($apr) as $count) { 
        $april=$count['casecount'];
}
$apr2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='April' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($apr2) as $count) { 
        $april2=$count['casecount'];
}


// query 5
$may="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='May' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($may) as $count) { 
        $mayo=$count['casecount'];
}

$may2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='May' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($may2) as $count) { 
        $mayo2=$count['casecount'];
}

// query 6
$jun="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='June' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jun) as $count) { 
        $june=$count['casecount'];
}

$jun2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='June' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jun2) as $count) { 
        $june2=$count['casecount'];
}



// query 7
$jul="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='July' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jul) as $count) { 
        $july=$count['casecount'];
}

$jul2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='July' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($jul2) as $count) { 
        $july2=$count['casecount'];
}

// query 8
$aug="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='August' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($aug) as $count) { 
        $august=$count['casecount'];
}

$aug2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='August' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($aug2) as $count) { 
        $august2=$count['casecount'];
}

// query 9
$sep="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='September' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($sep) as $count) { 
        $september=$count['casecount'];
}

$sep2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='September' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($sep2) as $count) { 
        $september2=$count['casecount'];
}

// query 10
$oct="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='October' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($oct) as $count) { 
        $october=$count['casecount'];
}

$oct2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='October' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($oct2) as $count) { 
        $october2=$count['casecount'];
}

// query 11
$nov="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='November' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($nov) as $count) { 
        $november=$count['casecount'];
}

$nov2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='November' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($nov2) as $count) { 
        $november2=$count['casecount'];
}

// query 12
$dec="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Male' AND MONTHNAME(per_reportdate)='December' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($dec) as $count) { 
        $december=$count['casecount'];
}

$dec2="SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND per_sex='Female' AND MONTHNAME(per_reportdate)='December' AND YEAR(per_reportdate)='".$curryear."'";
    
    foreach($dbConn->query($dec2) as $count) { 
        $december2=$count['casecount'];
}

        
   $totalMale=$january+$february+$march+$april+$mayo+$june+$july+$august+$september+$october+$november+$december;
  $totalFemale=$january2+$february2+$march2+$april2+$mayo2+$june2+$july2+$august2+$september2+$october2+$november2+$december2;

 $output .= '<tr><td style="width:150px; background-color:lightgray; text-align:left;">'.$hname . '</td>
        <td style="width:3.44%;">'.$january.'</td>
        <td style="width:3.44%;">'.$january2.'</td>
        <td style="width:3.44%;">'.$february.'</td>
        <td style="width:3.44%;">'.$february2.'</td>
        <td style="width:3.44%;">'.$march.'</td>
        <td style="width:3.44%;">'.$march2.'</td>
        <td style="width:3.44%;">'.$april.'</td>
        <td style="width:3.44%;">'.$april2.'</td>
        <td style="width:3.44%;">'.$mayo.'</td>
        <td style="width:3.44%;">'.$mayo2.'</td>
        <td style="width:3.44%;">'.$june.'</td>
        <td style="width:3.44%;">'.$june2.'</td>
        <td style="width:3.44%;">'.$july.'</td>
        <td style="width:3.44%;">'.$july.'</td>
        <td style="width:3.44%;">'.$august.'</td>
        <td style="width:3.44%;">'.$august.'</td>
        <td style="width:3.44%;">'.$september.'</td>
        <td style="width:3.44%;">'.$september2.'</td>
        <td style="width:3.44%;">'.$october.'</td>
         <td style="width:3.44%;">'.$october2.'</td>
        <td style="width:3.44%;">'.$november.'</td>
        <td style="width:3.44%;">'.$november2.'</td>
        <td style="width:3.44%;">'.$december.'</td>
        <td style="width:3.44%;">'.$december2.'</td>
        <td style="width:3.44%; color:red">'.$totalMale.'</td>
        <td style="width:3.44%; color:red;">'.$totalFemale.'</td></tr>';

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