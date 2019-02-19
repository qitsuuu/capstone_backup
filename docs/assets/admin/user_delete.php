 <?php
 require("conn_config.php");
$user_id = $_POST['user_id'];
$sql = "DELETE FROM user_tbl WHERE user_id=:user_id;";

$query = $dbConn->prepare($sql);
$query->execute(array(':user_id' => $user_id));

header("Location: users2.php");

?>