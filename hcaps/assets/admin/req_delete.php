 <?php
 require("conn_config.php");

$req_id = $_POST['req_id'];
$sql = "DELETE FROM requests_tbl WHERE req_id=:req_id;";

$query = $dbConn->prepare($sql);
$query->execute(array(':req_id' => $req_id));

header("Location: requests_2.php");

?>