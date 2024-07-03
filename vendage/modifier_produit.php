<?php

require_once('connect_misql.php');

$im_etu = $_GET['id'];
$selSql = "SELECT * FROM `produit` WHERE id=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Nom_prod']);
    $prenom = ($_POST['Prix']);
    
    $UpdateSql = "UPDATE `produit` SET  Nom_prod='$nom', Prix='$prenom' WHERE id=$im_etu ";

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_produit.php");
        //header('Location: ajouterEtudiant.php');
    } else {
        $erreur = "la mise à jour a échoué";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    
</head>

<body>
    <div class="container">
        <div class="row pt=4">

            <?php
            if (isset($erreur)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erreur; ?>
                </div>
            <?php } ?>

            <form action="" method="POST" class="form-horizontal col-md-6 pt-4">
                <div class="container">
                    <h2 align="center">Modifier le cliants</h2>

                    <br><br>
                        <label for="numero" >id</label>
                        <input type=" text" name="id" required="required" id="" value="<?php echo $r['id'] ?>"><br><br>

                        <label for="nom" >Nom</label>
                        <input type=" text" name="Nom_prod"  required="required" id="" value="<?php echo $r['Nom_prod'] ?>"><br><br>

                        <label for="prenom">Prix</label>
                        <input type="text" name="Prix" class="form-control" id="" value="<?php echo $r['Prix'] ?>"><br><br>
                        
                    <div class="pt-4">
                        <input type="submit" value="Modifier" class="btn btn-primary m-3">

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>