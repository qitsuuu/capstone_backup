<?php
include("default.php");
?>

	<section id="doccontent">
	 <div class="p-3 m-0 mb-2 jumbotron row">
	 	 <div class="input-group">
    <h2 class="col-sm-5"><label style="color: gray;"> Year : </label> <label class="m-0 yearlabel"><?php echo date("Y"); ?></label></h2>
    
 	<select class="mt-2 btn-outline-default custom-select" id="recordyear" name="recordyear">
		<option hidden>Patients</option>
		<?php
		$years ="SELECT DISTINCT(YEAR(per_reportdate)) as 'years' from persons_tbl ORDER BY (YEAR(per_reportdate)) DESC";
		echo "<option hidden selected value=".date('Y').">".date('Y')."</option>";
        foreach ($dbConn->query($years) as $row) {
        echo "<option value=".$row['years'].">".$row['years']."</option>";
        }
		?>

	</select>

    <form method="post" action="excel_annual.php">
     <button type="submit" name="export" class="btn btn-success">Export as .XLS File</button>
     <button name="b_print" type="button" class="btn btn-default" onClick="printdiv('div1');">PRINT THIS TABLE</button>
    </form>
    </div>
</div>

	<div id="div1" style=" height: 73vh; overflow-y: auto;">
	<div>
    

    <?php 
    include("san_isidro_yearly.php");
    ?>

</table>
</div>
</div>		
	</section>
	<footer>All Rights Reserved © QinEliza December, 2018 </footer>
	
	</main>




<script src="../js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#yearly2").addClass("activetab");

		$("#recordyear").change(function(){

		var year =$("#recordyear").val();
		$(".yearlabel").text(year);
		// var postData = $(this).serializeArray();
		$.ajax({
		method: 'post',
		url: 'san_isidro_yearly.php',
		data: {
		    year: year
		},

		success: function (html) {
		$("#div1").html(html);
		// window.location.href='dashboard.php';
		}

		});
		  
		return false;
		});

	});
</script>

<script> 
	function printdiv(div1)
	{
	var year =$("#recordyear").val();
	var filters= "<h6>Year : " + year+"</h6>";
	var headstr = "<html><head><title></title></head>" + filters + "<body>";
	var footstr = "</body>";
	var newstr = document.all.item(div1).innerHTML;
	var oldstr = document.body.innerHTML;
	document.body.innerHTML = headstr+newstr+footstr;
	window.print();
	document.body.innerHTML = oldstr;
	window.close();
	window.location.href='annualrep_tbl.php';
	}
	</script>

	<script src="../js/myscript.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/mdb.min.js"></script>
    <script src="../js/mdb.js" type="text/javascript"></script>

</body>
</html>