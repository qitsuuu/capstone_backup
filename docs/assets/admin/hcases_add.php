<?php
require("conn_config.php");
$result ="SELECT * FROM hcases_tbl";
if(isset($_POST['add'])) {

    $hcase_name =   $_POST['hcase_name'];
    $hcase_desc =   $_POST['hcase_desc'];


    $insert = "INSERT INTO hcases_tbl (hcase_name, hcase_desc) VALUES (:hcase_name, :hcase_desc)";

// :per_name, :per_hcaseid, :per_age, :per_bday, :per_brgyid, :per_role

        $query = $dbConn->prepare($insert);
        $query->bindparam(':hcase_name', $hcase_name);
         $query->bindparam(':hcase_desc', $hcase_desc);
        $query->execute();
        
        header("Location: hcases.php");
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

</head>

    <body>

    <div class="container">
        <div class="p-3 m-0 jumbotron row">
        <h3 class="col-sm-6">Add Health Case</h3>
        </div>
    <form action="hcases_add.php" method="post" name="form1" >
       <table class="table table-striped">

        <tr>
             <td colspan="2"><input class="form-control" placeholder="Case Name" class="form-control" type="text" name="hcase_name"></td>
        </tr>
        <tr>
            <td colspan="2"> <textarea placeholder="Description" class="form-control" name="hcase_desc" rows="5" id="comment"></textarea>
            </td></tr>

         <tr> 
            <td>
            <center>
            <input class="btn btn-success" type="submit" name="add" value="Insert">
             <input class="btn btn-warning" type="reset" name="seset" value="Reset">
            <a class="btn btn-danger" href="hcases.php">Cancel</a>
            </td>
            </center>
            </tr>
        </table>
    </form>
          </div> 
</body>
</html>

 