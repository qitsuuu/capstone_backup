<?php
require("conn_config.php");

$selected=$_POST['selector'];

$N = count($selected);
for($i=0; $i < $N; $i++)
	{
		$result = $dbConn->prepare("DELETE FROM hcases_tbl WHERE hcase_id=:hcase_id");
		$result->bindParam(':hcase_id', $selected[$i]);
		$result->execute();
	}

header("Location: hcases.php");

?>