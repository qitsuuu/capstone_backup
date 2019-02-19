<?php
require("conn_config.php");
$count=1;
  $result = $dbConn->query($query);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo '<tr>';
        echo "<td>".$count++."</td>";
        echo "<td>".$row['per_name']."</td>";
        echo "<td>".$row['per_id']."</td>";
        echo "<td>".$row['per_roleid']."</td>";
        echo "<td>".$row['per_hcaseid']."</td>";
        echo "<td>".$row['per_reportdate']."</td>";
      
        echo '<td>
        <a name="view" id="'.$row['per_id'].'" class="text-info view_data">View</a>
        <a name="delete" id="'.$row['per_id'].'" class="text-danger delete_data">Delete</a> ';

       echo "
        <a class=\"text-warning\" href=\"person_update.php?per_id=$row[per_id]\">Edit</a> </td></tr>";
    }

?>