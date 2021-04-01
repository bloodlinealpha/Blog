<?php

include_once 'constraints.php';


$id = $_POST['id'];
$title = $_POST['title'];
$categories = json_encode($_POST['categories']);
$price = $_POST['price'];
$purchased = $_POST['purchased'];
$link = $_POST['link'];
$golden_list = $_POST['golden_list'];
$content = json_encode($_POST['content']);
$main_img = $_POST['main_img'];


$sql = "UPDATE new_post
		SET title=?, categories=?, price=?, purchased=?, link=?, golden_list=?, content=?, main_img=?
		WHERE id=?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ssssssssi",$title, $categories, $price, $purchased, $link, $golden_list, $content, $main_img, $id);

$stmt->execute();


$server_results['status'] = 'success';

if (!$stmt) {
	$server_results['status'] = 'error';
	$errors = "Query Failed!! Error: <br>" . $mysqli->error;
	$server_results['message'] = $errors;	
}else{
	$server_results['message'] = 'Blog post updated!!';
}

$stmt->close();

$JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
echo $JSON_data;

$mysqli->close();

?>