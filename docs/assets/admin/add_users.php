<?php
include("default.php");
include("conn_config.php");
$qbrgy ="SELECT * FROM brgy_tbl";
$qstreet ="SELECT * FROM street_tbl";
$qroles ="SELECT * FROM role_tbl";
?>
<section id="doccontent">
    <div id="div1">
  <div class="p-3 m-0 jumbotron row" style="text-align: center;">
  <h2 class="col-sm-12">Health Caps User</h2>
  </div>

  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
   <div id="signup" class="container tab-pane active scrollbar-night-fade"><br>
      <form method="post" action="add_users2.php" id="signupform">
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
        <input required type="text" class="form-control" name="per_username" placeholder="Username" aria-label="Small" minlength="5" aria-describedby="inputGroup-sizing-sm" value="<?php echo $per_username; ?>">
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
  
      <center><button type="submit" class="btn btn-primary" name="add_user">Submit</button>
        <button type="reset" class=" btn btn-warning">RESET</button>
       <button type="button" class=" btn btn-danger cancel">Cancel</button></center>
     </p>

      </form>
       <?php include("errors.php"); ?>
    </div>
  </div>

</div>

<div class="col-md-3"></div>
</div>

</div>
</section>

    <script src="../js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){

      $('.cancel').click(function(){
      window.location.href='users.php';

      });
    });
 
    </script>

 <script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->

</body>
</html