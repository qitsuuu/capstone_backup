<?php 
require("conn_config.php");

$curryear= date("Y");
$total="";

$hcases="SELECT * FROM hcases_tbl";

// THE QUERY
// foreach($dbConn->query($hcases) as $row) {
//  $hcid=$row['hcase_id'];
// $hname=$row['hcase_name'];

// $casecount="SELECT per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."'";
    
//     foreach($dbConn->query($casecount) as $count) { 
//         $hcount=$count['casecount'];
// } 
//         echo $hname . " Count : " .$hcount. "<br> ";
// }

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

    $totalMale=$january1+$february+$march+$april+$mayo+$june+$july+$august+$september+$october+$november+$december;
    $totalFemale=$january2+$february+$march+$april+$mayo+$june+$july+$august+$september+$october+$november+$december;

        echo '<tr><td style="width:150px; background-color:pink; text-align:left;">';
        echo $hname . '</td><td style="width:4%; background-color:green;">'.$january2.'</td><td style="width:4%; background-color:red;">'.$january2.'</td><td style="width:4%; background-color:green;">'.$february.'</td><td>'.$march.'</td><td>'.$april.'</td><td>'.$mayo.'</td><td>'.$june.'</td><td>'.$july.'</td><td>'.$august.'</td><td>'.$september.'</td><td>'.$october.'</td><td><a value="'.$count['per_id'].'" class="pinpoint" id="'.$count['per_id'].'">'.$november.'</a></td><td>'.$december.'</td><td style="color:red">'.$totalMale.'</td><td style="color:red">'.$totalFemale.'</td></tr>';
}



?>