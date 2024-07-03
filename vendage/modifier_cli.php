<?php
require_once('connect_misql.php');

$im_etu = $_GET['id'];
$selSql = "SELECT * FROM `cliants` WHERE id=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST) & !empty($_POST)) {
    
    $nom = ($_POST['Nom_cli']);
    $prenom = ($_POST['Prenom_cli']);
    $sexe = ($_POST['CIN']);
    
    $adresse = ($_POST['Adresse']);
    $tel = ($_POST['Tel_cli']);
    $Sect = ($_POST['Nom_sect']);

    $UpdateSql = "UPDATE `cliants` SET  Nom_cli='$nom', Prenom_cli='$prenom', CIN='$sexe', Adresse='$adresse',  Tel_cli='$tel', Nom_sect='$Sect' WHERE id=$im_etu ";
    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_cli.php");
        
    } else {
        //$erreur = "";
        ?>
            <script>
                alert("la mise à jour est échoué");
                location.href = "modifier_cli.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
        <?php
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
    <!-- <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="menu.css"> -->
</head>
<?php include('header.php'); ?>
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
                    <h3>Modifier le viticulteur</h3>
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
                    
                    <p>
                        <?php //include ('product_menu.php');?>
                    </p>
                    <br><br>
                        <label for="numero" >id</label>
                        <input type=" text" name="id" required="required" id="" value="<?php echo $r['id'] ?>" disabled><br><br>

                        <label for="nom" >Nom</label>
                        <input type=" text" name="Nom_cli"  required="required" onkeyup="controlnom(this)" id='nom' value="<?php echo $r['Nom_cli'] ?>"><br><br>

                        
                        <label for="prenom">prenom</label>
                        <input type="text" name="Prenom_cli" class="form-control" id="" value="<?php echo $r['Prenom_cli'] ?>"><br><br>
                        
                    
                        <label for="sexe">C.I.N</label>
                        <input type="text" name="CIN" required="required" id="" value="<?php echo $r['CIN'] ?>"><br><br>
                    
                        <label for="dateNaiss">Adresse</label> 
                        <input type="text" name="Adresse" required="required" id="" value="<?php echo $r['Adresse'] ?>"><br><br>
                    
                        <label for="tel">Tel</label>
                        <input type="number" name="Tel_cli" required="required" id="" value="<?php echo $r['Tel_cli'] ?>"><br><br>
                        <div>
                            <label for="Nom_sect">Secteur </label>
                                
                            <?php
                                $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                $resultset = $mysqli->query("SELECT * FROM societe");
                            ?>
                            
                            <select name="Nom_sect" class='form-control'>
                                <option value="<?php $r['Nom_sect'] ?>"><?php echo $r['Nom_sect'] ?></option>
                                <?php
                                 while ($rows = $resultset->fetch_assoc()) {
                                    $id = $rows['id'];
                                    $secteur = $rows['Nom_soc'];
                                    $e = ("<option value='$secteur'>$secteur</option>");
                                    echo $e; 
                                 } ?>
                            </select>
                        </div><br><br>
                    <div class="pt-4">
                        <input type="submit" value="Modifier" class="btn btn-primary m-3" onclick="return confirm('Voulez vous vraiment Modifier');" title='Modifier'>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    function controlnom(str) 
    {
        var test = str.value;
        var nb = test.length;

        if (nb >= 1) {
            var maj = test.toUpperCase();
            str.value = maj;
        } else {
            // alert("Veuillez entrer votre nom");
            document.getElementById("nom").focus();
        }
    }
    </script>
</body>

</html>