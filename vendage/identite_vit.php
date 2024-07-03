<?php
    require_once("connectPDO.php");
    $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
    $resultset = $mysqli->query("SELECT * FROM cliants");
?>
<form method="POST" action="">
    <div id="formulaire">
    <table>
                            <tr>
                                <td><label>C.I.N de viticulteur : </label></td>
                            <td> 
                                <select name="CIN_viti" onchange="nomdeviticulteur(this.value1)" class='form-control'>
                                <option value="">chossser la C.I.N du viticulteur</option>
                                    <?php
                                    while ($rows = $resultset->fetch_assoc()) {
                                        $id = $rows['id'];
                                        $Nom_cli=$rows["Nom_cli"];
                                        $Prenom_cli = $rows["Prenom_cli"];
                                        $secteur = $rows['Nom_sect'];
                                        $CIN = $rows['CIN'];
                                        $e = ("<option value='$CIN'>$CIN</option>");
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
<?php
    if(isset($_POST['rechercher']))
    { ?>
                                                                            
                                            
            <?php $ref=$_POST['CIN_viti'];

            $query = "SELECT cliants.Nom_cli as nom,cliants.Prenom_cli AS PRENOM,cliants.CIN AS CIN,cliants.Nom_sect AS SECTEUR,cliants.Adresse AS Adresse,cliants.Tel_cli AS Tel_cli
            FROM cliants where cliants.CIN =$ref";
        if ($result =  $db->prepare($query)) {
            $result->execute();
            /* Récupère un tableau associatif */
        while ($row =  $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
                                            <table>
                                                <tr>
                                                    <td >
                                                        Nom et prenom :
                                                    </td>
                                                    <td>
                                                    <input type="text" name="" value="<?php echo $row["nom"].' '.$row["PRENOM"];?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Adresse :
                                                    </td>
                                                    <td>
                                                    <input type="text" name="Adresse" value='<?php echo $row["Adresse"];?>'>
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Secteur :
                                                    </td>
                                                    <td>
                                                    <input type="text" name="SECTEUR" value="<?php echo $row["SECTEUR"];?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Numero du telephone :
                                                    </td>
                                                    <td>
                                                    <input type="text" name="" value="<?php echo $row["Tel_cli"];?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    CIN :
                                                    </td>
                                                    <td>
                                                    <input type="text" name="CIN_vit" value='<?php echo $row["CIN"];?>' id="">
                                                    
                                                    </td>
                                                </tr>
                                                    <?php }
                                                    
                                                }
                                            }
                                                ?>
                                            </table>
                        </form>