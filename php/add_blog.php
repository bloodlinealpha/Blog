<?php

include_once 'constraints.php';


$title = $_POST['title'];
$categories = json_encode($_POST['categories']);
$price = $_POST['price'];
$purchased = $_POST['purchased'];
$link = $_POST['link'];
$golden_list = $_POST['golden_list'];
$content = json_encode($_POST['content']);
$main_img = $_POST['main_img'];



$sql = "INSERT INTO new_post (title, categories, price, purchased, link, golden_list, content, main_img)
			VALUES (?,?,?,?,?,?,?,?)";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ssssssss", $title, $categories, $price, $purchased, $link, $golden_list, $content, $main_img);

$stmt->execute();

$last_id = $stmt->insert_id;

$server_results['status'] = 'success';
$server_results['id'] = $last_id;

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