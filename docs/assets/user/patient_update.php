<?php 
include("default.php");
require("conn_config.php");
$per_id= $_REQUEST['per_id'];

if (!empty($_GET['per_id'])){
    $per_id=$_REQUEST['per_id'];
}
if(null==$per_id){
    header("Location: patient.php");
}

if(!empty($_POST))
{	
    $per_id=$_POST['per_id'];
    $per_bday =$_POST['per_bday'];
    $per_brgyid =$_POST['per_brgyid'];
    $per_hcaseid =$_POST['per_hcaseid'];
    $per_height =$_POST['per_height'];
    $per_weight =$_POST['per_weight'];
    $heightsq= $per_height * $per_height;
    $height= $heightsq*0.0001;
    $per_bmi =$per_weight/$height;
    $per_houseNo =$_POST['per_houseNo'];
    $per_name =$_POST['per_name'];
    $lname =   $_POST['lname'];
    $mname =   $_POST['mname'];
    $suffix =   $_POST['suffix'];
    $per_reportdate =$_POST['per_reportdate'];
    $per_sex =$_POST['per_sex'];
    $per_street= $_POST['per_street'];
    $dob = new DateTime($per_bday);
    $now = new DateTime();
    $difference = $now->diff($dob);
    $per_age= $difference->y;

    if(empty($suffix)){
    $suffix =  "";
}


if (empty($per_street)){

    $per_street='Update Later';
}


if(empty($per_houseNo)){
    $per_houseNo =  "";
}

if(empty($per_height)){
    $per_height =  "";
    $per_bmi="";
}

if(empty($per_weight)){
    $per_weight =  "";
    $per_bmi="";
}

if($per_age <= 1 ){
    $per_age ="Few Months Old";
}

$valid=true;

if($valid)
{
	$sql = "UPDATE persons_tbl SET
        per_age=:per_age,
        per_bday=:per_bday,
        per_bmi=:per_bmi,
        per_brgyid=:per_brgyid,
        per_hcaseid=:per_hcaseid,
        per_height=:per_height,
        per_houseNo=:per_houseNo,
        per_name=:per_name, lname=:lname, mname=:mname, suffix=:suffix,
        per_reportdate=:per_reportdate,
        per_sex=:per_sex,
        per_street=:per_street,
        per_weight=:per_weight
        WHERE
        per_id=:per_id";

 	    $query = $dbConn->prepare($sql);
        $query->bindparam(':per_id', $per_id);
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
        $query->bindparam(':per_sex', $per_sex);
        $query->bindparam(':per_street', $per_street);
        $query->bindparam(':per_weight', $per_weight);
        $query->execute();
        
        echo "<script>window.location.href='patient.php';</script>";
}

}

else{

// $sql="SELECT * FROM persons_tbl where per_id=?; SELECT * FROM hcases_tbl where hcase_id=?;";

 $sql ="SELECT per_id, per_age,
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
        per_weight, brgy_name, hcase_name FROM persons_tbl, hcases_tbl, brgy_tbl where per_id=? AND persons_tbl.per_hcaseid=hcases_tbl.hcase_id AND persons_tbl.per_brgyid=brgy_tbl.brgy_id";


$per_id= $_REQUEST['per_id'];

$query=$dbConn->prepare($sql);
$query->execute(array($per_id));
$data=$query->fetch(PDO::FETCH_ASSOC);
$per_id=$data['per_id'];
$per_bday =$data['per_bday'];
$per_brgyid =$data['per_brgyid'];
$per_hcaseid =$data['per_hcaseid'];
$per_height =$data['per_height'];
$per_weight =$data['per_weight'];
$per_bmi = $data['per_bmi'];
$per_houseNo =$data['per_houseNo'];
$per_name =$data['per_name'];
$lname = $data['lname'];
$mname = $data['mname'];
$suffix = $data['suffix'];
$per_reportdate =$data['per_reportdate'];
$per_sex =$data['per_sex'];
$per_street =$data['per_street'];
$per_age= $data['per_age'];
$brgy_name= $data['brgy_name'];
$hcase_name= $data['hcase_name'];
$hcase_name= $data['hcase_name'];

}

