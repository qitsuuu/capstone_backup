<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<?php
    require("../conn_config.php");

	$hcase_id=$_GET['hcase_id'];

	$sql="SELECT * FROM hcases_tbl where hcase_id=?";

	$q=$dbConn->prepare($sql);
	$q->execute(array($hcase_id));

	$data=$q->fetch(PDO::FETCH_ASSOC);
    require("../css/dependencies.php");

    ?>

    <link rel="stylesheet" type="text/css" href="../css/style1.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/style.css">
    <link rel="stylesheet" type="text/css" href="../mdb/css/style.min.css">
</head>
<body>

		<form action="hcases_view.php" method="post">
		<div class ="col-sm-12">
		<br><br>
		<label class="col-sm-12 form-control-label"><h3 style="text-align: center; color: PURPLE">INFORMATION</h3></label>       
				<div style="margin-left: 15%; border:1px solid black;" class="p-3 col-sm-8">
				<?php echo 'Name : ' .$data['hcase_name'] .'<br>';?>
				<?php echo 'Health Case : ' . $data['hcase_desc'];?>
				</div>
				<a class="btn btn-dark" href="crud.php" style="float: right;"> <i class="material-icons">
				</i>Back</a>
			
				</div>
			</div>
		<br>
		</form>

</body>
</html> 