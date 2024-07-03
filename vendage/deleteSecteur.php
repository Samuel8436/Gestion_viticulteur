<?php

require_once('connect_misql.php');

$id = $_GET['id'];
$DelSql = "DELETE FROM `societe` WHERE id=$id";

$res = mysqli_query($con, $DelSql);
if ($res) {?>
    <script>
                alert("Cette secteur est bien suprimer");
                location.href = "liste_forme_secteur.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
   <?php // header("location: listeMatiere.php");
} else {
    echo "Faild to delete";
    header("location: liste_forme_secteur.php");
    
}