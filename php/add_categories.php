<?php

include_once 'constraints.php';

$post_id = $_POST['post_id'];
$category = $_POST['category'];


$sql = "INSERT INTO categories (post_id, category)
			VALUES (?,?)";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("is", $post_id, $category);

$stmt->execute();

$server_results['status'] = 'success';

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