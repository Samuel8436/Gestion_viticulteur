<?php

require_once('connect_misql.php');

$im_etu = $_GET['id'];
$selSql = "SELECT * FROM `factur` WHERE id=$im_etu";
$res = mysqli_query($con, $selSql);
$r = mysqli_fetch_assoc($res);

if (isset($_POST["modifier"]) & !empty($_POST)) {
    
    $Date_fact = ($_POST['Date_fact']);
    $CIN_vit = ($_POST['CIN_vit']);
    $Raisin_cult = ($_POST['Raisin_cult']);
    
    $Poids_brut = ($_POST['Poids_brut']);
    $Poids_brut1 = ($_POST['Poids_brut1']);
    $Poids_brut2 = ($_POST['Poids_brut2']);
    // $Poids_net = ($_POST['Poids_net']);
    $Nombre_fut = ($_POST['Nombre_fut']);
    $Nombre_fut1 = ($_POST['Nombre_fut1']);
    $Nombre_fut2 = ($_POST['Nombre_fut2']);
    $Nombre_garaba = ($_POST['Nombre_garaba']);
    $Nombre_garaba1 = ($_POST['Nombre_garaba1']);
    $Nombre_garaba2 = ($_POST['Nombre_garaba2']);
    $Type = ($_POST['Type']);
    $Type1 = ($_POST['Type1']);
    $Type2 = ($_POST['Type2']);
    $Poids_net = ($_POST['Poids_brut']-($_POST['Nombre_fut']*5)-($_POST['Nombre_garaba']));
    $Poids_net1 = ($_POST['Poids_brut1']-($_POST['Nombre_fut1']*5)-($_POST['Nombre_garaba1']));
    $Poids_net2 = ($_POST['Poids_brut2']-($_POST['Nombre_fut2']*5)-($_POST['Nombre_garaba2']));
    //requette sql
    $select="SELECT raisin.Ref_type,raisin.PU AS PU,factur.Type FROM raisin,factur WHERE factur.Type=raisin.Ref_type OR factur.Type1=raisin.Ref_type OR factur.Type2=raisin.Ref_type group by factur.Type";
    $resul = mysqli_query($con, $select);
    $rows = mysqli_fetch_assoc($resul);
    
    $UpdateSql = "UPDATE `factur` SET  
    Date_fact='$Date_fact',
    Raisin_cult='$Raisin_cult',
    CIN_vit='$CIN_vit',
    Poids_brut='$Poids_brut',
    Poids_brut1='$Poids_brut1',
    Poids_brut2='$Poids_brut2',
    Poids_net='$Poids_net',
    Nombre_fut='$Nombre_fut',
    Nombre_fut1='$Nombre_fut1',
    Nombre_fut2='$Nombre_fut2',
    Nombre_garaba='$Nombre_garaba',
    Nombre_garaba1='$Nombre_garaba1',
    Nombre_garaba2='$Nombre_garaba2',
    Type='$Type',
    Type1='$Type1',
    Type2='$Type2',
    PT= '$Poids_net'*'$rows[PU]'+'$Poids_net1'*'$rows[PU]'+'$Poids_net2'*'$rows[PU]'
    WHERE id=$im_etu";
    
    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
        header("Location: liste_facture.php");
        
    } else {
        
        ?>
           <script>
                alert("la mise a jour est echoue");
                location.href = "modifier_fact.php";
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
    
</head>
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
                    <h3>Modifier facture</h2>
    <div class="container">
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
                            <p>clichquer une fois le le boutton afficher pour connaitre l'identite du viticulteur <span style="color:Tomato;">*</span></p>
                            <tr>
                                <td>  <input type="submit" value="Afficher" class="myButton" name="rechercher"></td>
                            </tr>
                        </table>
                    </form>
                    
            <form method="POST" class="form-horizontal col-md-6 pt-4">
                <div class="container">
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
                                                <tr>
                                                    <td>
                                                    CIN :
                                                    </td>
                                                    <td>
                                                    <input type="text" name="CIN_vitu" value='<?php echo $row["CIN"];?>' disabled>
                                                    
                                                    </td>
                                                </tr>
                                                    <?php 
                                    }
                                                    
                                }
                            }
                                                ?>
                                        </table>
                        </div>
                    <table>
                        <tr>
                            <td>Nom et prenom de viticulteur</td>
                            <td><?php echo $r['Nom_et_Prenom_vit'] ?></td>
                        </tr>
                        <tr>
                            <td>Secteur</td>
                            <td><?php echo $r['Nom_sect'] ?></td>
                        </tr>
                        <tr>
                            <td>C.I.N</td>
                            <td><?php echo $r['CIN_vit'] ?></td>
                        </tr>
                    </table>
                    <br><br>
                        <label >id</label>
                        <input type=" text" name="id" required="required" id="" value="<?php echo $r['id'] ?>" disabled><br><br>

                        <label  >Date</label>
                        
                        <input type="date" name="Date_fact"  required="required" id="" value="<?php echo $r['Date_fact'] ?>"><br><br>
                        <label for="CIN">C.I.N du viticulteur </label>
                                    
                            <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                            $resultset = $mysqli->query("SELECT * FROM cliants");
                            ?>
                                    
                            <select name="CIN_vit" onchange="nomdeviticulteur(this.value1)" class='form-control'>
                            <option value="<?php echo $r['CIN_vit']; ?>"><?php echo $r['CIN_vit']; ?></option>
                                <?php
                                while ($rows = $resultset->fetch_assoc()) {
                                    $id = $rows['id'];
                                    $Nom_cli=$rows["Nom_cli"];
                                    $Prenom_cli = $rows["Prenom_cli"];
                                    $secteur = $rows['Nom_sect'];
                                    $CIN = $rows['CIN'];
                                    //$prenom_etu = $rows['prenom_etu'];
                                    $e = ("<option value='$CIN'>$CIN $Nom_cli $Prenom_cli</option>");
                                    echo $e; 
                                } ?>
                            </select>
                            
                        <label >Lieu</label>
                        <input type="text" name="Raisin_cult" required="required" id="" value="<?php echo $r['Raisin_cult'] ?>"><br><br>
                        <label for="">choisisser le type de raisin et saisissez les poids brute corespondant pour chaque raisin livrer<spa style="color:Tomato;">*</spa></label>
                                <?php
                                    include('connectPDO.php');
                                    $rouge=("SELECT * FROM raisin WHERE id_raisin=5");
                                    $col_rouge =  $db->prepare($rouge);
                                    $col_rouge->execute();
                                    $ligne =  $col_rouge->fetch(PDO::FETCH_ASSOC);

                                    $Blancs=("SELECT * FROM raisin WHERE id_raisin=2");
                                    $col_Blancs =  $db->prepare($Blancs);
                                    $col_Blancs->execute();
                                    $ligneB =  $col_Blancs->fetch(PDO::FETCH_ASSOC);

                                    $Grena=("SELECT * FROM raisin WHERE id_raisin=6");
                                    $col_Grena =  $db->prepare($Grena);
                                    $col_Grena->execute();
                                    $ligneG =  $col_Grena->fetch(PDO::FETCH_ASSOC);
                                ?>
                                        <table border=1>
                                            <tr>
                                                <td>Type</td>
                                                <td>P.U</td>
                                                <td>Poids brute</td>
                                                <td>Nombre de fut</td>
                                                <td>Nombre de Garaba</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <INPUT TYPE="checkbox" NAME="Type" value="<?php echo $ligne['Ref_type'] ?>" <?php if($r['Type']){echo 'checked';} ?> style="width: 21px;"><?php echo $ligne['Ref_type'] ?>
                                                </td>
                                                <td><?php echo $ligne['PU']; ?></td>
                                                <td>
                                                    <input type="number" name="Poids_brut" value="<?php echo $r['Poids_brut'] ?>" placholder='Poids brute du raisins'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_fut" value="<?php echo $r['Nombre_fut'] ?>" placeholder='Nombre de fut'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_garaba" value="<?php echo $r['Nombre_garaba'] ?>" placeholder='Nombre de Graba'>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <INPUT TYPE="checkbox" NAME="Type1" value="<?php echo $ligneB['Ref_type'] ?>" <?php if($r['Type1']){echo 'checked';} ?> style="width: 21px;"><?php echo $ligneB['Ref_type'] ?>
                                                </td>
                                                <td><?php echo $ligneB['PU']; ?></td>
                                                <td>
                                                    <input type="number" name="Poids_brut1" value=<?php echo $r['Poids_brut1'] ?> placholder='Poids brute du raisins'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_fut1" value="<?php echo $r['Nombre_fut1'] ?>" placeholder='Nombre de fut'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_garaba1" value="<?php echo $r['Nombre_garaba1'] ?>" placeholder='Nombre de Graba'>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <INPUT TYPE="checkbox" NAME="Type2" value="<?php echo $ligneG['Ref_type'] ?>" <?php if($r['Type2']){echo 'checked';} ?> style="width: 21px;"><?php echo $ligneG['Ref_type'] ?>
                                                </td>
                                                <td><?php echo $ligneG['PU'] ?></td>
                                                <td>
                                                    <input type="number" name="Poids_brut2" value="<?php echo $r['Poids_brut2'] ?>" placholder='Poids brute du raisins'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_fut2" value="<?php echo $r['Nombre_fut2'] ?>" placeholder='Nombre de fut'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_garaba2" value="<?php echo $r['Nombre_garaba2'] ?>" placeholder='Nombre de Graba'>
                                                </td>
                                            </tr>
                                        </table>
                        <!-- <label >Poids brut</label>
                        <input type="number" name="Poids_brut" required="required" id="" value=""><br><br> -->
                        
                        <!-- <label >Poids net</label>
                        <input type="number" name="Poids_net" required="required" id="" value="<?php //echo $r['Poids_net'] ?>"><br><br> -->
                        
                        <!-- <label >Nombre de fut</label>
                        <input type="number" name="Nombre_fut" required="required" id="" value=""><br><br> -->
                        
                        <!-- <label >Nombre de garaba</label>
                        <input type="number" name="Nombre_garaba" required="required" id="" value=""><br><br> -->
                   <br>     
                    <div class="pt-4">
                        <input type="submit"  name="modifier" value="Modifier" class="btn btn-primary m-3" onclick="return confirm('Voulez vous vraiment Modifier');">

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
                    <script>
                        function nomdeviticulteur(str) {
                            console.log(str);
                            document.getElementById("nom").value = str;
                            
                        }
                        
                        function raisins(str) {
                            console.log(str);
                            document.getElementById("PU").value = str;
                        }
                        function Transport(str) {
                            console.log(str);
                            document.getElementById("Num_imatr").value = str;
                        }
                        function Nomdupeseur(str) {
                            console.log(str);
                            document.getElementById("Nom_pes").value = str;
                        }
                        function Nomducontroleur(str){
                            console.log(str);
                            document.getElementById("Nom_contr").value = str;
                        }
                    </script>
</html>