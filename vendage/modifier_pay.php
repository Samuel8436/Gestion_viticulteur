<?php

require_once('connect_misql.php');

$id = $_GET['id'];
$selSql = "SELECT * FROM `payement` WHERE id=$id";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST["send"]) & !empty($_POST)) {
    
    $date = ($_POST['date_pay']);
    $CIN = ($_POST['CIN']);
    $Nom_et_Prenom_vit = $_POST['Nom_et_Prenom_vit'];
    $montant = ($_POST['montant']);
    
        
        $UpdateSql = "UPDATE `payement` SET  date_pay='$date', CIN='$CIN',Nom_et_Prenom_vit='$Nom_et_Prenom_vit', montant='$montant' WHERE id=$id ";

        $res = mysqli_query($con, $UpdateSql);
        if ($res) {
            header("Location: liste_payement.php");
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
    include('theme.php');
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


                        <h3>Modifier la payement</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
    <form method="POST" action="">
        <div id="formulaire">
        <table>
            <tr>
                <td><label>C.I.N de viticulteur : </label></td>
            <td> 
                <select name="CIN_viti" onchange="nomdeviticulteur(this.value1)" class='form-control'>
                <option value="">chossser la C.I.N du viticulteur</option>
                    <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                    $resultset = $mysqli->query("SELECT * FROM cliants");
                    while ($rows = $resultset->fetch_assoc()) {
                        $id = $rows['id'];
                        $Nom_cli=$rows["Nom_cli"];
                        $Prenom_cli = $rows["Prenom_cli"];
                        $secteur = $rows['Nom_sect'];
                        $CIN = $rows['CIN'];
                        $e = ("<option value='$CIN'>$CIN : $Nom_cli $Prenom_cli</option>");
                        echo $e; 
                    } ?>
                </select>
            </td>
            </tr>
            <p>clicquet une fois le le boutton afficher pour connaitre l'identite du viticulteur <span style="color:Tomato;">*</span></p>
            <tr>
                <td>  <input type="submit" value="Afficher" class="myButton" name="rechercher"></td>
            </tr>
        </table>
    </form>
    
    <form method="POST" action="">
        <input type="hidden" name="send">
        <div>
            <?php
            if(isset($_POST['rechercher']))
            { ?>
                                                                                
                                                
                    <?php $ref=$_POST['CIN_viti'];
 
                    require_once("connectPDO.php");
 
                    $query = "SELECT cliants.Nom_cli as nom,cliants.Prenom_cli AS PRENOM,cliants.CIN AS CIN,cliants.Nom_sect AS SECTEUR,cliants.Adresse AS Adresse,cliants.Tel_cli AS Tel_cli
                    FROM cliants where cliants.CIN =$ref";
                if ($result =  $db->prepare($query)) 
                {
                        $result->execute();
                        /* Récupère un tableau associatif */
                    while ($row =  $result->fetch(PDO::FETCH_ASSOC)) 
                    {?>
                        <table>
                                <tr>
                                    <td>
                                    CIN :
                                    </td>
                                    <td>
                                    <input type="text" name="" value='<?php echo $row["CIN"];?>' disabled>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        Nom et prenom :
                                    </td>
                                    <td>
                                    <input type="text" name="Nom_et_Prenom_vit" value="<?php echo $row["nom"].' '.$row["PRENOM"];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Adresse :
                                    </td>
                                    <td>
                                    <input type="text" name="Adresse" value='<?php echo $row["Adresse"];?>' disabled>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Secteur :
                                    </td>
                                    <td>
                                    <input type="text" name="Nom_sect" value="<?php echo $row["SECTEUR"];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    Numero du telephone :
                                    </td>
                                    <td>
                                    <input type="text" name="Num_phon" value="<?php echo $row["Tel_cli"];?>" disabled>
                                    </td>
                                </tr>
                                
                                    <?php 
                    }
                                    
                }
            }
                                ?>
                        </table>
        </div>
        <label for="">Viticulteur avant la modification</label>
        <table>
            <tr height='50'>
                <th width='110' align='left'>C.I.N : </th><td><?php echo $r['CIN'] ?></td>
            </tr>
            <tr>
                <th width='110'>Nom et Prenom : </th><td><?php echo $r['Nom_et_Prenom_vit'] ?></td>
            </tr>
        </table>
        <div>
            <label for="numero" >id</label>
            <input type=" text" name="id" required="required" id="" value="<?php echo $r['id'] ?>" disabled><br><br>

        </div>
        <div>
            <label for="">Date de payement</label>
            <input type="date" name="date_pay" value="<?php echo $r['date_pay'] ?>" id="">
        </div>
        <div>
            <label for="CIN">C.I.N du viticulteur </label>

                <?php
                $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                $resultset = $mysqli->query("SELECT * FROM cliants");
                ?>
                <select name="CIN" onchange="nomdeviticulteur(this.value1)" class='form-control'>
                    <option value="<?php echo $r['CIN'] ?>"><?php echo $r['CIN']?></option>
                    <?php
                    while ($rows = $resultset->fetch_assoc()) {
                        $id = $rows['id'];
                        $CIN = $rows['CIN'];
                        $Nom_cli = $rows['Nom_cli'];
                        $Prenom_cli = $rows['Prenom_cli'];
                        $e = ("<option value='$CIN'>$CIN : $Nom_cli $Prenom_cli</option>");
                        echo $e; 
                    } ?>
                </select>
        </div>
        <div>
            <label for="">Montant en Ariary</label>
            <input type="number"  name='montant' value="<?php echo $r['montant'] ?>" id='montant ' class='styleinput' placeholder='Montant pour retiret' > Ar
        </div>
        
        <div>
            <!-- <input type="submit" value="Ajouter"> -->
            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment modifier');">Modifier</button>
        </div>
    </form>
    <!-- <div id="footer">
        <?php //include('footer.php'); ?>
    </div> -->
</body>
</html>