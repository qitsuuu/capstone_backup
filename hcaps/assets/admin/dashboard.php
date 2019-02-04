<?php 
include('server.php');
include("notifcount.php");
if(empty($_SESSION['username'])){
header('location: signin.php');
}

$sessionname = $_SESSION['username'];
$getrolename = "SELECT * FROM user_tbl, role_tbl WHERE user_tbl.reqrole_id=role_tbl.role_id AND username='$sessionname'";

	$result = $dbConn->query($getrolename);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	 $rolename=$row['role_name'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Health Caps Admin</title>

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

<!-- Session -->
<?php if(isset($_SESSION['success'])):  ?>
<div class="alert alert-success success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php if (isset($_SESSION["username"])): ?>
	<h5 style="text-align: center;"><p>Welcome <strong>
	<?php
	$result = $dbConn->query($getrolename);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	 $username=$row['name'];
	}

	echo $username; ?></strong>!</p>
	<?php endif ?>
	<p>
	<?php
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	 ?>
	</p>
 </h5>
</div>
<?php endif ?>
<!-- Session -->

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
				      <!-- <a class="nav-link search1">
				      	<form>
				      	<input id="search_text" type="search" placeholder="Search Here" class="col-md-12 search">
				      	<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				      	</form>
				      </a> -->
				    </li>
				     <!-- <li class="nav-item search2">
					  	<a class="nav-link"><i class="fa fa-search" aria-hidden="true"></i></a>
					 </li>
				     <li class="nav-item">
					  	<a class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
					  </li>
				    <li class="nav-item">
				      <a class="nav-link"><i class="fa fa-bell" aria-hidden="true"></i>
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
				<!-- 
				<div class="rightside col-md-5" style="background-color:  ;">
				  <ul class="nav justify-content-center f-right">
					  <li class="nav-item">
					  	<a class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i></a>
					  </li>
				    <li class="nav-item">
				      <a class="nav-link"><i class="fa fa-bell" aria-hidden="true"></i></a>
				    </li>
				    <li class="nav-item">
				      <div class="datetime">
				      	<p id="timeholder"></p>
				      	<p id="dateholder"></p>
				      </div>

				    </li>
				  
				  </ul>
				</div> -->
		
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
						<a name="users" id="users" href="requests.php">Requests<span class="badge badge-light"><?php echo $reqcount;  ?></span></a>
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
		<?php
		$years ="SELECT DISTINCT(YEAR(per_reportdate)) as 'years' from persons_tbl ORDER BY (YEAR(per_reportdate)) DESC";
		echo "<option hidden selected value=".date('Y').">".date('Y')."</option>";
        foreach ($dbConn->query($years) as $row) {
        echo "<option value=".$row['years'].">".$row['years']."</option>";
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
	
	<button class="btn btn-warning" type="reset" name="reset" id="reset">RESET FIlTERS</button>
	 <!--  <button disabled name="b_print" type="button" class="btn btn-default" onClick="printdiv('div1');">PRINT GRAPHS</button> -->
	</div>
	</div>

	</form>
    </div>

		<div id="div1">
		

		</div>	
	</section>
	<footer>All Rights Reserved © QinEliza December, 2018 </footer>
	</main>


  <!-- JS -->
  
    <script src="../js/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("#div1").load("si_graph.php");
        var todate = new Date();
        var currentmonth = todate.getMonth(todate);
        $("#month1").prop('selectedIndex', currentmonth);

		window.setTimeout(function() {
	    $(".alert").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove();
	    });
		},4000);

	    $(".add").click(function(){
	    // $("#div1").load("a_add.php");
	    $("#div1").delay(100).queue(function( nxt ) {
    	$("#div1").load("case_add1.php");
    	nxt();
	    });
		});

		$("label:first-child").addClass("activetab");



		$("#reset").click(function(){
			window.location.href='dashboard.php';
		});

	//select year 
		$("#recordyear").change(function(){
		// $("#month1").prop('selectedIndex',0);

		var year =$("#recordyear").val();
		var month =$("#month1").val();
		// var postData = $(this).serializeArray();
		$.ajax({
		method: 'post',
		url: 'si_graph.php',
		data: {
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

	//select month 
		$("#month1").change(function(){
		// $("#month1").prop('selectedIndex',0);
		var year =$("#recordyear").val();
		var month =$("#month1").val();
		// var postData = $(this).serializeArray();
		$.ajax({
		method: 'post',
		url: 'si_graph_month.php',
		data: {
		    month: month,
		     year: year
		},

		success: function (html) {
		$("#div1").html(html);
		// window.location.href='dashboard.php';
		}

		});
		  
		return false;
		});

	});

	</script>

	 <script type="text/javascript">
	$(document).ready(function(){
	       $('[data-toggle="tooltip"]').tooltip();

	   });
	</script>

  <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

<script> 
	function printdiv(div1)
	{
    var month =$("#month1").val();
    var filters= "<h6>Month : " + month +"</h6>";
    var headstr = "<html><head><title></title></head><body>";
	var footstr = "</body>";

	var newstr = document.all.item(div1).innerHTML;
	var oldstr = document.body.innerHTML;
	document.body.innerHTML = headstr+newstr+footstr;
	window.print();
	document.body.innerHTML = oldstr;
	window.close();
	window.location.href='dashboard.php';
	}
	</script>

</body>
</html>