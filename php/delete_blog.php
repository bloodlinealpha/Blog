<?php

include_once 'constraints.php';


$id = $_POST['id'];

$sql = "DELETE FROM new_post
		WHERE id=?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("i", $id);

if($stmt->execute()){
	$server_results['status'] = 'success';
	

}else{
	$server_results['status'] = 'failed';
	$server_results['sql_error'] = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;;
	
}





if (!$stmt) {
	$server_results['status'] = 'error';
	$errors = "Query Failed!! Error: <br>" . $mysqli->error;
	$server_results['message'] = $errors;	
}


$stmt->close();

$JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
echo $JSON_data;

$mysqli->close();

?>