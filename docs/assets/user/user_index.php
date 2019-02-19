<?php
include("default.php");
?>
	<section id="doccontent">
<div class="p-4 jumbotron"><h3><?php echo $rolename; ?></h3>

<form method="POST" id="form">
 <div class="input-group">
    <select class="m-1 btn-outline-default custom-select" id="recordyear" name="recordyear">
        
        <?php
        $years ="SELECT DISTINCT(YEAR(per_reportdate)) as 'years' from persons_tbl ORDER BY (YEAR(per_reportdate)) DESC";
        echo "<option hidden selected value=".date('Y').">".date('Y')."</option>";
        foreach ($dbConn->query($years) as $row) {
        echo "<option value=".$row['years'].">".$row['years']."</option>";
        }
        ?>

    </select>

<!-- Month -->
  <select class="m-1 btn-outline-success custom-select" id="month1" name="month1">
      <option hidden>Filter by Month</option>
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
    
    <button class="btn btn-warning" type="reset" name="reset" id="reset">RESET FIlTERS</button>
     <!--  <button disabled name="b_print" type="button" class="btn btn-default" onClick="printdiv('div1');">PRINT GRAPHS</button> -->
    </div>

    </form>
   </div>

 <div id="div1"></div>  

</section>
    <footer>All Rights Reserved © QinEliza December, 2018 </footer>
    </main>

<script src="../js/jquery-3.3.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#div1").load("si_graph.php");
         var todate = new Date();
        var currentmonth = todate.getMonth(todate);
        $("#month1").prop('selectedIndex', currentmonth);

        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
        },4000);

        $(".add").click(function(){
        // $("#div1").load("a_add.php");
        $("#div1").delay(100).queue(function( nxt ) {
        $("#div1").load("case_add1.php");
        nxt();
        });
        });

        $("label:first-child").addClass("activetab");



        $("#reset").click(function(){
            window.location.href='dashboard.php';
        });

    //select year 
        $("#recordyear").change(function(){

        var year =$("#recordyear").val();
         var month =$("#month1").val();
        // var postData = $(this).serializeArray();
        $.ajax({
        method: 'post',
        url: 'si_graph.php',
        data: {
            year: year,
            month: month
        },

        success: function (html) {
        $("#div1").html(html);
        // window.location.href='dashboard.php';
        }

        });
          
        return false;
        });


        $("#month1").change(function(){
        // $("#month1").prop('selectedIndex',0);
        var year =$("#recordyear").val();
        var month =$("#month1").val();
        // var postData = $(this).serializeArray();
        $.ajax({
        method: 'post',
        url: 'si_graph_month.php',
        data: {
            month: month,
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

<script type="text/javascript">
$(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();

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
