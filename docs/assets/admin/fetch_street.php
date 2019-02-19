<?php
//fetch.php

include("conn_config.php");

$output = '';
if(isset($_POST["query"]))
{
 $search = $_POST["query"];
 $chkcount = "SELECT COUNT(*) AS 'count' FROM street_tbl 
  WHERE street_name LIKE '%".$search."%'";
  $query= "SELECT * FROM street_tbl 
  WHERE street_name LIKE '%".$search."%'";
}

else
{
 $chkcount = "
 SELECT COUNT(*) AS 'count' FROM street_tbl";
 $query ="SELECT * FROM street_tbl";
}

$count = $dbConn->query($chkcount);
while($row = $count->fetch(PDO::FETCH_ASSOC)) {
   $searchcount=$row['count'];
  }

if($searchcount > 0)
{
  // echo "CHECK" .$searchcount;
  $result = $dbConn->query($query);

 $output .= '
  <table>
 ';

 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  $output .= '
   <tr>
    <td>'.$row["street_name"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
 echo json_encode($output);

?>