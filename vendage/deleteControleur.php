<?php

require_once('connect_misql.php');

$id = $_GET['id'];
$DelSql = "DELETE FROM `controleur` WHERE id=$id";

$res = mysqli_query($con, $DelSql);
if ($res) {?>
    <script>
                alert("Cette controleur est bien suprimer");
                location.href = "liste_form_contr.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php // header("location: listeMatiere.php");
} else {
    ?>
    <script>
                alert("Suppression incorecte");
                location.href = "liste_form_contr.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php 
    
}