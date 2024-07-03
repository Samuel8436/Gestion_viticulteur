<?php

require_once('connect_misql.php');

$im_etu = $_GET['id'];
$selSql = "SELECT * FROM `societe` WHERE id=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Nom_soc']);
    
    $adresse = ($_POST['Adresse_soc']);
    $tel = ($_POST['Num_phon_contr']);
    

    $UpdateSql = "UPDATE `societe` SET  Nom_soc='$nom',  Adresse_soc='$adresse' WHERE id=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_forme_secteur.php");
        
    } else {
        //$erreur = "";
        ?>
            <script>
                alert("la mise à jour est échoué");
                location.href = "modifier_secteur.php";
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


                        <h3>Modifier secteur</h3>
                        
    <form method="POST" action="">
        <input type="hidden" name="send">
        <div>
            <label for="numero" >id</label>
            <input type=" text" name="id" value="<?php echo $r['id'] ?>" disabled>
        </div>
        <div>
            <label for="">Nom du secteur</label>
            <input type="text" name='Nom_soc' value="<?php echo $r['Nom_soc'] ?>" placeholder='Secteur'>
        </div>
        <div>
            <label for="">Adresse</label>
            <input type="text" name="Adresse_soc" placeholder='Adresse' value="<?php echo $r['Adresse_soc'] ?>">
        </div>
            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment Modifier');">Modifier</button>
        </div>
    </form>
</body>
</html>