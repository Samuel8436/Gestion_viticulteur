<?php
require_once('connect_misql.php');

require_once('connect_misql.php');
    $im_etu = $_GET['id'];
    $selSql = "SELECT * FROM `factur` WHERE id=$im_etu";
    $res = mysqli_query($con, $selSql);
    $r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    $Date_fact = ($_POST['Date_fact']);
    $CIN_vit = ($_POST['CIN_vit']);
    $Nom_et_Prenom_vit = ($_POST['Nom_et_Prenom_vit']);
    $Adresse = ($_POST['Adresse']);
    $Nom_sect = ($_POST['Nom_sect']);
    $Num_phon = ($_POST['Num_phon']);
    $Raisin_cult = ($_POST['Raisin_cult']);
    $Poids_brut = ($_POST['Poids_brut']);
    $Poids_brut1 = ($_POST['Poids_brut1']);
    $Poids_brut2 = ($_POST['Poids_brut2']);
    $Nombre_fut = ($_POST['Nombre_fut']);
    $Nombre_fut1 = ($_POST['Nombre_fut1']);
    $Nombre_fut2 = ($_POST['Nombre_fut2']);
    $Nombre_garaba = ($_POST['Nombre_garaba']);
    $Nombre_garaba1 = ($_POST['Nombre_garaba1']);
    $Nombre_garaba2 = ($_POST['Nombre_garaba2']);
    $Poids_net = ($_POST['Poids_brut']-($_POST['Nombre_fut']*5)-($_POST['Nombre_garaba']));
    $Poids_net1 = ($_POST['Poids_brut1']-($_POST['Nombre_fut1']*5)-($_POST['Nombre_garaba1']));
    $Poids_net2 = ($_POST['Poids_brut2']-($_POST['Nombre_fut2']*5)-($_POST['Nombre_garaba2']));            
    $Type = ($_POST['Type']);
    $Type1 = ($_POST['Type1']);
    $Type2 = ($_POST['Type2']);
    $Transporteur = ($_POST['Transporteur']);
    $Nom_et_Prenom_pes = ($_POST['Nom_et_Prenom_pes']);
    $Nom_et_Prenom_contr = ($_POST['Nom_et_Prenom_contr']);
    $UpdateSql = "UPDATE `factur` SET  Date_fact='$Date_fact', CIN_vit='$CIN_vit', Nom_et_Prenom_vit='$Nom_et_Prenom_vit', Adresse='$adresse',  Nom_sect='$Nom_sect', Num_phon='$Num_phon', Raisin_cult='$Raisin_cult', Poids_brut='$Poids_brut', Poids_brut1='$Poids_brut1', Poids_brut2='$Poids_brut2', Nombre_garaba='$Nombre_garaba', Nombre_garaba1='$Nombre_garaba1', Nombre_garaba2='$Nombre_garaba2', Type='$Type', Type1='$Type1', Type2='$Type2' 
    WHERE id=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_facture.php");
        
    } else {
        //$erreur = "";
        ?>
            <script>
                alert("la mise à jour est échoué");
                location.href = "modifier_fact.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
        <?php
    }
}

?>