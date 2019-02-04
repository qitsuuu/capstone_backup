<?php 
require("conn_config.php");
// $hcases="SELECT * FROM hcases_tbl";

// $curryear= date("Y");
// $month=array();
// $n=1;




// for($n=1; $n<=12; $n++){

// echo "<br>";
// foreach($dbConn->query($hcases) as $row) {
// $hcid=$row['hcase_id'];
// $hname=$row['hcase_name'];

// echo $month[$n]= "SELECT per_id, per_hcaseid, COUNT(per_hcaseid) as 'casecount' FROM persons_tbl where per_hcaseid='".$hcid."' AND MONTH(per_reportdate)='".$n."' AND YEAR(per_reportdate)='".$curryear."'<br>";

// foreach($dbConn->query($month[$n]) as $counter) { 
//         echo $counter[$n]['casecount'];
// }

// }
	
// }

$count= "SELECT * FROM count_tbl";

foreach($dbConn->query($count) as $row) {
	$data[] = $row;
}

print json_encode($data);

 ?>