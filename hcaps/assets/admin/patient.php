<?php 
include('server.php');
include("notifcount.php");
$qhcases ="SELECT * FROM hcases_tbl";
$qbrgy ="SELECT * FROM brgy_tbl";

if(empty($_SESSION['username'])){
header('location: signin.php');
}

$sessionname = $_SESSION['username'];
$getrolename = "SELECT role_name FROM user_tbl, role_tbl WHERE user_tbl.reqrole_id=role_tbl.role_id AND username='$sessionname'";

	$result = $dbConn->query($getrolename);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	 $rolename=$row['role_name'];
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Health Caps</title>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mdb.css">
    <link rel="stylesheet" type="text/css" href="../css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
   	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">

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
			      <a class="nav-link search1">
			      	<form>
			      	<input id="search_text" type="search" placeholder="Search Here" class="col-md-12 search">
			      	<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			      	</form>
			      </a>
			    </li>
			     <li class="nav-item search2">
				  	<a class="nav-link"><i class="fa fa-search" aria-hidden="true"></i></a>
				 </li>
			    <!--  <li class="nav-item">
				  	<a class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
				  </li>
			    <li class="nav-item">
			      <a class="nav-link"><i class="fa fa-bell" aria-hidden="true"></i></a>
			    </li> -->
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
				
				<p><a class="text-warning" href="dashboard.php?logout='1'">Sign Out</a></p>
				</div>
			</div>
			
			<div class="div listholder scrollbar-night-fade">
					<label class="sidebar-main home"><a name="home" id="home" href="dashboard.php"><!-- <i class="fa fa-home"></i>  -->Home</a></label>

					<label class="sidebar-main" href="#">Health Records</label>
					<div class="sidebar-tab">
						<a name="patient" id="patient" href="patient.php">Patients<span class="badge badge-light"><?php echo $patcount;  ?></span></a>
						<a name="hcases" id="hcases" href="hcases.php">Health Cases<span class="badge badge-light"><?php echo $casecount;  ?></span></a>
					</div>
					<label class="sidebar-main" href="#">Case Reports</label>
					<div class="sidebar-tab">
						<a href="monthlyrep_tbl.php" id="month"><!-- i class="fa fa-file"></i> -->Monthly</a>
						<a href="annualrep_tbl.php" id="yearly2">Annual</a>
						<a id="prints" href="printpage.php">Print Reports</a>
					</div>
					
					<label class="sidebar-main" href="#"><!-- <i class="fa fa-wrench"></i> --> Manage</label>
					<div class="sidebar-tab">
						<a name="users" id="users" href="users.php">Users<span class="badge badge-light"><?php echo $usercount;  ?></span></a>
						<a name="users" id="reqs" href="requests.php">Requests<span class="badge badge-light"><?php echo $reqcount;  ?></span></a>
						<!-- <a name="brgy" id="brgy" href="#">Barangays</a> -->
						<!-- <li><a name="brgy" id="brgy" href="#">Account</a></li> -->
					</div>
				</div>

		</div>
	</aside>

<section id="doccontent">
<div class="p-1 mb-2 jumbotron">
<form method="POST" id="form">
 <div class="input-group">
 	<select class="m-1 btn-outline-default custom-select" id="recordyear" name="recordyear">
		<option hidden>Patients</option>
		<?php
		$years ="SELECT DISTINCT(YEAR(per_reportdate)) as 'years' from persons_tbl ORDER BY (YEAR(per_reportdate)) DESC";
		echo "<option selected value=".date('Y').">".date('Y')."</option>";
        foreach ($dbConn->query($years) as $row) {
        echo "<option value=".$row['years'].">".$row['years']."</option>";
        }
		?>

	</select>

 <!-- Health Case -->
  <select required class="m-1 btn-outline-secondary custom-select" id="hcase" name="hcase">
	<option>Filter By Case</option>
	 <?php  
	foreach ($dbConn->query($qhcases) as $row) {
	echo "<option value=".$row['hcase_id'].">".$row['hcase_name']."</option>";
	    }
	 ?>
	 </select>

