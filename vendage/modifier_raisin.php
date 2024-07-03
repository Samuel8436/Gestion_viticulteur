<?php

require_once('connect_misql.php');

$im_etu = $_GET['id_raisin'];
$selSql = "SELECT * FROM `raisin` WHERE id_raisin=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Ref_type']);
    $prenom = ($_POST['Couleur']);
    $sexe = ($_POST['PU']);
   
    $UpdateSql = "UPDATE `raisin` SET PU='$sexe' WHERE id_raisin=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_raisin.php");
        //header('Location: ajouterEtudiant.php');
    } else {
        //$erreur = "la mise à jour a échoué";
        ?>
            <script>
                alert("la mise à jour est échoué");
                location.href = "modifier_raisin.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
        <?php
    }
}

?>

<?php include('header.php');//debut du style ?>
<?php //include('admin/connect.php'); ?>
<body>
    <?php
    include ('theme.php');
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


                        <h3>Modifier la raisin</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
    <form method="POST" action="">
        <input type="hidden" name="send">
        <!-- <div>
            <label for="numero" >id</label>
            <input type=" text" name="id_raisin" required="required" id="" value="<?php //echo $r['id_raisin'] ?>"><br><br>

        </div> -->
        <table>
        <tr>
            <div>
                <td>
                   Type :
                </td>
                <td>
                    <?php //echo $r['Ref_type'] ?>
                    <input type="text" name='Ref_type' value="<?php echo $r['Ref_type'] ?>" placeholder='Refference du raisin' disabled>
                </td>
            </div>
        </tr>
        <tr>
            <div>
                <td>
                    Couleur :
                </td>
                <td>
                    <?php //echo $r['Couleur'] ?>
                    <input type="text" name="Couleur" value="<?php echo $r['Couleur'] ?>" placeholder='Couleurs du raisins' disabled>
                </td>
            </div>
        </tr>
        <tr>
            <div>
            <td>
                P.U :
            </td>
            <td>
                <input type="number" name="PU" value="<?php echo $r['PU'] ?>" placeholder='Prix par KG' id="">
            </td>
            </div>
        </tr>
        </table>
        <!-- <div>
            <label for="">Tel de société</label>
            <input type="number" name="Tel_soc" placeholder='Numero de téléphone' id="">
        </div> -->
        <div>
            <!-- <input type="submit" value="Ajouter"> -->
            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment Ajouter');">Modifier</button>
        </div>
    </form>
    <!-- <div id="footer">
        <?php //include('footer.php'); ?>
    </div> -->
</body>
</html>