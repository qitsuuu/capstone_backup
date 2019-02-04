<?php
require("conn_config.php");

$hcase_id = $_GET['hcase_id'];
 
$sql = "SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE hcases_tbl; SET FOREIGN_KEY_CHECKS=1";
$query = $dbConn->prepare($sql);
$query->execute(array(':hcase_id' => $hcase_id));

header("Location: hcases.php");
?>