<!-- Month -->
  <select class="m-1 btn-outline-success custom-select" id="month1" name="month1">
  	  <option hidden>Filter by Month</option>
      <option value="January">January</option>
      <option value="February">February</option>
      <option value="March">March</option>
      <option value="April">April</option>
      <option value="May">May</option>
      <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
      <option value="September">September</option>
      <option value="October">October</option>
      <option value="November">November</option>
      <option value="December">December</option>
	</select>

  <!-- Gender -->
  <select class="m-1 btn-outline-primary custom-select" id="gender" name="gender">
  <option hidden>Filter by Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  </select>
	
	</div>

	<div class="row">
	 <h4 class="col-sm-5 m-3">Results Count : <label class="m-0 countlabel"> </label> </h4>
 <!-- <button class="btn btn-secondary" type="button" name="filterbut" id="filterbut">SUBMIT</button> -->
	
	<div class="ml-3 col-xs-12 col-sm-6" style="text-align: right;">
	<button class="btn btn-warning" type="reset" name="reset" id="reset">RESET FIlTERS</button>
	</div>
	</div>

	</form>

    </div>

	<div id="div1" style="height: 65vh; overflow-y: auto;">

	</div>	

	</section>
	<footer>All Rights Reserved © QinEliza December, 2018 </footer>
	
	</main>


  <!-- JS -->
    <script src="../js/jquery-3.3.1.min.js"></script>

<script>
$(document).ready(function(){

		$("#patient").addClass("activetab");
		// var todate = new Date;
		// var currentyear = todate.getFullYear(todate);
		// var selectedyear = $("#recordyear").val(currentyear);
		$("#reset").click(function(){
			window.location.href='patient.php';
		});

//select year 
		$("#recordyear").change(function(){
		$("#month1, #gender, #hcase").prop('selectedIndex',0);

		$("#search_text").val("");
		var year =$("#recordyear").val();
		// var postData = $(this).serializeArray();
		$.ajax({
		method: 'post',
		url: 'patient2.php',
		data: {
		    year: year
		},

		success: function (html) {
		$("#div1").html(html);
		// window.location.href='dashboard.php';
		}

		});
		  
		return false;
		});

// SELECT CASE
		$("#hcase").change(function(){
		$("#month1").prop('selectedIndex',0);
		$("#gender").prop('selectedIndex',0);
		$("#search_text").val("");
		var year =$("#recordyear").val();
		var hcase = $("#hcase").val();

		// var postData = $(this).serializeArray();
		$.ajax({
		method: 'post',
		url: 'patient_bycase.php',
		data: {
			hcase: hcase,
		    year: year,
		},

		success: function (html) {
		$("#div1").html(html);
		// window.location.href='dashboard.php';
		}

		});
		  
		return false;

		});

		// SELECT MONTH
		$("#month1").change(function(){
		$("#gender").prop('selectedIndex',0);
		$("#search_text").val("");
		var month = $("#month1").val();
		var year =$("#recordyear").val();
		var hcase = $("#hcase").val();

		$.ajax({
		method: 'post',
		url: 'patient_bymonth.php',
		data: {
			month: month,
			hcase: hcase,
		    year: year,
		},

		success: function (html) {
		$("#div1").html(html);
		// window.location.href='dashboard.php';
		}

		});
		  
		return false;

		});

//GENDER
// SELECT CASE
		$("#hcase").change(function(){
		$("#month1").prop('selectedIndex',0);
		$("#search_text").val("");
		var sex = $("#gender").val();
		var month = $("#month1").val();
		var year =$("#recordyear").val();
		var hcase = $("#hcase").val();
		// var postData = $(this).serializeArray();
		$.ajax({
		method: 'post',
		url: 'patient_bycase.php',
		data: {
			sex: sex,
			hcase: hcase,
		    year: year,
		    month: month
		    
		},

		success: function (html) {
		$("#div1").html(html);
		// window.location.href='dashboard.php';
		}

		});
		  
		return false;

		});



// default
		load_search();
	 function load_search(query)
		 {
		  $.ajax({
		   url:"patient2.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('#div1').html(data);
		   }
		  });
		 }

		 $('#search_text').keyup(function(){

		  var search = $(this).val();
		  if(search != '')
		  {
		  load_search(search);
		  }
		  else
		  {
		   load_search();
		  }
	 });

	});
    </script>

<script> 
</script>

	<script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

</body>
</html>



