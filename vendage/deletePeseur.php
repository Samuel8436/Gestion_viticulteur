<?php

require_once('connect_misql.php');

$id = $_GET['id_pes'];
$DelSql = "DELETE FROM `peseur` WHERE id_pes=$id";

$res = mysqli_query($con, $DelSql);
if ($res) {?>
    <script>
                alert("Cette peseur est bien suprimer");
                location.href = "liste_form_pes.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php // header("location: listeMatiere.php");
} else {
    ?>
    <script>
                alert("Suppression incorecte");
                location.href = "liste_form_pes.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php 
    
}