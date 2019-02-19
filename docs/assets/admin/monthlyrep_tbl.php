<?php
include("default.php");
?>

	<section id="doccontent">
	 <div class="p-3 m-0 mb-2 jumbotron row">
        <div class="input-group">
    <h2 class="col-sm-5"><label style="color: gray;"> Month : </label> <label class="m-0 monthlabel"><?php echo date("F"); ?></label></h2>
    <select class="mt-2 btn-outline-success custom-select" id="month1" name="month1">
      <option value="January">January</option>
      <option value="February">February</option>
      <option value="March">March</option>
      <option value="April">April</option>
      <option value="May">May</option>
      <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
      <option value="September">September</option>
      <option value="October">October</option>
      <option value="November">November</option>
      <option value="December">December</option>
    </select>
    <form method="post" action="excel_monthly.php">
     <button type="submit" name="export" class="btn btn-success">Export as .XLS File</button>
     <button name="b_print" type="button" class="btn btn-default" onClick="printdiv('div1');">PRINT THIS TABLE</button>
    </form>
    </div>
</div>

	<div id="div1" style=" height: 75vh; overflow-y: auto;">

    <?php 
    include("san_isidro_monthly.php");
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
           $('[data-toggle="tooltip"]').tooltip();

       });
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#month").addClass("activetab");
        var todate = new Date();
        var currentmonth = todate.getMonth(todate);
        $("#month1").prop('selectedIndex', currentmonth);

        $("#month1").change(function(){
        var month =$("#month1").val();
        $(".monthlabel").text(month);
        // var postData = $(this).serializeArray();
        $.ajax({
        method: 'post',
        url: 'san_isidro_monthly.php',
        data: {
            month: month
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
    var month =$("#month1").val();
    var filters= "<h6>Month : " + month +"</h6>";
    var headstr = "<html><head><title></title></head>" + filters + "<body>";
	var footstr = "</body>";

	var newstr = document.all.item(div1).innerHTML;
	var oldstr = document.body.innerHTML;
	document.body.innerHTML = headstr+newstr+footstr;
	window.print();
	document.body.innerHTML = oldstr;
	window.close();
	window.location.href='monthlyrep_tbl.php';
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