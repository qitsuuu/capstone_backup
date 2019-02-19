<!DOCTYPE html>
<html>
<head>
	<title>Health Cases</title>
    <?php
    require("../conn_config.php");
    $result ="SELECT * FROM brgy_tbl ORDER BY brgy_id ASC";
    ?>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/style.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>

<body class="scrollbar-night-fade">
<div class="container">
<form action="hcases_deleteSelected.php" method="post">
    <table style="text-align: center;" class="table">
 
    <tr bgcolor='#CCCCCC'>
        <thead  class="grey lighten-2">
        <th> </th>
        <th>Barangay Name</th>
         <th>Action</th>
            </thead>
    </tr>

    <?php 
    foreach ($dbConn->query($result) as $row) {         
        echo '<tr>';
        echo "<td>".$row['brgy_id']."</td>";
        echo "<td>".$row['brgy_name']."</td>";
        echo "<td>

        <a class=\"text-warning\" href=\"brgy_update.php?brgy_id=$row[brgy_id]\">Edit</a></td></tr>";
    }

    ?>
 
    </table>
    </form>

</div>

</body>
</html>