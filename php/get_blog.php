<?php

include_once 'constraints.php';


//$project_status = $_POST["status"];


$sql = "SELECT *
		FROM new_post";

$result = $mysqli->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);



$server_results['status'] = 'success';
$server_results['message'] = '';


if (!$result) {
	$server_results['status'] = 'error';
	$errors = "Query Failed!! Error: <br>" . $mysqli->error;
	$server_results['message'] = $errors;
	
	} else{
		$server_results['message'] = $rows;
}


$JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
echo $JSON_data;

$mysqli->close();
?>