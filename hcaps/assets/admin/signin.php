<?php
include("server.php");
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

<!--sceen Overlay -->
<!-- <div id="overlay1"></div>
<div id="overlay2"></div> -->

<div class="row">

<div class="col-md-3"></div>

<div class="col-md-4 signindiv">
  <ul class="nav nav-tabs" role="tablist">
    <li class="p-0 col-md-6 nav-item">
      <a class="nav-link" href="./register.php">Sign Up</a>
    </li>
    <li class="p-0 col-md-6 nav-item">
      <a class="nav-link active" data-toggle="tab" href="#signin">Sign In</a>
    </li> 
  </ul>

<!-- SIGN IN -->
  <div class="tab-content">
    <div id="signin" class="container tab-pane active"><br>
     <center><h1 class="pb-2 name">Health Caps</h1></center>

     <form method="post" action="signin.php" id="signinform">
      <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="text" class="form-control" name="per_username" placeholder="Username" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_username; ?>">
       </div>
     </p>
     <p>
       <div class="input-group input-group-md">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="password" class="form-control" name="per_password" placeholder="Password" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
       </div>
     </p>

      <p>

  <!--  <input type="button" class="align-self-left btn btn-warning" value="Cancel"> -->
  <?php include("errors.php"); ?>
    <center><button type="reset" class=" btn btn-warning cancel">Cancel</button>

     <button type="submit" class=" btn btn-primary" name="signin">Submit</button></center>
   
     </p>
 </form>

    </div>
  </div>
</div>

<div class="col-md-3"></div>
</div>


    <script src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
       // Form Refresh and Reset
      $(document).ready(function(){
      $('.cancel').click(function(){
      window.location.href='signin.php';

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