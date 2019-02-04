<?php
include("server.php");
// include("conn_config.php");
$qbrgy ="SELECT * FROM brgy_tbl";
$qstreet ="SELECT * FROM street_tbl";
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

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 registerdiv">
  <ul class="nav nav-tabs" role="tablist">
    <li class="p-0 col-md-6 nav-item">
      <a class="nav-link active" data-toggle="tab" href="#signup">Sign Up</a>
    </li>
    <li class="p-0 col-md-6 nav-item">
      <a class="nav-link" href="./signin.php">Sign In</a>
    </li>
  </ul>

<!-- SIGNUP -->  
<center><h1 class="name">Health Caps</h1></center>

  <div class="tab-content">
   <div id="signup" class="container tab-pane active scrollbar-night-fade"><br>
      <form method="post" action="register.php" id="signupform">
      <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input  required type="text" class="form-control" name="per_name" placeholder="Last Name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_name; ?>">
        <input required type="text" class="form-control" name="lname" placeholder="First Name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $lname; ?>">
        <input required type="text" class="form-control" name="mname" placeholder="Middle Name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $mname; ?>">
        <input type="text" class="form-control" name="suffix" placeholder="Suffix (optional)" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $suffix; ?>">
       </div>
     </p>
     <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input  requiredtype="text" class="form-control" name="per_roleid" placeholder="Access ID" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_roleid; ?>">
       </div>
     </p>

      <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="text" disabled class="form-control" placeholder="Date of Birth" aria-label="Small" aria-describedby="inputGroup-sizing-sm"><input type="date" class="form-control" name="per_bday" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_bday; ?>">
       </div>
     </p>
     <p>

       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="text" class="form-control" name="per_houseNo" placeholder="House No." aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_houseNo; ?>">
        <input required type="text" class="form-control" name="per_street" placeholder="Street" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_street; ?>">
        <input required type="text" class="form-control" name="per_brgyid" placeholder="Barangay" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_brgyid; ?>">
        
       </div>
     </p>
      <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="email" class="form-control" name="per_email" placeholder="Email" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_email; ?>">
       </div>
     </p>
      <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input required type="text" class="form-control" name="per_username" placeholder="Username" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_username; ?>">
       </div>
     </p>
     <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input required type="password" min="5" class="form-control" name="password_1" placeholder="Preferred Password" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
       </div>
     </p>
      <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="password" class="form-control" name="password_2" placeholder="Confirm Password" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
       </div>
     </p>

     <p>
  <!--  <input type="button" class="align-self-left btn btn-warning" value="Cancel"> -->
    <center><button type="button" class=" btn btn-warning cancel" onclick="cancel()">Cancel</button>

     <button type="submit" class="btn btn-primary" name="register">Submit</button></center>
   
     </p>

      </form>
       <?php include("errors.php"); ?>
    </div>

</div>
</div>

<div class="col-md-3"></div>
</div>

    <script src="../js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">

      $(document).ready(function(){

      $('.cancel').click(function(){
      window.location.href='register.php';

      });
    });
    </script>
    <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!--     <script src="assets/js/bootstrap.js" type="text/javascript"></script> -->
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

</body>
</html