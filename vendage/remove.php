<?php
	require_once 'connect_misql.php';
	
	if(ISSET($_POST['remove'])){
		if(ISSET($_POST['mem_id'])){
			foreach($_POST['mem_id'] as $key => $value){
				mysqli_query($conn, "DELETE FROM `cliants` WHERE `id` = '$value'") or die(mysqli_error());
			}
			
			header('location: liste_cli.php');
		}else{
			echo "<script>alert('Please select something first!')</script>";
			echo "<script>window.location= 'liste_cli.php'</script>";
		}
	}
?>