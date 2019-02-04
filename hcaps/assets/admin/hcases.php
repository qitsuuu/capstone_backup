<?php
include("default.php");
$qhcases ="SELECT * FROM hcases_tbl";
$qbrgy ="SELECT * FROM brgy_tbl";
$result ="SELECT * FROM hcases_tbl ORDER BY hcase_name ASC";
?>
	<section id="doccontent">
	<div id="div1">

	<form action="hcases_deleteSelected.php" method="post">
	<div>
	<a class="ml-2 p-2 btn btn-info" id="addcase">Add New Case</a>
	<a class="p-2 btn btn-danger" href="hcases_clearAll.php" onclick="return confirm('Are you sure you want to delete all health cases?')">Clear Cases</a>
	<button class="p-2 btn btn-warning" type="submit" onclick="return confirm('Are you sure you want to delete all records?')"/>Delete Selected</button>
	</div>

    <table style="text-align: center;" class="table">
 
    <tr bgcolor='#CCCCCC'>
        <thead  class="grey lighten-2">
        <th> </th>
        <th> </th>
        <th>Case Name</th>
        <th>Description</th>
        <th>Action</th>
            </thead>
    </tr>
    <?php
    $count=0; 
    foreach ($dbConn->query($result) as $row) {    
        $count++;
        echo '<tr>';
        echo "<td class='pr-0'><center><input class=\"form-check-input\" type=\"checkbox\" name=\"selector[]\"value=".$row['hcase_id']."?></center></td>";
         // echo "<td>".$row['hcase_id']."</td>"; instead of using the id, used a loop for the count
        echo "<td><h6>".$count."</h6/td>";
        echo "<td>".$row['hcase_name']."</td>";
        echo '<td style="width:400px;"><div style="height:100px; overflow-y:auto;">'.$row['hcase_desc'].'</div></td>';
        echo "<td>
        <a class=\"text-warning\" href=\"hcases_update1.php?hcase_id=$row[hcase_id]\">Edit</a>
        <a class=\"text-danger\" href=\"hcases_delete.php?hcase_id=$row[hcase_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";
    }

    ?>
    </table>

 </form>
	
	</div>	
		
	</section>
	<footer>All Rights Reserved © QinEliza December, 2018 </footer>
	
	</main>


  <!-- JS -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    
	<script>
	$(document).ready(function(){
         $("#hcases").addClass("activetab");
        $("#addcase").click(function(){
         $("#div1").load("hcases_add.php");
        });
	   
    });

	</script>

	<script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

</body>
</html>