<?php

require_once('connect_misql.php');

$id = $_GET['id'];
$DelSql = "DELETE FROM `cliants` WHERE id=$id";

$res = mysqli_query($con, $DelSql);
if ($res) {?>
    <script>
                alert("Cette viticulteur est bien suprimer");
                location.href = "liste_cli.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php // header("location: listeMatiere.php");
} else {
    echo "Faild to delete";
    header("location: liste_cli.php");
    
}