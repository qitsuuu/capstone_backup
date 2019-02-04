<?php
include("default.php");
require("conn_config.php");
 
$hcase_id= $_REQUEST['hcase_id'];

if (!empty($_GET['hcase_id'])){
    $hcase_id=$_REQUEST['hcase_id'];
}
if(null==$hcase_id){
    header("Location: hcases.php");
}


if(isset($_POST['update']))
{    
    $hcase_id = $_POST['hcase_id'];
    $hcase_name = $_POST['hcase_name'];
    $hcase_desc = $_POST['hcase_desc'];
 
        $sql = "UPDATE hcases_tbl SET hcase_name=:hcase_name, hcase_desc=:hcase_desc WHERE hcase_id=:hcase_id";
        $query = $dbConn->prepare($sql);
        
        $query->bindparam(':hcase_id', $hcase_id);
        $query->bindparam(':hcase_name', $hcase_name);
        $query->bindparam(':hcase_desc', $hcase_desc);
        $query->execute();
         echo "<script>window.location.href='hcases.php';</script>";
}
?>

<?php
$hcase_id = $_REQUEST['hcase_id'];

$sql = "SELECT * FROM hcases_tbl WHERE hcase_id=:hcase_id";
$query = $dbConn->prepare($sql);
$query->execute(array(':hcase_id' => $hcase_id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $hcase_id = $row['hcase_id'];
     $hcase_name = $row['hcase_name'];
    $hcase_desc = $row['hcase_desc'];

}
?>

<section id="doccontent">
        <div id="div1">

    <div class="container">
        <div class="p-3 m-0 jumbotron row">
        <h3 class="col-sm-6">Health Case Update</h3>
        </div>
    <form name="form2" method="post" action="hcases_update1.php">
        <table class="table table-striped">
            <tr class="row">
                <td class="col-sm-2">
                <input disabled type="text" name="hcase_name" class="form-control" value="Case :    <?php echo $_GET['hcase_id'];?>"></td>
                <td class="col-sm-10">
                <input type="text" name="hcase_name" class="form-control" value="<?php echo $hcase_name;?>"></td>
            </tr>
            <tr> 
                <td colspan="2"> Description : <textarea class="form-control" name="hcase_desc" rows="5" id="comment"><?php echo $hcase_desc;?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                <input type="submit" class="btn btn-success" name="update" value="Update">
                 <input hidden type="text" name="hcase_id" value="<?php echo $hcase_id;?>">
                 <input class="btn btn-warning" type="reset" name="seset" value="Reset">
                <a class="btn btn-danger" href="hcases.php">Cancel</a>
            </center></td>
            </tr>
        </table>
    </form>
</div>
</div>
</section>
</body>
</html>