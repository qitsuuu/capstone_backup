<?php
include("default.php");
require("conn_config.php");
include("case_add2.php");
$qhcases ="SELECT * FROM hcases_tbl";
$qstreet ="SELECT * FROM street_tbl";
$qbrgy ="SELECT * FROM brgy_tbl";
?>
 <!-- <td><label class="headerlabel"> Patient's Name : </label> <input autofocus placeholder="Type Here" type="text" id="per_name" name="per_name" class="form-control">
            </td> -->
	<section id="doccontent">
	   <div id="div1">
    	<form method="POST" name="form1" id="red" action="case_add.php">  <!-- onsubmit="return submitdata(); -->

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
            <option hidden>--Select from the following--</option>
             <?php 
                foreach ($dbConn->query($qhcases) as $row) {
                echo "<option value=".$row['hcase_id'].">".$row['hcase_name']."</option>";
                }
             ?>
             </select>
            </div>

         <div class="mb-1 mt-1 col-xs-12 col-sm-5" style="text-align: center;">
        <label class="headerlabel">Report Date : </label>
            <input required type="date" max="<?php
         echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" id="per_reportdate" name="per_reportdate" class="form-control"></div>
        </div>

        <div class="mt-4 row">
    	   	<div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
    		<label class="headerlabel">Birth Date : </label>
    		<input required type="date" id="per_bday" name="per_bday" class="form-control" min="1900-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>"></div>
            
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Age : </label>
            <input disabled type="text" maxlength="3" id="per_age" placeholder="Age" name="per_age" class="form-control"></div>

            <div class="mb-1 mt-1 col-xs-2 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Male : </label>
             <input checked type="radio" class="form-control" value="Male" id="per_sex" name="per_sex">
            </div>

            <div class="mb-1 mt-1 col-xs-2 col-sm-2" style="text-align: center;">
            <label class="headerlabel">Female : </label>
             <input type="radio" class="form-control" value="Female" id="per_sex" name="per_sex">
            </div>
		</div>
    
        <div class="mt-4 row">
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Height (cm) : </label>
            <input autofocus placeholder="Height" type="number" maxlength="3" id="per_height" name="per_height" class=" form-control" value="<?php echo $per_height; ?>"></div>
            
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Height (cm) : </label>
            <input type="number" id="per_weight" name="per_weight" placeholder="Weight"class="form-control" value="<?php echo $per_weight; ?>">
            </div>
    
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
              <label class="headerlabel">Body Mass Index : </label> <input disabled type="text" id="per_bmi" name="per_bmi" data-toggle="tooltip" title="" data-placement="right" placeholder="BMI" class="form-control" value="<?php echo $per_bmi; ?>">
            </div>   
           
         </div>

        <div class="mt-4 row">
            <div class="mb-1 mt-1 col-xs-12 col-sm-2" style="text-align: center;">
             <label class="headerlabel">House No : </label>
          	<input type="number" id="per_houseNo" name="per_houseNo" class="form-control" value="<?php echo $per_houseNo; ?>">
             </div>
             
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Street : </label>
      		<select class="custom-select" id="per_street" name="per_street">
            <option hidden>--Select from the following--</option>
             <?php  
            foreach ($dbConn->query($qstreet) as $row) {
           echo "<option>".$row['street_name']."</option>";
                }
             ?>
             </select>
            <!--  <input type="text" id="street2" name="street2" class="form-control" placeholder="If none, specify Street here"> -->
            </div>
            <div class="mb-1 mt-1 col-xs-12 col-sm-4" style="text-align: center;">
            <label class="headerlabel">Barangay : </label>
           <select class="custom-select" id="per_brgyid" name="per_brgyid">
           <option hidden>--Select from the following--</option>
             <?php  
            foreach ($dbConn->query($qbrgy) as $row) {
           echo "<option id=\"per_brgyid\" value=".$row['brgy_id'].">".$row['brgy_name']."</option>";
                }
             ?>
         </select>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-12 col-sm-12" style="text-align: center;">
                <center>
             <button type="submit" class="btn btn-success" name="add">INSERT</button>
             <input hidden type="text" name="per_id" value=<?php echo $per_id;?>>
             <button class="btn btn-warning" type="reset" name="reset">RESET</button>
            <a href="dashboard.php"><button class="btn btn-danger">CANCEL</button></a> 
            </center> 
            </div>
    </div>
        </div>
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
        $("#per_bmi").css("border","2px solid green");
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

<!-- <script type="text/javascript">


  function submitdata()
  {
    var per_bday = $("#per_bday").val();
    var per_brgyid = $("#per_brgyid").val();
    var per_hcaseid = $("#per_hcaseid").val();
    var per_height = $("#per_height").val();
    var per_weight = $("#per_weight").val();
    var per_houseNo = $("#per_houseNo").val();
    var per_name = $("#per_name").val();
    var per_reportdate = $("#per_reportdate").val();
    // var heightsq= per_height * per_height;
    // var per_bmi = per_weight/heightsq;
    var per_sex =$("#per_sex").val();
    var per_street = $("#per_street").val();

    // var postData = $(this).serializeArray();
   $.ajax({
    method: 'post',
    url: 'case_add2.php',
    data: {
        per_name: per_name,
        per_bday: per_bday,
        per_bmi: per_bmi,
        per_brgyid: per_brgyid,
        per_hcaseid: per_hcaseid,
        per_height: per_height,
        per_houseNo: per_houseNo,
        per_reportdate: per_reportdate,
        per_bmi: per_bmi,
        per_sex: per_sex,
        per_street: per_street,
        per_weight: per_weight
    },

    success: function (data) {
    // window.location.href='dashboard.php';
    // window.location.href='patient.php';
    }

    error: function(){
      console.log();
    }
    
   });
      
   return false;
  }

</script> -->
     <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>



</body>
</html>
