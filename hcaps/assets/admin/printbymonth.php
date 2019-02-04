<?php
require("conn_config.php");

$output = '';
if(isset($_POST['month']))
{

  $year= $_POST["year"];
  $month= $_POST["month"];
  $hcase= $_POST["hcase"];
  $curryear= date("Y");
    // echo "<script>alert(".$year.");</script>";

 $chkcount = "SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE 
 MONTHNAME(per_reportdate)='".$month."' AND per_hcaseid ='".$hcase."' AND YEAR(per_reportdate)='".$year."'
  ";

 $query = "SELECT *, per_id, per_name, lname, mname, per_hcaseid, per_reportdate, hcase_name, per_bday, per_age, brgy_name FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id)  WHERE 
 MONTHNAME(per_reportdate)='".$month."' AND per_hcaseid ='".$hcase."' AND YEAR(per_reportdate)='".$year."' ORDER BY lname ASC;
  ";

}

$count = $dbConn->query($chkcount);
while($row = $count->fetch(PDO::FETCH_ASSOC)) {
   $searchcount=$row['count'];
  }

if($searchcount > 0)
{
  // echo "CHECK" .$searchcount;
?>

<div class="table-responsive">
   <!-- style="height: 400px; overflow-y: scroll;" -->
   <table class="table table bordered">
    <tr>
    <thead class="grey lighten-2">
    <th>#</th>
    <th>Patient's Name</th>
    <th>Health Case</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Address</th>
    <th>Date Reported</th>
   </thead>
    </tr>

    <?php 
    $count=1;
    $result = $dbConn->query($query);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
  echo '<tr>
    <td>'.$count++.'</td>
    <td>'.$row["lname"].", ".$row["per_name"]." ". $row["mname"]." ".$row["suffix"].'</td>
    <td>'.$row["hcase_name"].'</td>
    <td>'.$row["per_sex"].'</td>
    <td>'.$row["per_age"].'</td>
    <td>'.$row["per_houseNo"].' '.$row["per_street"].', '.$row["brgy_name"]. '</td>
    <td>'.$row["per_reportdate"].'</td></tr>
  ';

    }
    ?>
       
    </table>
  </div>
<?php
}

else
{
?>

  <div class="table-responsive">
   <!-- style="height: 400px; overflow-y: scroll;" -->
   <table class="table table bordered">
    <tr>
    <thead class="grey lighten-2">
    <th>#</th>
    <th>Patient's Name</th>
    <th>Health Case</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Address</th>
    <th>Date Reported</th>
    <th>Action</th>
   </thead>
    </tr>

<?php
 echo '<tr><td colspan="8"><h4 style="text-align:center;">Search Not Found</h4></td></tr>';
}
?>

<script>  
 $(document).ready(function(){
  $(".countlabel").html(<?php echo $searchcount; ?>);
});
</script>