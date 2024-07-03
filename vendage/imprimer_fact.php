<?php
// include('header.php');
    require_once("connectPDO.php");
    $req=$db -> query("SELECT factur.Date_fact,factur.CIN_vit AS CIN_vit,factur.Poids_brut,factur.Poids_brut1,factur.Poids_brut2,factur.Nombre_fut,factur.Nombre_fut1,factur.Nombre_fut2,factur.Nombre_garaba,factur.Nombre_garaba1,factur.Nombre_garaba2,factur.Type,factur.Type1 AS Type1,factur.Type2 AS Type2,factur.Transporteur,factur.Poids_net,factur.Poids_net1,factur.Poids_net2,factur.Nom_et_Prenom_pes,factur.Raisin_cult,factur.Nom_et_Prenom_contr,factur.id,raisin.Ref_type,raisin.PU AS pu,(factur.Poids_net*raisin.PU) AS PT,factur.Nom_sect AS secteur,factur.Nom_et_Prenom_vit AS nom,factur.Transporteur AS Transporteur
    from factur,raisin ORDER BY factur.id desc");
    if (isset($_GET['Nom_et_Prenom_vit']) AND !empty($_GET['Nom_et_Prenom_vit'])) {
        # code...
        $recherche = htmlspecialchars($_GET['Nom_et_Prenom_vit']);
        $req = $db -> query("SELECT factur.Date_fact,factur.CIN_vit AS CIN_vit,factur.Poids_brut,factur.Poids_brut1,factur.Poids_brut2,factur.Nombre_fut,factur.Nombre_fut1,factur.Nombre_fut2,factur.Nombre_garaba,factur.Nombre_garaba1,factur.Nombre_garaba2,factur.Type,factur.Type1 AS Type1,factur.Type2 AS Type2,factur.Transporteur,factur.Poids_net,factur.Poids_net1,factur.Poids_net2,factur.Nom_et_Prenom_pes,factur.Raisin_cult,factur.Nom_et_Prenom_contr,factur.id,raisin.Ref_type,raisin.PU AS pu,(factur.Poids_net*raisin.PU) AS PT,factur.Nom_sect AS secteur,factur.Nom_et_Prenom_vit AS nom,factur.Transporteur AS Transporteur
        from factur,raisin where Nom_et_Prenom_vit like '%".$recherche."%' group by factur.id order by factur.id desc");
    }

    // // $nomf=isset($_GET['Nom_et_Prenom_vit'])?$_GET['Nom_et_Prenom_vit']:"";
    // // $niveau=isset($_GET['Nom_et_Prenom_vit'])?$_GET['Nom_et_Prenom_vit']:"all";
    
    // // $size=isset($_GET['size'])?$_GET['size']:6;
    // // $page=isset($_GET['page'])?$_GET['page']:1;
    // $offset=($page-1)*$size;
    // $apropot= "SELECT cliants.Nom_cli as Nom,cliants.Prenom_cli as Prenom,cliants.Nom_sect as secteur,cliants.CIN,factur.CIN_vit,factur.Type,factur.Type1 AS Type1,factur.Type2 AS Type2,factur.Transporteur,factur.Poids_net AS Poids_net,raisin.Ref_type,raisin.PU AS PU,transporteur.Nom_transp,transporteur.Num_imatr AS Transport 
    // FROM cliants,factur,raisin,transporteur WHERE cliants.CIN=factur.CIN_vit AND factur.Type=raisin.Ref_type AND factur.Transporteur=transporteur.Nom_transp GROUP BY factur.CIN_vit AND raisin.Ref_type";
    // if($niveau=="all"){
    //     $requete="SELECT factur.Date_fact,factur.CIN_vit AS CIN_vit,factur.Poids_brut,factur.Poids_brut1,factur.Poids_brut2,factur.Nombre_fut,factur.Nombre_fut1,factur.Nombre_fut2,factur.Nombre_garaba,factur.Nombre_garaba1,factur.Nombre_garaba2,factur.Type,factur.Type1 AS Type1,factur.Type2 AS Type2,factur.Transporteur,factur.Poids_net,factur.Poids_net1,factur.Poids_net2,factur.Nom_et_Prenom_pes,factur.Raisin_cult,factur.Nom_et_Prenom_contr,factur.id,raisin.Ref_type,raisin.PU AS pu,(factur.Poids_net*raisin.PU) AS PT,factur.Nom_sect AS secteur,factur.Nom_et_Prenom_vit AS nom,factur.Transporteur AS Transporteur
    //     from factur,raisin where Nom_et_Prenom_vit like '%".$nomf."%' group by factur.id order by factur.id desc limit $size offset $offset";
        
    //     //$requeteCount="SELECT count(*) countF from factur where CIN_vit like '%$nomf%'";
    // }
    // else{
    //      $requete="SELECT factur.Date_fact,factur.CIN_vit AS CIN_vit,factur.Poids_brut,factur.Poids_brut1,factur.Poids_brut2,factur.Nombre_fut,factur.Nombre_fut1,factur.Nombre_fut2,factur.Nombre_garaba,factur.Nombre_garaba1,factur.Nombre_garaba2,factur.Type,factur.Type1 as Type1,factur.Type2 AS Type2,factur.Transporteur,factur.Poids_net,factur.Poids_net1,factur.Poids_net2,factur.Nom_et_Prenom_pes,factur.Raisin_cult,factur.Nom_et_Prenom_contr,factur.id,raisin.Ref_type,raisin.PU AS pu,(factur.Poids_net*raisin.PU) AS PT,factur.Nom_sect AS secteur,factur.Nom_et_Prenom_vit AS nom,factur.Transporteur AS Transporteur
    //      from factur,raisin where Nom_et_Prenom_vit like '%".$nomf."%' and Nom_et_Prenom_vit='$niveau' group by factur.id order by factur.id desc limit $size offset $offset";
        
    // }
    // $condition=$db->query($apropot);
    // $resultatF=$db->query($requete);
    ?>
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

<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="admin/images/logo.jpg" type="image"/>
        <!-- <link rel="stylesheet" href="imprimer_fact.css"> -->
        <link rel="stylesheet" href="forme_input.css">
        <header>
            <link rel="stylesheet" href="datatable/bootstrap.min.css">
        </header>
        <script src="datatable/jquery-3.6.0.min.js"></script>
        <script src="datatable/bootstrap.min.js"></script>
        <style>
        .form-group span{
            display: inline-block;
            font-size: 20px;
            padding: 20px;
        }
        span div div{
            display: inline;
        }
        span{
                margin-top: -10px;
                padding-top: -10px; 
            }
        div p img{
            padding-left: 69%;
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
        div.taux{
            float: left;
            padding-right: 20px;
            /* padding-bottom: 10px ; */
        }
        </style>
    </head>
    <body><br>
        <?php include ('theme.php'); ?> 
        <center><?php include ('nav_imprimer.php');?></center> 
        <div class="container">
            <div class="panel panel-success margetop60">
                <p>
                <!-- <div class="panel-heading">CIN</div> -->
                    <div class="panel-body">
                    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                        <form method="get" action="imprimer_fact.php">
                        
                            <div class="form-group">
                            
                                <span><input id="myInput" class="form control" type="search" name="Nom_et_Prenom_vit" placeholder="Nom et Prénon" value="<?php //echo $nomf ?>"/></span>
                                <span><button class="btn btn-success" title="Recherche de facture du viticulteur par Nom">Chercher...</button></span>
                            <span align= 'left'>
                                <img src="images/icons8_print_32.png" width='25' alt="">
                                <!-- <input type="submit" value="Exporter en pdf" id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer"> -->
                                <button id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer">Exporter en pdf</button>
                            </span>      
                            </div>    
                        </form>
                    <nav>
                    </div>
                <!-- </div> -->
                </p>
        <div>
            <?php
                $Cliant= "SELECT COUNT(CIN) AS cl FROM cliants";
                $Facture= "SELECT COUNT(CIN_vit) AS FT FROM factur group by CIN_vit";
                // $resultcli=$db->query($Cliant);
                 $stmt = $db->prepare($Cliant);
                 $stmt->execute();
                 $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $cli = $row['cl'];
                $ftnt = $db->prepare($Facture);
                $ftnt->execute();
                $row = $ftnt->fetch(PDO::FETCH_ASSOC);
                $fact = $row['FT'];
                $pourcent = ($fact*100)/$cli;
                // echo $pourcent + '%';
               

            ?>
          <span> 
            <div class="taux">Taux de livraison (les viticulteur qui fait la livraison) : </div>
            <?PHP
                if ($pourcent<=100) {?>
                    <div class="progress">
                        <div class="progress-bar" style="width:<?php echo $pourcent?>%"><?php echo $pourcent?>%</div>
                    </div>
            <?PHP 
            }
            else {
                // echo 'Tout les viticulteur deja fait la livraison';
            }
                
            ?>
            
            
          </span>
        </div>
        <div><?php //include ('nav_sidebar.php'); ?>                   
        <tobody>
            <?php 
        //     while($Apropots=$condition->fetch())
        // {
            if ($req->rowCount() > 0) {
                # code...
                while($filiere=$req->fetch())
                { ?><tbody id="myTable">
                    <div class='print-container'>
                        <section>
                            <hr>
                                <div id='tete' align='left'>
                                    <P>LAZAN'I BETSILEO
                                    <br><span> ISAHA - FIANARANTSOA</span>
                                    <img src="images/logo.jpg"></P>
                                </div>
                                
                                <table>
                                    <th width=1000><center><b><h1>FACTURE DE LIVRAISON</h1></b></center></th>
                                    <th width='10' align='right'>N°</th>
                                    <td>: <?php echo $filiere['id'] ?><td>
                                </table>
                                <div>
                                    <table>
                                        <tr>
                                            <th align='left'>Date de livraison</th>
                                            <td>: <?php echo $filiere['Date_fact']; ?></td>
                                                                    
                                        </tr>
                                        <tr>
                                            <th align='left'>SECTEUR</th>
                                            <td>: <?php echo $filiere['secteur']; ?></td>
                                                                    
                                        </tr>
                                                            
                                        <tr>
                                            <th align='left'>Viticulteur</th>
                                            
                                            <td>: <?php echo $filiere['nom']; ?></td>
                                                                    
                                        </tr>
                                        <tr>
                                            <th>C.I.N </th>
                                            <td> :<?php echo $filiere['CIN_vit'];?></td>
                                        </tr>

                                        <tr>
                                            <th align='left'>Lieu</th>
                                            <td>: <?php echo $filiere['Raisin_cult']; ?></td>
                                                                    
                                        </tr>
                                    </table>
                                                        
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th align='left'>TYPE</th>
                                        <td>POIDS BRUT/kg</td>
                                        <td>NOMBRE DE FÛT</td>
                                        <td>NOMBRE DE GARABA</td>
                                        <td>POIDS NET/kg</td>
                                        <!-- <td>P.U</td>
                                        <td>PRIX TOTAL</td>  -->
                                    </tr>
                                    <?php $PT=$filiere['PT'];
                                    if ($filiere["Type"]) {
                                        # code...
                                    
                                    ?>


                                    <tr>
                                    
                                    
                                    
                                        <th align='left'> <?php echo $filiere['Type'] ?></th>
                                        <td><center><?php echo $filiere['Poids_brut'] ?></center></td>
                                        <td><center><?php echo $filiere['Nombre_fut'] ?></center></td>
                                        <td><center><?php echo $filiere['Nombre_garaba'] ?></center></td>
                                        <td><center><?php echo $filiere['Poids_net'] ?></center></td>
                                        <!-- <td><center><?php //echo $ligne['PU']; ?></center></td>
                                        <td><center><?php //echo $filiere['PT'] ?></center></td> -->
                                                                
                                    </tr>
                                    <?php
                                    }
                                        $poidsnet1=$filiere['Poids_net1'];
                                        $PUB = $ligneB['PU'];
                                        $PT1 = $poidsnet1*$PUB;
                                    if ($filiere['Type1']) {
                                        # code...
                                    
                                    ?>
                                    <tr>
                                        <th align='left'> <?php echo $filiere['Type1'] ?></th>
                                        <td><center><?php echo $filiere['Poids_brut1'] ?></center></td>
                                        <td><center><?php echo $filiere['Nombre_fut1'] ?></center></td>
                                        <td><center><?php echo $filiere['Nombre_garaba1'] ?></center></td>
                                        <td><center><?php echo $filiere['Poids_net1'] ?></center></td>
                                        <!-- <td><center><?php //echo $ligneB['PU']; ?></center></td>
                                        <td><center><?php //echo $PT1 ?></center></td> -->
                                                                
                                    </tr>
                                    <?php
                                    }
                                        $poidsnet2=$filiere['Poids_net2'];
                                        $PUG = $ligneG['PU'];
                                        $PT2 = $poidsnet2*$PUG;
                                        if ($filiere['Type2']) {
                                            # code...
                                        
                                    ?>
                                    <tr>
                                        <th align='left'> <?php echo $filiere['Type2'] ?></th>
                                        <td><center><?php echo $filiere['Poids_brut2'] ?></center></td>
                                        <td><center><?php echo $filiere['Nombre_fut2'] ?></center></td>
                                        <td><center><?php echo $filiere['Nombre_garaba2'] ?></center></td>
                                        <td><center><?php echo $filiere['Poids_net2'] ?></center></td>
                                        <!-- <td><center><?php //echo $ligneG['PU']; ?></center></td>
                                        <td><center><?php //echo $PT2 ?></center></td> -->
                                                                
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <table>
                                    <tr>
                                        <td>TOTAL :</td>
                                        <td>
                                            <?php
                                                $TOTAL = $PT2+$PT1+$PT;
                                                echo $TOTAL;
                                            ?> Ar
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Transporteur :</td>
                                        <td><?php echo $filiere['Transporteur'] ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>N° de transporteur :</td>
                                        <td><?php //echo $filiere['Transporteur']; ?></td>
                                    </tr> -->
                                </table>
                                <table>
                                    <tr>
                                        <td width='1000'><center><b><h3>Signature</h3></b></center></td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                    
                                        <td  width='230'><center> Viticulteur</center></td>
                                        <td width='230'><center>Transporteur</center></td>
                                        <td width='230'><center>Peseur</center></td>
                                        <td width='230'><center>Controleur</center></td>
                                    </tr>
                                </table>
                                <br><br>
                                <table>
                                    <tr>
                                    
                                        <td  width='230'><center><?php echo $filiere['nom']; ?></center></td>
                                        <td width='230'><center><?php //echo $Apropots['Nom'].''. $Apropots['Prenom']; ?></center></td>
                                        <td width='230'><center><?php echo $filiere['Nom_et_Prenom_pes'] ?></center></td>
                                        <td width='230'><center><?php echo $filiere['Nom_et_Prenom_contr'] ?></center></td>
                                    </tr>
                                </table>
                            <hr>
                        </section>
                    </div>
                    <br><br>
                    <?PHP
                }
            }
            else {
                # code...
                ?>
                <br><P>Aucun resultat de recherche</P><br>
                <?php
            }
            
        // } 
            ?>
            <script type="text/javascript">
                // $(document).ready(function(){
                // $("#myInput").on("keyup", function() {
                //     var value = $(this).val().toLowerCase();
                //     $("#myTable tr").filter(function() {
                //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                //     });
                // });
                // });
                function imprimer_page(){
                    window.print(document.getElementById='impri');
                }
            </script>
        </tobody>
        </div>
        <a href="#">Retour en haut de page</a>
        <div id="footer">
                              
            <p>
                <a href="https://www.Lazanibetsileofianarantsoa.mg" align='right' target="_blank" style="text-decoration:none;">&copy; Lazan'iBetsileo Fianarantsoa.</a> 
            </p>



        </div>
       
    </body>
</HTML>