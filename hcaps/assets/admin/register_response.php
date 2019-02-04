<?php
include("server.php");
// include("conn_config.php");
$qbrgy ="SELECT * FROM brgy_tbl";
$qstreet ="SELECT * FROM street_tbl";

if(empty($_SESSION['username'])){
header('location: register.php');
}

$sessionname = $_SESSION['username'];
$getrolename = "SELECT username FROM requests_tbl WHERE username='$sessionname'";

  $result = $dbConn->query($getrolename);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   $rolename=$row['username'];
  }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Caps</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">

</head>
<body class="access"> <!-- oncontextmenu="return false" -- disables right-click on mouse -->

  <!-- Alert -->

<!-- Alert -->
<!--sceen Overlay -->
<!-- <div id="overlay1"></div>
<div id="overlay2"></div>
 -->
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 responsediv">
  <h3>
    <p>Good Day <strong style="color: purple"><?php echo $rolename; ?></strong>!</p> <p>Your request has been sent successfully.</p>
    <p> Wait for the admin's approval.</p>

    <a class="btn btn-success ok" href="register_response.php?ok='1'">OK</a>
  </h3>
</div>

<div class="col-md-3"></div>
</div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

</body>
</html