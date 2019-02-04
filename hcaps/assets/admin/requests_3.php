 <?php
	 require("conn_config.php");

	$req_id = $_POST['req_id'];
	$select ="SELECT * FROM requests_tbl WHERE req_id='$req_id'";

	$result = $dbConn->query($select);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	$per_id=$row['req_id'];
 	 $per_name=$row['name'];
 	 $lname=$row['lname'] ;
	 $mname=$row['mname'];
	 $suffix=$row['suffix'];
	 $per_age=$row['age'];
	 $per_password=$row['password'];
	 $per_roleid=$row['reqrole_id'];
	 $per_username=$row['username'];
	 $per_email=$row['email'];
	 $per_bday=$row['bday'];
	 $per_houseNo=$row['houseNo'];
	 $per_street=$row['street'];
 	$per_brgyid=$row['brgyid'];
	}

	$per_reportdate=date("Y/m/d");
	
	$insert = "INSERT INTO user_tbl (SELECT * FROM requests_tbl WHERE req_id='$per_id')";

	$query= $dbConn->prepare($insert);
	$query->bindparam(':name', $per_name);
	$query->bindparam(':lname', $lname) ;
	$query->bindparam(':mname', $mname) ;
	$query->bindparam(':suffix', $suffix);
	$query->bindparam(':bday', $per_bday);
	$query->bindparam(':age', $per_age);
	$query->bindparam(':houseNo', $per_houseNo);
	$query->bindparam(':street', $per_street);
	$query->bindparam(':brgy', $per_brgyid);
	$query->bindparam(':role_id', $per_roleid);
	$query->bindparam(':username', $per_username);
	$query->bindparam(':password', $per_password);
	$query->bindparam(':email', $per_email);
	$query->bindparam(':date_created', $per_reportdate);
	$query->execute();
	$done=true;

	if($done){
	$sql = "DELETE FROM requests_tbl WHERE req_id=:req_id;";
	$query = $dbConn->prepare($sql);
	$query->execute(array(':req_id' => $req_id));

	header("Location: requests.php");
	}
	else{
		header("Location: dashboard.php");
	}
?>
