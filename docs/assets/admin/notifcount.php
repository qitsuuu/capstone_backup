<?php
$q1="SELECT COUNT(req_id) AS 'count' FROM requests_tbl WHERE date_requested BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()";

$result = $dbConn->query($q1);
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$reqcount=$row['count'];
	}


$q2="SELECT COUNT(user_id) AS 'count' FROM user_tbl";

$result = $dbConn->query($q2);
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$usercount=$row['count'];
	}


$q3="SELECT COUNT(per_id) AS 'count' FROM persons_tbl";

$result = $dbConn->query($q3);
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$patcount=$row['count'];
	}

$q4="SELECT COUNT(hcase_id) AS 'count' FROM hcases_tbl";

$result = $dbConn->query($q4);
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$casecount=$row['count'];
	}


$q5="SELECT COUNT(per_id) AS 'count' FROM persons_tbl WHERE per_reportdate BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()";

$result = $dbConn->query($q5);
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$monthlynewcount=$row['count'];
	}

?>