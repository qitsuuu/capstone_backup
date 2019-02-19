<?php
require("conn_config.php");
$result="SELECT * FROM requests_tbl INNER JOIN role_tbl ON requests_tbl.reqrole_id=role_tbl.role_id";
?>

<!-- Alert -->
		<div class="alert alert-success success2 invisible" role="alert">
		   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<center><h1><span><i class="fa fa-check-circle-o"></i></span>
		<p>Approved!</p></h1></center>
		   
		</div>

		<div class="alert alert-warning warning invisible" role="alert">
		<h5 style="text-align: center;">Are you sure you want to delete this?</h5>
		<center>
		<button type="button" class="btn btn-danger confirm">Delete</button>
		<button type="button" class="btn btn-primary cancel" data-dismiss="alert">Cancel</button>
		</center>   
		</div>
<!-- Alert -->

		<h4 class="jumbotron">Access Requests</h4>
		 <table class="table tablestyle">
		    <tr>
		        <thead class="grey lighten-2">
		        <th>#</th>
		        <th>Full Name</th>
		        <th>Role Requested</th>
		        <th>Age</th>
		        <th>Address</th>
            <th>Username</th>
            <th>Password</th>
		        <th>Date Requested</th>
		        <th style="text-align: center;">Action</th>
		            </thead>
		    </tr>

		    <?php 
		    $count=1;
		    foreach ($dbConn->query($result) as $row) {         
		        echo '<tr>';
		        echo "<td>".$count++."</td>";
		        // echo "<td>".$row['req_id']."</td>";
		       echo "<td>".$row['lname']. ", " .$row['name']." ".$row['mname']." ".$row['suffix']."</td>";
		        echo "<td>".$row['role_name']."</td>";
		        echo "<td>".$row['age']."</td>";
		        echo "<td>".$row['houseNo']. " ".$row['street']. ", ".$row['brgyid']."</td>";
             echo "<td>".$row['username']."</td>";
              echo "<td>".$row['password']."</td>";
		        echo "<td>".$row['date_requested']."</td>";
		        echo '<td class="h3" style="text-align:center;">
		        <a name="accept" id="'.$row['req_id'].'" class="text-success accept_data" data-toggle="tooltip" data-placement="top" title="Approve"><i class="fa fa-thumbs-o-up"></i></a>
		        <a name="delete" id="'.$row['req_id'].'" class="text-danger delete_data" data-toggle="tooltip" data-placement="top" title="Disapprove"><i class="fa fa-thumbs-down"></i></a> ';

		    }

		    ?>

		    </table>

  <!-- JS -->
 <script src="../js/jquery-3.3.1.min.js"></script> 
<script type="text/javascript">
  
$(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();

   });
</script>
  <script>  
 $(document).ready(function(){  
      $('.accept_data').click(function(){  
         var req_id = $(this).attr("id"); 
           $.ajax({  
                url:"requests_3.php",  
                method:"post",  
                data:{req_id:req_id},  
                success:function(data){ 
                 $('#div1').html(data);  
                 $('.success2').removeClass('invisible');
                  $('.success2').addClass('visible'); 
                  window.setTimeout(function() {
              $(".success2").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    },3000);
                }  
           });
           
      });


      $('.delete_data').click(function(){  
        var req_id = $(this).attr("id");  
        $('.warning').removeClass('invisible');
        $('.warning').addClass('visible');
        $('.confirm').click(function(){ 
           $.ajax({  
                url:"req_delete.php",  
                method:"post",  
                data:{req_id:req_id},  
                success: function (html) {
              window.location.href='requests.php';
               // $('#div1').load("requests.php");  
                     
                }  
           }); 
          });

         $('.cancel').click(function(){ 
         window.location.href='requests.php'; 
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