$qhcases ="SELECT * FROM hcases_tbl";
$qstreet ="SELECT * FROM street_tbl";
$qbrgy ="SELECT * FROM brgy_tbl";
?>
<section id="doccontent">

    <form method="POST" name="form2" id="red" action="patient_update.php">  <!-- onsubmit="return submitdata(); -->
    <div class="p-3 m-0 jumbotron row">
        <h3 class="col-sm-6">Patient Information Update</h3>
            <div class="col-xs-12 col-sm-6" style="text-align: center;">
             <button type="submit" class="btn btn-success" name="update">UPDATE</button>
             <input hidden type="text" name="per_id" value="<?php echo $per_id;?>">
             <button class="btn btn-warning" type="reset" name="reset">RESET</button>
            <a href="patient.php"><button class="btn btn-danger">CANCEL</button></a>  
        </div>
    </div>

    <div class="container">
        <div class="mr-0" style="margin-left: 10%;">
        <div class="row">
           <div class="m-1 col-xs-12 col-sm-3" style="text-align: center;">
             <label class="headerlabel">Last Name : </label>
             <input required  autofocus placeholder="Last Name" type="text" id="lname" name="lname" class="form-control" value="<?php echo $lname; ?>"> </div>
             
            <div class="mt-1 col-xs-12 col-sm-3" style="text-align: center;">
            <label class="headerlabel">First Name : </label>
             <input required  required autofocus placeholder="First Name" type="text" id="per_name" name="per_name" class="form-control" value="<?php echo $per_name; ?>"> </div>
           
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Middle Name : </label>
            <input required  type="text" class="form-control" name="mname" placeholder="Middle Name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $mname; ?>"></div>

            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
             <label class="headerlabel">Suffix Name : </label>
            <input type="text" class="form-control" name="suffix" placeholder="Suffix (optional)" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $suffix; ?>"></div>
        </div>

        <div class="mt-4 row">
            <div class="mb-1 mt-1 col-xs-12 col-sm-5" style="text-align: center;">
            <label class="headerlabel">Health Case : </label>
            <select required class="custom-select" id="per_hcaseid" name="per_hcaseid">
             <?php 
              echo "<option hidden selected value=".$per_hcaseid.">".$hcase_name."</option>";
                foreach ($dbConn->query($qhcases) as $row) {
                echo "<option value=".$row['hcase_id'].">".$row['hcase_name']."</option>";
                }
             ?>
             </select>
            </div>

         <div class="mb-1 mt-1 col-xs-12 col-sm-5" style="text-align: center;">
        <label class="headerlabel">Report Date : </label>
            <input required type="date" max="<?php
         echo date('Y-m-d');?>" value="<?php echo $per_reportdate;?>" id="per_reportdate" name="per_reportdate" class="form-control"></div>
        </div>

        <div class="mt-4 row">
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Birth Date : </label>
            <input required type="date" id="per_bday" name="per_bday" class="form-control" min="1900-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo $per_bday;?>"></div>
            
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Age : </label>
            <input disabled type="text" maxlength="3" id="per_age" placeholder="Age" name="per_age" class="form-control" value="<?php echo $per_age; ?>"></div>

            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Male : </label>
             <input checked type="radio" class="form-control" value="Male" id="per_sex" name="per_sex">
            </div>

            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Female : </label>
             <input type="radio" class="form-control" value="Female" id="per_sex" name="per_sex">
            </div>
        </div>
    
        <div class="mt-4 row">
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Height (cm) : </label>
            <input autofocus placeholder="Height" type="text" maxlength="3" id="per_height" name="per_height" class=" form-control" value="<?php echo $per_height; ?>"></div>
            
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Height (cm) : </label>
            <input type="text" id="per_weight" name="per_weight" placeholder="Weight"class="form-control" value="<?php echo $per_weight; ?>">
            </div>
    
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
              <label class="headerlabel">Body Mass Index : </label> <input disabled type="text" id="per_bmi" name="per_bmi" data-toggle="tooltip" title="" data-placement="right" placeholder="BMI" class="form-control" value="<?php echo $per_bmi; ?>">
            </div>   
           
         </div>

        <div class="mt-4 row">
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
             <label class="headerlabel">House No : </label>
            <input type="text" id="per_houseNo" name="per_houseNo" class="form-control" value="<?php echo $per_houseNo; ?>">
             </div>
             
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Street : </label>
            <select class="custom-select" id="per_street" name="per_street">
            <option hidden>--Select from the following--</option>
             <?php
            echo "<option hidden selected value=".$per_street.">".$per_street."</option>";  
            foreach ($dbConn->query($qstreet) as $row) {
            echo "<option>".$row['street_name']."</option>";
                }
             ?>
             </select>
            </div>
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Barangay : </label>
           <select class="custom-select" id="per_brgyid" name="per_brgyid">
           <option hidden>--Select from the following--</option>
             <?php
              echo "<option hidden selected value=".$per_brgyid.">".$brgy_name."</option>";  
            foreach ($dbConn->query($qbrgy) as $row) {
           echo "<option id=\"per_brgyid\" value=".$row['brgy_id'].">".$row['brgy_name']."</option>";
                }
             ?>
         </select>
            </div>
        </div>
    </div>
    <div class="row">
           <!-- buttons -->
    </div>

        <?php
         include("errors.php"); ?>
    </form>
    </div> 

</section>

<script src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();

   });
</script>

<script type="text/javascript">
$(document).ready(function(){
   $("#per_height, #per_weight").keyup(function(){
    var per_height = $("#per_height").val();
    var per_weight = $("#per_weight").val();
    var heightsq= per_height * per_height;
    var height= heightsq*0.0001;
    var per_bmi =per_weight/height;
    var rounded_bmi= per_bmi.toPrecision(4);

    if(rounded_bmi <= 18 && rounded_bmi >=15){
       $("#per_bmi").css("border","2px solid red");
        $("#per_bmi").css("font-size", "15px");
        $("#per_bmi").css("color", "red");
        $("#per_bmi").val(rounded_bmi+ "  Underweight").trigger(change);
    }

    else if(rounded_bmi <= 30 && rounded_bmi >18){
        $("#per_bmi").css("border","2px solid lightgreen");
        $("#per_bmi").css("color", "lightgreen");
         $("#per_bmi").val(rounded_bmi + "      Normal").trigger(change);   
    }

    else if(per_height =="" || per_weight ==""){
        $("#per_bmi").css("border", "");
        $(".indicator").text(""); 
        $("#per_bmi").val("").trigger(change);
  
    }

    });

});
</script>

<script type="text/javascript">

$(document).ready(function(){

    $("#per_bday").change(function(){
    var Bdate = document.getElementById('per_bday').value;
    var Bday = +new Date(Bdate);
    var per_age= ((Date.now() - Bday) / (31557600000));
    // var roundedage= per_age.toPrecision(3)
    var rounded_age = Math.round(per_age);   
    $("#per_age").val(rounded_age).trigger(change);
    
    });  
});
</script>

     <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

</body>
</html>