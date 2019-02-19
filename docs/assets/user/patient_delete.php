 <?php
 require("conn_config.php");

$per_id = $_POST['per_id'];
$sql = "DELETE FROM persons_tbl WHERE per_id=:per_id;";

$query = $dbConn->prepare($sql);
$query->execute(array(':per_id' => $per_id));

// header("Location: case_add2.php");

?>
