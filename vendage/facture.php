
<?php 
include('securite_page.php');//Securisation avec login
include('header.php');
?>
<?php //include('admin/connect.php'); ?>

<body>
    <?php include ('theme.php'); ?> 
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


                        <h3> Ajout Facture de livraison</h3>
                        <p>
                            <?php //include ('product_menu_fact.php');?>
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
                            <p>clichquer une fois le le boutton afficher pour connaitre l'identite du viticulteur <span style="color:Tomato;">*</span></p>
                            <tr>
                                <td>  <input type="submit" value="Afficher" class="myButton" name="rechercher"></td>
                            </tr>
                        </table>
                    </form>
                        <form method="POST" action="act_fact.php">
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
                                                    <input type="text" name="CIN_vit" value='<?php echo $row["CIN"];?>' disabled>
                                                    
                                                    </td>
                                                </tr>
                                                    <?php 
                                    }
                                                    
                                }
                            }
                                                ?>
                            </div>
                              <tr>
                                <td>
                                
                                    
                                        <label for="">Date de livraison</label>
                                        
                                    
                                </td>
                                <td><input type="date" name="Date_fact" id=""></td>
                              </tr>
                              <tr>
                                <td>
                                
                                <label for="">Lieu</label>
                                
                            
                                </td>
                                <td><input type="text" name="Raisin_cult" id="" placeholder='Raisin culture'></td>
                              </tr>       
                        
                            
                            </table>
                            
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
                                                    <INPUT TYPE="checkbox" NAME="Type" value="<?php echo $ligne['Ref_type'] ?>" style="width: 21px;"><?php echo $ligne['Ref_type'] ?>
                                                </td>
                                                <td><?php echo $ligne['PU']; ?></td>
                                                <td>
                                                    <input type="number" name="Poids_brut" value=0 placholder='Poids brute du raisins'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_fut" id="" placeholder='Nombre de fut'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_garaba" id="" placeholder='Nombre de Graba'>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <INPUT TYPE="checkbox" NAME="Type1" value="<?php echo $ligneB['Ref_type'] ?>" style="width: 21px;"><?php echo $ligneB['Ref_type'] ?>
                                                </td>
                                                <td><?php echo $ligneB['PU']; ?></td>
                                                <td>
                                                    <input type="number" name="Poids_brut1" value=0 placholder='Poids brute du raisins'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_fut1" id="" placeholder='Nombre de fut'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_garaba1" id="" placeholder='Nombre de Graba'>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <INPUT TYPE="checkbox" NAME="Type2" value="<?php echo $ligneG['Ref_type'] ?>" style="width: 21px;"><?php echo $ligneG['Ref_type'] ?>
                                                </td>
                                                <td><?php echo $ligneG['PU'] ?></td>
                                                <td>
                                                    <input type="number" name="Poids_brut2" value=0 placholder='Poids brute du raisins'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_fut2" id="" placeholder='Nombre de fut'>
                                                </td>
                                                <td>
                                                    <input type="text" name="Nombre_garaba2" id="" placeholder='Nombre de Graba'>
                                                </td>
                                            </tr>
                                        </table>
                                    <?php
                                    // }
                            ?><br>
                                    
                            </div>
                            
                                <div>
                                    <label for="Nom_transp">Transporteur<span style="color:Tomato;">*</span></label>
                                </div> 
                                <div>       
                                        <?php
                                        $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                        $resultset = $mysqli->query("SELECT * FROM transporteur");
                                        ?>
                                        
                                        <select name="Transporteur" onchange="Transport(this.value)" class='form-control'>
                                        <option value="">chossser votre transporteur</option>
                                            <?php
                                            while ($rows = $resultset->fetch_assoc()) {
                                                $id = $rows['id_transp'];
                                                $Num_imatr = $rows['Num_imatr'];
                                                $Nom_transp = $rows['Nom_transp'];
                                                $e = ("<option value='$Nom_transp'>$Nom_transp</option>");
                                                echo $e; 
                                            } ?>
                                        </select>
                                </div>
                            
                                <div>
                                    <label for="CIN_pes">Nom et Prenom du peseur<span style="color:Tomato;">*</span></label>
                                        
                                        <?php
                                        $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                        $resultset = $mysqli->query("SELECT * FROM peseur");
                                        ?>
                                        
                                        <select name="Nom_et_Prenom_pes" onchange="Nomdupeseur(this.value)" class='form-control'>
                                        <option value="">Nom et Prenom du peseur</option>
                                            <?php
                                            while ($rows = $resultset->fetch_assoc()) {
                                                $id = $rows['id_pes'];
                                                $Nom_pes = $rows['Nom_pes'];
                                                $Prenom_pes = $rows['Prenom_pes'];
                                                $CIN_pes = $rows['CIN_pes'];
                                            

                                                $e = ("<option value='$Nom_pes $Prenom_pes'>$Nom_pes $Prenom_pes</option>");
                                                echo $e; 
                                            } ?>
                                        </select>
                                </div>
                                
                                <div>
                                    <label for="Nom_transp">Nom et Prenom du controleur<span style="color:Tomato;">*</span></label>
                                        
                                        <?php
                                        $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                        $resultset = $mysqli->query("SELECT * FROM controleur");
                                        ?>
                                        
                                        <select name="Nom_et_Prenom_contr" onchange="Nomducontroleur(this.value)" class='form-control'>
                                        <option value="">Nom et Prenom du controleur</option>
                                            <?php
                                            while ($rows = $resultset->fetch_assoc()) {
                                                $id = $rows['id'];
                                                $CIN_contr = $rows['CIN_contr'];
                                                $nom_cont = $rows['Nom_contr'];
                                                $Prenom_contr = $rows['Prenom_contr'];

                                                $e = ("<option value='$nom_cont $Prenom_contr'>$nom_cont $Prenom_contr</option>");
                                                echo $e; 
                                            } ?>
                                        </select>
                                    </div>
                                        
                                        </div>
                            
                           
                            <button class='btn btn-primary m-3' onclick="return confirm('Voulez-vous vraiment livrer ce raisin');">Livrer</button>
                        </form>
                    </div>
                    <!-- <div id="footer">
                        
                        <?php //include('footer.php'); ?>
                    </div> -->
<br><br>
                    <script>
                        function nomdeviticulteur(str) {
                            console.log(str);
                            document.getElementById("nom").value1 = str;
                            
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
                        
                        