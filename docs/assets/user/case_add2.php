<?php
include("conn_config.php");
$per_name ="";
$lname= "";
$mname= "";
$suffix="";
$per_age ="";
$per_bday ="";
$per_bmi ="";
$per_brgyid ="";
$per_email ="";
$per_hcaseid ="";
$per_height ="";
$per_houseNo ="";
$per_id ="";
$per_password ="";
$per_reportdate ="";
$per_roleid ="";
$per_sex ="";
$per_street ="";
$per_username ="";
$per_weight ="";
$errors = array();

if(isset($_POST['add'])) {

$per_bday =$_POST['per_bday'];
$per_brgyid =$_POST['per_brgyid'];
$per_hcaseid =$_POST['per_hcaseid'];
$per_height =$_POST['per_height'];
$per_weight =$_POST['per_weight'];
$heightsq= $per_height * $per_height;
$height= $heightsq*0.0001;
$per_houseNo =$_POST['per_houseNo'];
$per_name =$_POST['per_name'];
$lname =   $_POST['lname'];
$mname =   $_POST['mname'];
$suffix =   $_POST['suffix'];
$per_reportdate =$_POST['per_reportdate'];
$per_sex =$_POST['per_sex'];
$per_street = $_POST['per_street'];
$dob = new DateTime($per_bday);
$now = new DateTime();
$difference = $now->diff($dob);
$per_age= $difference->y;
$per_roleid = 'patient';

if (empty($per_street)){

    $per_street='Update Later';
}

if(empty($per_houseNo)){
    $per_houseNo =  " ";
}

if(empty($per_height)){
    $per_height =  "";
    $per_bmi="";
}

if(empty($per_weight)){
    $per_weight =  "";
    $per_bmi="";
}

if(!empty($per_height) && !empty($per_weight)){

    $round_bmi =$per_weight/$height;
    $per_bmi = round($round_bmi, 4);
}

if($per_age <= 1 ){
    $per_age ="Months Old";
}

    $insert = "INSERT INTO persons_tbl(
        per_age,
        per_bday,
        per_bmi,
        per_brgyid,
        per_hcaseid,
        per_height,
        per_houseNo,
        per_name, lname, mname, suffix,
        per_reportdate,
        per_roleid,
        per_sex,
        per_street,
        per_weight)
        VALUES (
        :per_age,
        :per_bday,
        :per_bmi,
        :per_brgyid,
        :per_hcaseid,
        :per_height,
        :per_houseNo,
         :per_name, :lname, :mname, :suffix,
        :per_reportdate,
        :per_roleid,
        :per_sex,
        :per_street,
        :per_weight)";

// :per_name, :per_hcaseid, :per_age, :per_bday, :per_brgyid, :per_role

        $query = $dbConn->prepare($insert);
        $query->bindparam(':per_age', $per_age);
        $query->bindparam(':per_bday', $per_bday);
        $query->bindparam(':per_bmi', $per_bmi);
        $query->bindparam(':per_brgyid', $per_brgyid);
        $query->bindparam(':per_hcaseid', $per_hcaseid);
        $query->bindparam(':per_height', $per_height);
        $query->bindparam(':per_houseNo', $per_houseNo);
        $query->bindparam(':per_name', $per_name);
        $query->bindparam(':lname', $lname);
        $query->bindparam(':mname', $mname);
        $query->bindparam(':suffix', $suffix);
        $query->bindparam(':per_reportdate', $per_reportdate);
        $query->bindparam(':per_roleid', $per_roleid);
        $query->bindparam(':per_sex', $per_sex);
        $query->bindparam(':per_street', $per_street);
        $query->bindparam(':per_weight', $per_weight);
        $query->execute();

       echo "<script>window.location.href='patient.php';</script>";
}
?>