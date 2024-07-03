<?php 
include('securite_page.php');//Securisation avec login
include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="admin/images/logo.jpg" type="image" />
    <link rel="stylesheet" href="saut _de_page.css">
</head>
<style>
a {
  float: left;
}
div a{
    padding-right: 30px;
}
</style>
<body>
    <?php include ('theme.php'); ?> 
    <div>
        <div class="hero-unit-table">
         
            <div id="">
                <a href="index.php" title="Retour a la facture de lvraison"><b>Rretour</b></a>
                <div class='recu'><a href="impri_recu.php" title="Avancer"><b>Recu de payement</b></a></div>
                <div><center><h2>Payement</h2></center></div>
                <br><br>
                <center>
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
                                // $solde= ("SELECT id,Nom_et_Prenom_vit,CIN_vit,Nom_sect,SUM(PT) FROM factur group by CIN_vit");
                                $resultset = $mysqli->query("SELECT id,Nom_et_Prenom_vit,CIN_vit,Nom_sect,SUM(PT) AS PT FROM factur group by CIN_vit");
                                while ($rows = $resultset->fetch_assoc()) {
                                    $id = $rows['id'];
                                    $Nom_cli=$rows["Nom_et_Prenom_vit"];
                                    //$Prenom_cli = $rows["Prenom_cli"];
                                    $secteur = $rows['Nom_sect'];
                                    $CIN = $rows['CIN_vit'];
                                    $PT=$rows['PT'];
                                    $e = ("<option value='$CIN'>$CIN : $Nom_cli</option>");
                                    echo $e; 
                                } ?>
                            </select>
                        </td>
                        </tr>
                        <p>clichquer une fois le le boutton afficher pour connaitre l'identite du viticulteur <span style="color:Tomato;">*</span></p>
                        <tr>
                            <td>  <input type="submit" value="Afficher" class="myButton" name="rechercher"></td>
                        </tr>
                    </table>
                </form>
                <form action="act_pay.php" method="POST">
                    <input type="hidden" name="send">
                    <div>
                        <?php
                        if(isset($_POST['rechercher']))
                        { ?>
                                                                                                
                                                                
                                <?php $ref=$_POST['CIN_viti'];
 
                                require_once("connectPDO.php");
                                // $solde= ("SELECT id,Nom_et_Prenom_vit,CIN_vit,Nom_sect,SUM(PT) FROM factur group by CIN_vit");
                                $query = "SELECT factur.id,factur.Nom_et_Prenom_vit as nom,factur.CIN_vit AS CIN,factur.Nom_sect AS SECTEUR,SUM(factur.PT) AS PT
                                FROM factur where factur.CIN_vit =$ref";
                            if ($result =  $db->prepare($query)) 
                            {
                                    $result->execute();
                                    /* Récupère un tableau associatif */
                                while ($row =  $result->fetch(PDO::FETCH_ASSOC)) 
                                {?>
                                    <table>
                                            <tr>
                                                <td >
                                                    Nom et prenom :
                                                </td>
                                                <td>
                                                <input type="text" name="Nom_et_Prenom_vit" value="<?php echo $row["nom"];?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                CIN :
                                                </td>
                                                <td>
                                                <input type="text" name="CIN" value='<?php echo $row["CIN"];?>' id="">
                                                
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td>
                                                Adresse :
                                                </td>
                                                <td>
                                                <input type="text" name="Adresse" value='<?php //echo $row["Adresse"];?>'>
                                                
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>
                                                Secteur :
                                                </td>
                                                <td>
                                                <input type="text" name="Nom_sect" value="<?php echo $row["SECTEUR"];?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                Solde :
                                                </td>
                                                <td>
                                                <?php
                                                    $Total_solde=$row["PT"]; 
                                                ?>
                                                <input type="text" name="Total_solde" value="<?php echo $Total_solde ;?>">
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td>
                                                Numero du telephone :
                                                </td>
                                                <td>
                                                <input type="text" name="Num_phon" value="<?php //echo $row["Tel_cli"];?>">
                                                </td>
                                            </tr> -->
                                            
                                                <?php 
                                }
                                                
                            }
                        }
                                            ?>
                                    
                    </div>
                    <!-- <div>
                        <label for="CIN">C.I.N du viticulteur </label>

                        <?php
                        // $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                        // $resultset = $mysqli->query("SELECT * FROM factur group by CIN_vit ORDER BY CIN_vit ASC");
                        ?>

                        <select name="CIN" onchange="nomdeviticulteur(this.value1)" class='form-control'>
                            <option value="">chossser la C.I.N du viticulteur</option>
                            <?php
                            // while ($rows = $resultset->fetch_assoc()) {
                            //     $id = $rows['id'];
                            //     $CIN = $rows['CIN_vit'];
                            
                            //     $e = ("<option value='$CIN'>$CIN</option>");
                            //     echo $e; 
                            // } ?>
                        </select>
                    </div> -->
                
                        <tr>
                            <td><label for="">Date de payement :</label></td>
                            <td><input type="date" name="date_pay" id=""></td>
                        </tr>
                        <tr>
                            <td><label for="">Montant en Ariary :</label></td>
                            <td><input type="number"  name='montant' id='montant ' class='styleinput' value="" placeholder='Montant pour retiret' > Ar</td>
                        </tr>
                        <tr>
                            <td><a href="impri_recu.php"><button title="Valider" class='btn btn-primary m-3' onclick="return confirm('Est-ce que vous fait vraiment un payement');">valider</button></a></td>
                        </tr>
                    </table>
                    
                </form>
                </center>
            <div>
        <div>
    <div>
</body>
</html>