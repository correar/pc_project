<?php
ini_set('display_errors', true);
	include_once("conf/db.php");
	include_once("app/models/Model_upload.php");
	include_once("app/controller/Upload.php");
	$upload = new Upload();

	$return = $upload->do_upload($_FILES,$_POST);

	$class = $return[0];
	$message = $return[1];

	echo $message;
?>		
