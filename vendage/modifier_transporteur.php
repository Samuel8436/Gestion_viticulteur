<?php

require_once('connect_misql.php');

$im_etu = $_GET['id_transp'];
$selSql = "SELECT * FROM `transporteur` WHERE id_transp=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Nom_transp']);
    $prenom = ($_POST['Num_imatr']);
    $sexe = ($_POST['Frai']);
   
    $UpdateSql = "UPDATE `transporteur` SET  Nom_transp='$nom', Num_imatr='$prenom', Frai='$sexe' WHERE id_transp=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_transporteur.php");
        //header('Location: ajouterEtudiant.php');
    } else {
        //$erreur = "la mise à jour a échoué";
        ?>
            <script>
                alert("la mise à jour est échoué");
                location.href = "modifier_transporteur.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
        <?php
    }
}

?>

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


                        <h3>Ajout du transporteur</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
    <form method="POST" action="">
        <input type="hidden" name="send">
        <div>
            <label for="numero" >id</label>
            <input type=" text" name="id_transp" required="required" id="" value="<?php echo $r['id_transp'] ?>" disabled><br><br>

        </div>
        <div>
            <label for="">Nom du transporteur</label>
            <input type="text" name='Nom_transp' value="<?php echo $r['Nom_transp'] ?>" placeholder='Transporteur'>
        </div>
        <div>
            <label for="">Numero imatriculation</label>
            <input type="text" name='Num_imatr' value="<?php echo $r['Num_imatr'] ?>" placeholder='Numero imatriculation'>
        </div>
        <div>
            <label for="">Frai</label>
            <input type="text" name="Frai" value="<?php echo $r['Frai'] ?>" placeholder='Frai de transport' id="">
        </div>
        
        <div>
         <!-- <input type="submit" value="Ajouter"> -->
            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment modifier');">Modifier</button>
        </div>
    </form>
</body>
</html>