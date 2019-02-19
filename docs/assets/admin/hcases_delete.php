<?php
require("conn_config.php");

$hcase_id = $_GET['hcase_id'];
 
$sql = "DELETE FROM hcases_tbl WHERE hcase_id=:hcase_id;";

$query = $dbConn->prepare($sql);
$query->execute(array(':hcase_id' => $hcase_id));

header("Location: hcases.php");
?>
