<?php
require("conn_config.php");
$result="SELECT * FROM user_tbl INNER JOIN role_tbl ON user_tbl.reqrole_id=role_tbl.role_id";
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

    <div class="p-3 m-0 mb-2 jumbotron row">
    <h3 class="col-sm-5">Health Caps Users</h3>
    <div class="col-xs-12 col-sm-7" style="text-align: right;">
    <a class="ml-2 p-2 btn btn-secondary" href="add_users.php">Add New User</a>
    </div>
    </div>
	 <table class="table tablestyle">
		    <tr>
		        <thead class="grey lighten-2">
		        <th>#</th>
		        <th>Full Name</th>
		        <th>User Role</th>
		        <th>Age</th>
            <th>Birthday</th>
		        <th>Address</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
		        <th>Date Created</th>
		        <th style="text-align: center;">Action</th>
		            </thead>
		    </tr>

		    <?php 
		    $count=1;
		    foreach ($dbConn->query($result) as $row) {         
		        echo '<tr>';
		        echo "<td>".$count++."</td>";
		        echo "<td>".$row['lname']. ", " .$row['name']." ".$row['mname']." ".$row['suffix']."</td>";
		        echo "<td>".$row['role_name']."</td>";
		        echo "<td>".$row['age']."</td>";
            echo "<td>".$row['bday']."</td>";
		        echo "<td>".$row['houseNo']. " ".$row['street']. ", ".$row['brgyid']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td>".$row['email']."</td>";
		        echo "<td>".$row['date_requested']."</td>";
		        echo '<td>
            
            <a name="delete" id="'.$row['user_id'].'" class="text-danger delete_data">Delete</a>
            ';
           
           // echo "
           //  <a class=\"text-warning edit\" href=\"user_update.php?user_id=$row[user_id]\">Edit</a> </td></tr>";

		    }

		    ?>

      <!--   <a name="view" id="'.$row['user_id'].'" class="text-info view_data">View</a> -->

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
      $('.view_data').click(function(){  
         var user_id = $(this).attr("id");  
         // declaration trials
        // var user_id = $("input#user_id").val();
        //  var user_id ="<?php #echo $row['user_id'];?>";
           $.ajax({  
                url:"user_view.php",  
                method:"post",  
                data:{user_id:user_id},  
                success:function(data){  
                  $('#patient_detail').html(data);
                  // $('.modal-title').text('Patient Information');  
                  $('#dataModal').modal("show");  
                     
                }  
           });  
      });

      // $('.edit_data').click(function(){  
      //    var user_id = $(this).attr("id");  
      //       $.ajax({  
      //           url:"patient_update.php",  
      //           method:"post",  
      //           data:{user_id:user_id},  
      //           success:function(data){  
      //             $('#patient_detail').html(data);  
      //             $('#dataModal').modal("show");  
                     
      //           }  
      //      });   
      // });


      $('.delete_data').click(function(){  
        var user_id = $(this).attr("id");  
        $('.warning').removeClass('invisible');
        $('.warning').addClass('visible');
        $('.confirm').click(function(){ 
           $.ajax({  
                url:"user_delete.php",  
                method:"post",  
                data:{user_id:user_id},  
                success: function (html) {
               $('#div1').load("users2.php");  
                     
                }  
           }); 
          });

            $('.cancel').click(function(){ 
            window.location.href='users.php';
              
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