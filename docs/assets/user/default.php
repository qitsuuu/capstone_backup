<?php
include('server.php');
if(empty($_SESSION['username'])){
header('location: ../admin/signin.php');
}

$qhcases ="SELECT * FROM hcases_tbl";
$qstreet ="SELECT * FROM street_tbl";
$qbrgy ="SELECT * FROM brgy_tbl";
$sessionname = $_SESSION['username'];

$getroleinfo ="SELECT *, brgy_name FROM ((user_tbl INNER JOIN role_tbl ON user_tbl.reqrole_id=role_tbl.role_id) INNER JOIN brgy_tbl ON role_tbl.brgyid=brgy_tbl.brgy_id) WHERE username='$sessionname'";

	$result = $dbConn->query($getroleinfo);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	 $rolename=$row['role_name'];
 	 $roleid=$row['role_id'];
    $brgyid=$row['brgy_id'];
    $brgyname=$row['brgy_name'];
    	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Barangay Admin</title>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
   	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">

<style type="text/css">
	.card{
	display: none;
	border:none;
}
</style>

</head>
<body class="scrollbar-night-fade">

	<main>
<!-- TOP NAV -->
		<header class="header">
     		<nav class="col-md-12 topnav p-0 navbar-expand-lg navbar-light tngradient">
     	
     			<div class="logo">
 					<h1 style="text-align: center;"><i style="color: pink" class="fa fa-heartbeat" aria-hidden="true"></i></h1>
 					<p>Health Cases Profiling System of SIMHS</p>
 				</div>
	     		<div class="topnav-holder col-md-11">
	     			<ul class="nav">
				    <li class="nav-item col-md-6">
				     
				    </li>
				    
				    <li class="nav-item">
				      <div class="datetime col-md-12">
				      	<p id="timeholder"></p>
				      	<p id="dateholder"></p>
				      </div>

				    </li>
					<li class="nav-item">
				      <a class="add pt-0 pb-0 ml-2 mb-0 nav-link" data-toggle="tooltip" title="Add Health Case" data-placement="bottom"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD</a>
				    </li>
				 	</ul>
	     		</div>
		
     		</nav>
		</header>

<!-- SIDE NAV -->
		<aside>
			<div class="sidebar tngradient">
				<div class="div userprofile row">
					<!-- <div class="p-2 col-md-2">
					<center class="h1"><i class="fa fa-user-circle-o"></i></center>
					</div> -->
					<div class="p-0 col-md-12" style="background-color: ;">
					<center><h4 class="pt-2 m-0"><?php echo $_SESSION['username']; ?></h4><p class="rolename"><?php echo $rolename;?></p></center>
					</div>
					<div class="col-md-12 useropts">
					
					<p><a class="text-warning" href="user_index.php?logout='1'">Sign Out</a></p>
					</div>
				</div>

				
				<div class="div listholder scrollbar-night-fade">
					<label class="sidebar-main home"><a name="home" id="home" href="user_index.php"><!-- <i class="fa fa-home"></i>  -->Home</a></label>

					<label class="sidebar-main" href="#">Health Records</label>
					<div class="sidebar-tab">
						<a name="patient" id="patient" href="patient.php">Patients<span class="badge badge-light"><?php echo $patcount;  ?></span></a>
						<a name="hcases" id="hcases" href="hcases.php">Health Cases<span class="badge badge-light"><?php echo $casecount;  ?></span></a>
					</div>
					<label class="sidebar-main" href="#">Case Reports</label>
					<div class="sidebar-tab">
						<a href="monthlyrep_tbl.php" id="month"><!-- i class="fa fa-file"></i> -->Monthly</a>
						<a href="annualrep_tbl.php" id="yearly2">Annual</a>
						<!-- <a id="prints" href="printpage.php">Print Reports</a> -->
					</div>
					
				</div>

			</div>
		</aside>