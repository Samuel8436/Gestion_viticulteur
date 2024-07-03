<?php

require_once('connect_misql.php');

$id = $_GET['id_raisin'];
$DelSql = "DELETE FROM `raisin` WHERE id_raisin=$id";

$res = mysqli_query($con, $DelSql);
if ($res) {?>
    <script>
                alert("Cette raisin est bien suprimer");
                location.href = "liste_raisin.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php // header("location: listeMatiere.php");
} else {
    ?>
    <script>
                alert("Suppression incorecte");
                location.href = "liste_raisin.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php 
    // echo "Faild to delete";
    // header("location: liste_cli.php");
    
}