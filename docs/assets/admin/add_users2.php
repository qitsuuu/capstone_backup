<?php
$per_name= "";
$lname= "";
$mname= "";
$suffix="";
$per_bday ="";
$per_sex = "";
$per_houseNo = "";
$per_street = "";
$per_brgyid = "";
$per_roleid = "";
$per_username = "";
$per_email = "";
$hashpassword="";
$per_password="";
$per_reportdate ="";
$errors = array();
include("conn_config.php");

if(isset($_POST['add_user']))
{
	$per_name =   $_POST['per_name'];
	$lname =   $_POST['lname'];
	$mname =   $_POST['mname'];
	$suffix =   $_POST['suffix'];
    $per_bday =   $_POST['per_bday'];
    $per_houseNo  =  $_POST['per_houseNo'];
    $per_street =  $_POST['per_street'];
	$per_brgyid =  $_POST['per_brgyid'];
    $per_roleid = $_POST['per_roleid'];
	    $dob = new DateTime($per_bday);
	    $now = new DateTime();
	    $difference = $now->diff($dob);
    $per_age= $difference->y;
    $per_reportdate= date("Y/m/d");
    $per_username = $_POST['per_username'];
	$per_email = $_POST['per_email'];
    $password_1= $_POST['password_1'];
	$password_2 =$_POST['password_2'];


$chkroleid = "SELECT COUNT(role_id) AS 'count' FROM role_tbl WHERE role_id='$per_roleid'";

	$result = $dbConn->query($chkroleid);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	 $roleid=$row['count'];
	}

if(!empty($per_roleid) && $roleid == 0 && $roleid != 1){
	// echo $roleid; checker
	array_push($errors, "Invalid Access ID");
}
if(empty($per_email)){
	array_push($errors, "E-mail is required");
}

if(!empty($per_email) && !filter_var($per_email, FILTER_VALIDATE_EMAIL)){
	array_push($errors, "Enter a valid email");
}


$chkusername= "SELECT COUNT(username) AS 'count' FROM user_tbl WHERE username='$per_username'";

	$result = $dbConn->query($chkusername);
 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 	 $username=$row['count'];
	}

if($username!=0){
	array_push($errors, "Username already taken");
}

if(empty($per_name)){
	array_push($errors, "Username is required");
}

if(empty($password_1)){
	array_push($errors, "Password is required");
}

if($password_1 != $password_2){
	array_push($errors, "The two passwords didn't match");
}

if(empty($suffix)){
	$suffix =  "";
}


if(count($errors) == 0)
{	
	$per_password= $password_1;
	$insert = "INSERT INTO user_tbl (name, lname, mname, suffix, bday, age, houseNo, street, brgyid, reqrole_id, username, password, email, date_requested) VALUES (:name, :lname, :mname, :suffix, :bday, :age, :houseNo, :street, :brgyid, :reqrole_id, :username, :password, :email, :date_requested)";

	$query = $dbConn->prepare($insert);
	$query->bindparam(':name', $per_name);
	$query->bindparam(':lname', $lname) ;
	$query->bindparam(':mname', $mname) ;
	$query->bindparam(':suffix', $suffix);
	$query->bindparam(':bday', $per_bday);
	$query->bindparam(':age', $per_age);
	$query->bindparam(':houseNo', $per_houseNo);
	$query->bindparam(':street', $per_street);
	$query->bindparam(':brgyid', $per_brgyid);
	$query->bindparam(':reqrole_id', $per_roleid);
	$query->bindparam(':username', $per_username);
	$query->bindparam(':password', $per_password);
	$query->bindparam(':email', $per_email);
	$query->bindparam(':date_requested', $per_reportdate);
	$query->execute();
	header("location: users.php");
}


}

?>