<?php

require_once('connect_misql.php');

$im_etu = $_GET['id'];
$selSql = "SELECT * FROM `controleur` WHERE id=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Nom_contr']);
    $prenom = ($_POST['Prenom_contr']);
    $sexe = ($_POST['CIN_contr']);
    
    $adresse = ($_POST['Adresse_contr']);
    $tel = ($_POST['Num_phon_contr']);
    

    $UpdateSql = "UPDATE `controleur` SET  Nom_contr='$nom', Prenom_contr='$prenom', CIN_contr='$sexe', Adresse_contr='$adresse',  Num_phon_contr='$tel' WHERE id=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_form_contr.php");
        
    } else {
        //$erreur = "";
        ?>
            <script>
                alert("la mise à jour est échoué");
                location.href = "modifier_controleur.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
        <?php
    }
}

?>

<link rel="stylesheet" href="controle_champ.css">
<?php include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <div id="page">
            <?php include ('nav_sidebar.php');?>
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                       

                    </div>
                    <div id="body">


                        <h3>Modifier de controleur</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
                        <form method="POST">
                            <input type="hidden" name="send">
                            <div>
                                <label for="numero" >id</label>
                                <input type=" text" name="id" value="<?php echo $r['id'] ?>" disabled>
                            </div>
                            <div>
                                <label for="">Nom</label>
                                <input type="text" name="Nom_contr" class="uppercase" value="<?php echo $r['Nom_contr']?>">
                            </div>
                            <div>
                                <label for="">Prenom</label>
                                <input type="text" class="capitalize" name="Prenom_contr" value="<?php echo $r['Prenom_contr']?>">
                            </div>
                            <div>
                                <label for="">C.I.N</label>
                                <input type="number" name="CIN_contr" value="<?php echo $r['CIN_contr']?>">
                            </div>
                            <div>
                                <label for="">Adresse</label>
                                <input type="text" name="Adresse_contr" value="<?php echo $r['Adresse_contr']?>">
                            </div>
                            <div>
                                <label for="">Tel</label>
                                <input type="number" name="Num_phon_contr" value="<?php echo $r['Num_phon_contr']?>">
                            </div>
                            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment modifier');">Modifier</button>
                            <!-- <input type="submit" value="Ajouter"> -->
                        </form>
                    </div>
                    <!-- <div id="footer">
                        <?php// include('footer.php'); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php
    // include('footer_bottom.php');
    ?>
</body>



</html>