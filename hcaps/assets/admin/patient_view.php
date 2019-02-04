	<div class="table-responsive">  
    <table class="table table-bordered">

	<?php  

 	require("conn_config.php");
 		$per_id= $_REQUEST['per_id'];
	 $sql ="SELECT per_age,
        per_bday,
        per_bmi,
        brgy_name,
        hcase_name,
        hcase_desc,
        per_height,
        per_houseNo,
        per_name, lname, mname, suffix,
        per_reportdate,
        per_roleid,
        per_sex,	
        per_street,
        per_weight FROM persons_tbl, hcases_tbl, brgy_tbl where per_id=:per_id AND persons_tbl.per_hcaseid=hcases_tbl.hcase_id AND persons_tbl.per_brgyid=brgy_tbl.brgy_id";

	$query=$dbConn->prepare($sql);
   	$query->bindparam(':per_id', $per_id);
    $query->execute();
	$data=$query->fetch(PDO::FETCH_ASSOC); 

		    // echo '<tr><td>' .$data['per_id'].'</td></tr>';
	        echo '<tr> <td><label class="headerlabel">Patient\'s Name :</label> '.$data["lname"].', '.$data["per_name"].' '. $data["mname"].' '.$data["suffix"].'</td>
	        <td><label class="headerlabel">Sex :</label> ' .$data['per_sex'].'</td></tr>';
	        echo '<tr><td><label class="headerlabel">Case Name :</label> <i>'.$data['hcase_name'].'</i></td>
	        <td><label class="headerlabel"> Date Reported : </label> '.$data['per_reportdate'].'</td></tr>';
	        echo '<tr><td><label class="headerlabel">Barangay :</label> '.$data['per_houseNo'] ." " .$data['per_street'] .", " .$data['brgy_name'].'</td>
	        <td><label class="headerlabel">Height :</label> ' .$data['per_height'].'</td></tr>';
	        echo '<tr><td><label class="headerlabel">Birthday :</label> ' .$data['per_bday'].'</td><td><label class="headerlabel">Weight :</label> ' .$data['per_weight'].' kg</td></tr>';
	    
	        echo '<tr><td><label class="headerlabel">Age :</label> ' .$data['per_age'].'</td>
	        <td><label class="headerlabel">BMI :</label> ' .$data['per_bmi'].'</td></tr>';
	        echo '<tr><td colspan=2><label class="headerlabel">Case Description :</label>'.$data['hcase_desc'].'</td></tr></table>';
	      

			// 	echo'<tr><td><a class="btn btn-info" href="crud.php" style="float: right;"> <i class="material-icons">
			// 	</i>Back</a></td>
			// </tr>
		// </table>';
	
		?>