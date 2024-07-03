<?php

require_once('connect_misql.php');
 $im_etu = $_GET['id_pes'];
 $selSql = "SELECT * FROM `peseur` WHERE id_pes=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Nom_pes']);
    $prenom = ($_POST['Prenom_pes']);
    $CIN = ($_POST['CIN_pes']);
    $Adresse = ($_POST['Adresse_pes']);
    $Tel = ($_POST['Tel_pes']);
    $sexe = ($_POST['Frai']);
   
    $UpdateSql = "UPDATE `peseur` SET  Nom_pes='$nom', Prenom_pes='$prenom', CIN_pes='$CIN', Adresse_pes='$Adresse', Num_phon_pes='$Tel' WHERE id_pes=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_form_pes.php");
        
    } else {
       
    ?>
            <script>
                alert("Modification échoué");
                location.href = "modifier_peseur.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
        <?php
    }
}?>




<?php include('header.php'); ?>
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


                        <h3>Modifier le peseur</h3>
                       
                        <form method="POST" action="">
                            <input type="hidden" name="send">
                            <div>
                                <label for="numero" >id</label>
                                <input type=" text" name="id_pes" required="required" value="<?php echo $r['id_pes']; ?>" disabled><br><br>

                            </div>
                            <div>
                                <label for="">Nom</label>
                                <input type="text" name="Nom_pes"  value="<?php echo $r['Nom_pes'] ?>" placeholder='Nom'>
                            </div>
                            <div>
                                <label for="">Prenom</label>
                                <input type="text" name="Prenom_pes"  value="<?php echo $r['Prenom_pes'] ?>" placeholder='Prenom'>
                            </div>
                            <div>
                                <label for="">C.I.N</label>
                                <input type="number" name="CIN_pes"  value="<?php echo $r['CIN_pes'] ?>" placeholder='C.I.N'>
                            </div>
                            <div>
                                <label for="">Adresse</label>
                                <input type="text" name="Adresse_pes"  value="<?php echo $r['Adresse_pes'] ?>" placeholder='Adresse'>
                            </div>
                            <div>
                                <label for="">Tel</label>
                                <input type="number" name="Tel_pes"  value="<?php echo $r['Num_phon_pes'] ?>" placeholder='Numero du telephone'>
                            </div>
                            <!-- <input type="submit" value="Ajouter"> -->
                            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment modifier');">Modifier</button>
                        </form>
                    </div>
                    <!-- <div id="footer">
                        <?php //include('footer.php'); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php
    //include('footer_bottom.php');
    ?>
</body>

</html>