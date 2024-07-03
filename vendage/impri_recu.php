<?php include('securite_page.php');//Securisation avec login ?>
<?php
    require_once("connectPDO.php");
    $req= $db -> query("SELECT cliants.Nom_cli as nom,cliants.Prenom_cli as prenom,cliants.CIN,cliants.Solde as solde,payement.CIN AS CIN,payement.montant as montant,payement.Nom_et_Prenom_vit AS Nom_et_Prenom_vit,payement.date_pay,payement.id FROM cliants,payement WHERE payement.CIN=cliants.CIN ORDER BY payement.id desc");
    // $req = $db -> query("SELECT * FROM payement ORDER BY id desc");
    if (isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
        # code...
        $recherche = htmlspecialchars($_GET['recherche']);
        $req= $db -> query("SELECT cliants.Nom_cli as nom,cliants.Prenom_cli as prenom,cliants.CIN,cliants.Solde solde,payement.CIN AS CIN,payement.montant as montant,payement.Nom_et_Prenom_vit AS Nom_et_Prenom_vit,payement.date_pay,payement.id FROM cliants,payement WHERE payement.CIN=cliants.CIN AND Nom_et_Prenom_vit like '%".$recherche."%' ORDER BY payement.id desc");
        // $req = $db -> query("SELECT * FROM payement WHERE Nom_et_Prenom_vit like '%".$recherche."%' ORDER BY id desc");
    }
         ?>
         
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="admin/images/logo.jpg" type="image"/>
<!-- <link rel="stylesheet" href="Styl_back_ground.css"> -->
<link rel="stylesheet" href="forme_input.css">
<header>
        <link rel="stylesheet" href="datatable/bootstrap.min.css">
</header>
<script src="datatable/jquery-3.6.0.min.js"></script>
<script src="datatable/bootstrap.min.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Recu de payement</title>
    
    <style>
    
    .form-group span {
                display: inline-block;
                /* font-size: 20px; */
                padding: 20px;
            }
    p{
        display: inline;
    }
        div p img{
                padding-right: 30%;
                margin-top: -30px;
                padding-top: -30px;
            }
        p span {
            display: inline;
        }
        @media print{
            body *{
                visibility: hidden;
            }
            .print-container, .print-container *{
                visibility: visible;
            }
            .print-container{
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    div.recu{
        padding-right: 90px;
    }
    div.tabulation{
        padding-left: 90px;
    }
    </style>
</head>
<body>
    
    <br>
    <?php 
    include ('theme.php'); ?> 
    <?php //include ('nav_imprimer.php');?>
    <center><?php include ('nav_imprimer.php');?></center>
    <div class="panel-body">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <form method="get" action="impri_recu.php" class="form-inline">
    <p>                
        <div class="form-group">
            <span><input type="search" class="form control" name="recherche" placeholder="Nom et Prenom" value="<?php //echo $nomf ?>"/></span>
            <span><button class="btn btn-success">
                <!-- <span class="glyphicon glyphicon-search"></span> -->
                Chercher...
            </button></span>
            <span align= 'left'>
                <img src="images/icons8_print_32.png" width='25' alt="">
                <button  id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-primary">Exporter en pdf</button>
            </span>      
        </div>
    </form>
    </nav>
    </div>
    </p>
    <br><br>
    <div>
        <?php //include ('nav_sidebar.php'); ?>
        <span>
            <?php
            if ($req->rowCount() > 0) {
                # code...
                while($filiere=$req->fetch())
                {
                    ?>
                        <div class='print-container'>
                            <hr>
                                <div class='tabulation'>
                                    <div id='tete'>
                                        <p>
                                            <h3>STAT : 15915211983000014</h3>
                                            <span><h3>NIF : 300204170</h3></span>
                                            <img src="images/logo.jpg" align='right'>
                                        </P>
                                    </div>
                                </div>
                                <center>
                                    <b><h2>LAZAN'I BETSILEO S.A</h2></b>
                                    <b><h2>ISAHA - FIANARANTSOA</h2></b>
                                    <div class='recu'><b><h3>RECU DE PAYEMENT</h3></b></div>
                                </center>
                                <div class='tabulation'>
                                    <table>
                                        <tr>
                                            <td>Date de payement :  </td>
                                            <td><?php echo $filiere['date_pay']; ?></td>
                                        </tr>
                                    <table>
                                        <tr>
                                            <td>Nom de viticulteur :  </td>
                                            <td><?php echo $filiere['nom'].' '.$filiere['prenom']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N :  </td>
                                            <td><?php echo $filiere['CIN']; ?></td>
                                        </tr>
                                    </table>
                                    <!-- <table>
                                        <tr>
                                            <td>Votre solde avant du payement : </td>
                                            <td>
                                            <?php 
                                                // $soldeavant = $filiere['solde'] + $filiere['montant'];
                                                // echo $soldeavant ?> Ar
                                            </td>
                                        </tr>
                                    </table> -->
                                    <table>
                                        <tr>
                                            <td>Montant : </td>
                                            <td><?php echo $filiere['montant'] ?> Ar</td>
                                        </tr>
                                    </table>
                                    
                                    <table>
                                        <tr>
                                            <td>Solde restant apres la payement :  </td>
                                            <td>
                                                <?php
                                                    // $PT= $filiere['Total_solde'];
                                                    // $montant= $filiere['montant'];
                                                    // $reste_de_stock= $PT-$montant;
                                                    echo $filiere['solde'];
                                                ?> Ar
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <!-- <tr>
                                            <td>Secteur :  </td>
                                            <td><?php //echo $filiere['SECTEUR'] ?></td>
                                        </tr> -->
                                    </table>
                                    <table>
                                        <tr>
                                            <td>Motif :  </td>
                                            <td>
                                                <?php
                                                
                                                    if($filiere['solde'] <0)
                                                    {
                                                        echo 'Avance sur vendage';
                                                    }
                                                    else{echo 'Payement';}
                                                ?>
                                                <!-- Mampiasa condition fi(solde restant(kely noho)Montant{echo 'Avance sur vendage';}<br>
                                                else{echo 'Payement';} -->
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <table>
                                    <tr>
                                        <td width='1000' align='right'>
                                            <b>SIGNATURE</b>
                                            
                                            <?php //echo $filiere['controleur']; ?>
                                            
                                        </td>
                                    </tr>
                                
                                </table>
                                <br>
                            <hr>
                        </div>
                        <br><br><br>
                        <?PHP 
                }
            }
            else {
                # code...
                ?>
                <P>Aucun viticulteur</P>
                <?php
            }
             ?>
        </span>
    </div>
    <a href="">Retour en haut de page</a>
    
    <script type="text/javascript">
        function imprimer_page(){
            window.print();
            window.print(document.getElementById='impri');
        }
     </script>
</body>
</html>