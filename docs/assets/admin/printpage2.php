
<?php
require("conn_config.php");
$curryear= date("Y");
$output ='';
$total="";

if(isset($_POST['year']))
{
  $year= $_POST["year"];
  // echo "<script>alert(".$year.");</script>";
 $chkcount = "SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE YEAR(per_reportdate)='".$year."'
  ";

 $query = "SELECT *, per_id, per_name, lname, mname, per_hcaseid, per_reportdate, hcase_name, per_bday, per_age, brgy_name FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id)  WHERE YEAR(per_reportdate)='".$year."'
  ";

}

else if(isset($_POST['query']))
{

  // echo "<script>alert(".$year.");</script>";
$search = $_POST['query'];
 $chkcount = "SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE
 per_name LIKE '%".$search."%'
  OR lname LIKE '%".$search."%'
  OR mname LIKE '%".$search."%'
  OR per_street LIKE '".$search."%' 
  OR per_hcaseid LIKE '".$search."%'
  OR per_sex LIKE '%".$search."%'  
  OR MONTHNAME(per_reportdate) LIKE '".$search."%'
  OR YEAR(per_reportdate) LIKE '".$search."%'";

 $query = "
  SELECT *, per_id, per_name, lname, mname, per_hcaseid, per_reportdate, hcase_name, per_bday, per_age, brgy_name FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE
  per_name LIKE '%".$search."%'
  OR lname LIKE '%".$search."%'
  OR mname LIKE '%".$search."%'
  OR per_street LIKE '".$search."%' 
  OR per_hcaseid LIKE '".$search."'
  OR per_sex LIKE '".$search."%'    
  OR MONTHNAME(per_reportdate) LIKE '".$search."%'
  OR YEAR(per_reportdate) LIKE '".$search."%'";
}


else if(isset($_POST['exportxls'])){
 
 $chkcount = "
 SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id)";

 $query = "
  SELECT * FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) ORDER BY per_reportdate DESC
 ";
}


else
{
  
 $chkcount = "
 SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id)";

 $query = "
  SELECT * FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) ORDER BY per_reportdate DESC
 ";
}

$count = $dbConn->query($chkcount);
while($row = $count->fetch(PDO::FETCH_ASSOC)) {
   $searchcount=$row['count'];
  }

if($searchcount >= 0)
{

$output .='
<div class="table-responsive">
   <!-- style="height: 400px; overflow-y: scroll;" -->
   <table class="table table bordered">
    <tr>
    <thead class="grey lighten-2">
    <th>#</th>
    <th>Patient\'s Name</th>
    <th>Health Case</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Address</th>
    <th>Date Reported</th>
   </thead>
    </tr>';

 
    $count=1;
    $result = $dbConn->query($query);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {  

  $output .='<tr>
    <td>'.$count++.'</td>
    <td>'.$row["lname"].", ".$row["per_name"]." ". $row["mname"]." ".$row["suffix"].'</td>
    <td>'.$row["hcase_name"].'</td>
    <td>'.$row["per_sex"].'</td>
    <td>'.$row["per_age"].'</td>
    <td>'.$row["per_houseNo"].' '.$row["per_street"].', '.$row["brgy_name"]. '</td>
    <td>'.$row["per_reportdate"].'</td>
  ';
    }
   
   $output .='     
    </table>
  </div>';

header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename='.$curryear.'_Report.xls');
  echo $output;

}

?>


 <script>  
 $(document).ready(function(){
  $(".countlabel").html(<?php echo $searchcount; ?>);
});
</script>
