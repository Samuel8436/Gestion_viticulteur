<?php
	session_start();

	if(!isset($_SESSION["id"]))
	{
		header("Location: admin/index.php");
		exit();
	}
?>