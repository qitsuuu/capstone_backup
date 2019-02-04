<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Alert -->
<div class="alert alert-warning warning invisible" role="alert">
<h5 style="text-align: center;">Are you sure you want to delete this?</h5>
<center>
<button type="button" class="btn btn-danger confirm">Delete</button>
<button type="button" class="btn btn-primary cancel">Cancel</button>
</center>   
</div>
<!-- Alert -->

   <!-- SEARCH BAR  -->
<?php
require("conn_config.php");
$curryear= date("m");

$output = '';
if(isset($_POST["query"]))
{
 $search = $_POST["query"];
 $chkcount = "SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE NOT per_roleid='head_admin' AND per_roleid='patient' AND MONTH(per_reportdate)='".$curryear."' AND 
 per_name LIKE '%".$search."%'
  OR per_street LIKE '%".$search."%' 
  OR per_hcaseid LIKE '".$search."%'
  OR per_sex LIKE '".$search."%'  
  OR brgy_name LIKE '%".$search."%' 
AND MONTH(per_reportdate)='".$curryear."'";

 $query = "
  SELECT * FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE NOT per_roleid='head_admin' AND per_roleid='patient' AND MONTH(per_reportdate)='".$curryear."' AND 
 per_name LIKE '%".$search."%'
  OR per_street LIKE '%".$search."%' 
  OR per_hcaseid LIKE '".$search."%'
  OR per_sex LIKE '".$search."%'   
  OR brgy_name LIKE '%".$search."%' 
";
}

else
{
 $chkcount = "
 SELECT COUNT(per_id) AS 'count' FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE NOT per_roleid!='patient' AND per_roleid='patient' AND MONTH(per_reportdate)='".$curryear."'";
 // $query ="SELECT per_id, per_name, per_hcaseid, per_reportdate, hcase_name, per_bday, per_age, brgy_name, per_roleid FROM persons_tbl, hcases_tbl, brgy_tbl where per_roleid='patient' AND persons_tbl.per_hcaseid=hcases_tbl.hcase_id AND persons_tbl.per_brgyid=brgy_tbl.brgy_id ORDER BY per_id";

 $query = "
  SELECT * FROM ((persons_tbl INNER JOIN hcases_tbl ON persons_tbl.per_hcaseid=hcases_tbl.hcase_id) INNER JOIN brgy_tbl ON persons_tbl.per_brgyid=brgy_tbl.brgy_id) WHERE NOT per_roleid!='patient' AND per_roleid='patient' AND MONTH(per_reportdate)='".$curryear."' ORDER BY per_id
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
   <table class="table table bordered">
    <tr>
      <thead class="grey lighten-2">
      <th>#</th>
     <th>Name</th>
     <th>Health Case</th>
     <th>Gender</th>
     <th>Age</th>
      <th>Address</th>
     <th>Date Reported</th>
      <th>Action</th>
   </thead>
    </tr>

    <?php 
    $count=1;
    $result = $dbConn->query($query);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
  echo '<tr>
     <td>'.$count++.'</td>
    <td>'.$row["per_name"].'</td>
    <td>'.$row["hcase_name"].'</td>
    <td>'.$row["per_sex"].'</td>
    <td>'.$row["per_age"].'</td>
    <td>'.$row["per_houseNo"].' '.$row["per_street"].', '.$row["brgy_name"]. '</td>
    <td>'.$row["per_reportdate"].'</td>
  ';


        echo '<td>
        <a name="view" id="'.$row['per_id'].'" class="text-info view_data">View</a>
        <a name="delete" id="'.$row['per_id'].'" class="text-danger delete_data">Delete</a>';
       
       echo "
        <a class=\"text-warning edit\" href=\"person_update.php?per_id=$row[per_id]\">Edit</a> </td></tr>";
    }
    ?>
       
    </table>
  </div>
<?php
}
else
{
 echo 'Data Not Found';
}

?>

 <script src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>

<div id="dataModal" class="modal fade" style="overflow:hidden;">  
      <div class="modal-dialog modal-lg">  
           <div class="modal-content">  
                <div class="modal-header">  
                      <h4 class="modal-title">Person Details</h4>
                    <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->  
                     
                </div>  
                <div class="modal-body scrollbar-night-fade" id="employee_detail" style="height: 450px; overflow-y: auto;">

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
                url:"persons_view.php",  
                method:"post",  
                data:{per_id:per_id},  
                success:function(data){  
                  $('#employee_detail').html(data);  
                  $('#dataModal').modal("show");  
                     
                }  
           });  
      });

      $('.edit_data').click(function(){  
         var per_id = $(this).attr("id");  
           $.ajax({  
                url:"person_update.php",  
                method:"post",  
                data:{per_id:per_id},  
                success:function(html){  
                  $("#div1").load("person_update.php");
                     
                }  
           });  
      });


      $('.delete_data').click(function(){  
        var per_id = $(this).attr("id");  
        $('.warning').removeClass('invisible');
        $('.warning').addClass('visible');
        $('.confirm').click(function(){ 
           $.ajax({  
                url:"a_delete.php",  
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
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


