<?php
if (isset($_POST['send'])) 
{
    require_once('connect_misql.php');

    $im_etu = $_GET['id'];
    $selSql = "SELECT * FROM `factur` WHERE id=$im_etu";
    $res = mysqli_query($con, $selSql);
    $r = mysqli_fetch_assoc($res);

    if (isset($_POST) & !empty($_POST)) {
        
        $Date_fact = ($_POST['Date_fact']);
        $CIN_vit = ($_POST['CIN_vit']);
        $Raisin_cult = ($_POST['Raisin_cult']);
        
        $Poids_brut = ($_POST['Poids_brut']);
        $Poids_net = ($_POST['Poids_net']);
        $Nombre_fut = ($_POST['Nombre_fut']);
        $Nombre_garaba = ($_POST['Nombre_garaba']);
    
        $UpdateSql = "UPDATE `factur` SET  
        Date_fact='$Date_fact',
        Raisin_cult='$Raisin_cult',
        CIN_vit='$CIN_vit',
        Poids_brut='$Poids_brut',
        Poids_net='$Poids_net',
        Nombre_fut='$Nombre_fut',
        Nombre_garaba='$Nombre_garaba'  WHERE id=$im_etu";
        
        $res = mysqli_query($con, $UpdateSql);
        if ($res) {
            header("Location: liste_facture.php");
            
        } else {
            
            ?>
                < <script>
                    alert("la mise a jour est echoue");
                    location.href = "modifier_fact.php";
                </script>
                <script src="Alert/src/sweetalert2.js"></script>
                <script src="Alert/src/SweetAlert.js"></script>
            <?php
        }
    }
}

?>