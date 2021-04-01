<?php

include_once 'constraints.php';


$post_id = $_POST["post_id"];


$sql = "SELECT *
		FROM new_post
		WHERE id = ?
		LIMIT 1";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("i", $post_id);

$stmt->execute();

$result = $stmt->get_result();

$rows = $result->fetch_all(MYSQLI_ASSOC);



$server_results['status'] = 'success';

if (!$stmt) {
	$server_results['status'] = 'error';
	$errors = "Query Failed!! Error: <br>" . $mysqli->error;
	$server_results['message'] = $errors;	
}else{

	$server_results['message'] = $rows;	
}




	$stmt->close();


$JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
echo $JSON_data;

$mysqli->close();
?>