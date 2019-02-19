
  <!-- Alert -->
<div class="alert alert-warning warning invisible" role="alert">
<h5 style="text-align: center;">Are you sure you want to delete this?</h5>
<center>
<button type="button" class="btn btn-danger confirm">Delete</button>
<button type="button" class="btn btn-primary cancel">Cancel</button>
</center>   
</div>
<!-- Alert -->

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

 $query = "SELECT *, hcase_name, brgy_name FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id)  WHERE YEAR(per_reportdate)='".$year."' ORDER BY per_reportdate DESC;
  ";

 // (YEAR(per_reportdate)='".$year."' AND per_hcaseid ='".$hcase."') OR (YEAR(per_reportdate)='".$year."' AND per_hcaseid ='".$hcase."' AND per_sex ='".$sex."') OR (YEAR(per_reportdate)='".$year."' AND per_hcaseid ='".$hcase."' AND (per_sex ='".$sex."' OR per_sex='Male' OR per_sex='Female'))

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
  OR brgy_name LIKE '".$search."%'
  OR per_sex LIKE '%".$search."%'  
  OR MONTHNAME(per_reportdate) LIKE '".$search."%'
  OR YEAR(per_reportdate) LIKE '".$search."%' ORDER BY lname ASC";

 $query = "
  SELECT *, per_id, per_name, lname, mname, per_hcaseid, per_reportdate, hcase_name, per_bday, per_age, brgy_name FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE
  per_name LIKE '%".$search."%'
  OR lname LIKE '%".$search."%'
  OR mname LIKE '%".$search."%'
  OR brgy_name LIKE '".$search."%'
  OR per_street LIKE '".$search."%' 
  OR per_sex LIKE '".$search."%'    
  OR MONTHNAME(per_reportdate) LIKE '".$search."%'
  OR YEAR(per_reportdate) LIKE '".$search."%' ORDER BY lname";
}


else
{

// $query ="SELECT per_id, per_name, per_hcaseid, per_reportdate, hcase_name, per_bday, per_age, brgy_name, per_roleid FROM persons_tbl, hcases_tbl, brgy_tbl where per_roleid='patient' AND persons_tbl.per_hcaseid=hcases_tbl.hcase_id AND persons_tbl.per_brgyid=brgy_tbl.brgy_id ORDER BY per_id";
  
 $chkcount = "
 SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE YEAR(per_reportdate)='".$curryear."'";

 $query = "
  SELECT * FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE YEAR(per_reportdate)='".$curryear."' ORDER BY per_reportdate DESC
 ";
}

$count = $dbConn->query($chkcount);
while($row = $count->fetch(PDO::FETCH_ASSOC)) {
   $searchcount=$row['count'];
  }

if($searchcount >= 0)
{
  // echo "CHECK" .$searchcount;
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
    <th>Action</th>
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


  $output .='<td>
        <a name="view" id="'.$row['per_id'].'" class="text-info view_data">View</a>
        <a name="delete" id="'.$row['per_id'].'" class="text-danger delete_data">Delete</a>
        ';
        // <a name="edit" id="'.$row['per_id'].'" class="text-warning edit_data">Edit</a>
       
      $output .="
        <a class=\"text-warning edit\" href=\"patient_update.php?per_id=$row[per_id]\">Edit</a> </td></tr>";
    }
   
   $output .='     
    </table>
  </div>';

  echo $output;

}


else
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
    <th>Action</th>
    </thead>
   </tr>

   <tr>
   <td colspan="8"><h4 style="text-align:center;">Search Not Found</h4></td>
   </tr>';

   echo $output;
}

?>

 <script src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>

<div id="dataModal" class="modal fade" style="overflow:hidden;">  
      <div class="modal-dialog modal-lg">  
           <div class="modal-content">  
                <div class="modal-header">  
                      <h4 class="modal-title"></h4>
                    <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->  
                     
                </div>  
                <div class="modal-body scrollbar-night-fade" id="patient_detail" style="height: 450px; overflow-y: auto;">

                </div>
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  


 <script>  
 $(document).ready(function(){
  $(".countlabel").html(<?php echo $searchcount; ?>);

      $('.view_data').click(function(){  
         var per_id = $(this).attr("id");  
         // declaration trials
        // var per_id = $("input#per_id").val();
        //  var per_id ="<?php #echo $row['per_id'];?>";
           $.ajax({  
                url:"patient_view.php",  
                method:"post",  
                data:{per_id:per_id},  
                success:function(data){  
                  $('#patient_detail').html(data);
                  // $('.modal-title').text('Patient Information');  
                  $('#dataModal').modal("show");  
                     
                }  
           });  
      });

      // $('.edit_data').click(function(){  
      //    var per_id = $(this).attr("id");  
      //       $.ajax({  
      //           url:"patient_update.php",  
      //           method:"post",  
      //           data:{per_id:per_id},  
      //           success:function(data){  
      //             $('#patient_detail').html(data);  
      //             $('#dataModal').modal("show");  
                     
      //           }  
      //      });   
      // });


      $('.delete_data').click(function(){  
        var per_id = $(this).attr("id");  
        $('.warning').removeClass('invisible');
        $('.warning').addClass('visible');
        $('.confirm').click(function(){ 
           $.ajax({  
                url:"patient_delete.php",  
                method:"post",  
                data:{per_id:per_id},  
                success: function (html) {
              // window.location.href='dashboard.php';
               $('#div1').load("patient2.php");  
                     
                }  
           }); 
          });

            $('.cancel').click(function(){ 
            $('.warning').addClass('invisible');
              
          });
      });  
 });  
 </script>


 <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>
</body>
</html>
