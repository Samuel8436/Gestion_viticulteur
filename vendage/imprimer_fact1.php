<?php
    require_once("connectPDO.php");
  
    $nomf=isset($_GET['CIN_vit'])?$_GET['CIN_vit']:"";
    $niveau=isset($_GET['CIN_vit'])?$_GET['CIN_vit']:"all";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    $apropot= "SELECT cliants.Nom_cli as Nom,cliants.Prenom_cli as Prenom,cliants.Nom_sect as secteur,cliants.CIN,factur.CIN_vit,factur.Type,factur.Transporteur,factur.Poids_net AS Poids_net,raisin.Ref_type,raisin.PU AS PU,transporteur.Nom_transp,transporteur.Num_imatr AS Transport FROM cliants,factur,raisin,transporteur WHERE cliants.CIN=factur.CIN_vit AND factur.Type=raisin.Ref_type AND factur.Transporteur=transporteur.Nom_transp GROUP BY factur.CIN_vit AND raisin.Ref_type";
    if($niveau=="all"){
        $requete="SELECT factur.Date_fact,factur.CIN_vit,factur.Poids_brut,factur.Nombre_fut,factur.Nombre_garaba,factur.Type,factur.Transporteur,factur.Poids_net,factur.Nom_et_Prenom_pes,factur.Raisin_cult,factur.Nom_et_Prenom_contr,factur.id,raisin.Ref_type,raisin.PU AS pu,(factur.Poids_net*raisin.PU) AS PT from factur,raisin where factur.Type=raisin.Ref_type and CIN_vit like '%$nomf%' limit $size offset $offset";
        
        $requeteCount="SELECT count(*) countF from factur where CIN_vit like '%$nomf%'";
    }
    else{
         $requete="SELECT factur.Date_fact,factur.CIN_vit,factur.Poids_brut,factur.Nombre_fut,factur.Nombre_garaba,factur.Type,factur.Transporteur,factur.Poids_net,factur.Nom_et_Prenom_pes,factur.Raisin_cult,factur.Nom_et_Prenom_contr,factur.id,raisin.Ref_type,raisin.PU AS pu,(factur.Poids_net*raisin.PU) AS PT from factur,raisin where factur.Type=raisin.Ref_type and CIN_vit like '%$nomf%' and CIN_vit='$niveau' limit $size offset $offset";
        
        $requeteCount="SELECT count(*) countF from factur where CIN_vit like '%$nomf%'";
    }
    $condition=$db->query($apropot);
    // $Apropots=$condition->fetch();
    $resultatF=$db->query($requete);
    $resultatCount=$db->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrFiliere=$tabCount['countF'];
    $reste=$nbrFiliere % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0){ //$nbrFiliere est un multiple de $size
         $nbrPage=$nbrFiliere/$size;?>
            <script>
                 alert("C.I.N n'existe pas");
               location.href = "imprimer_fact.php";
             </script>
             <script src="Alert/src/sweetalert2.js"></script>
             <script src="Alert/src/SweetAlert.js"></script>   
    <?php }
    else{
        $nbrPage=floor($nbrFiliere/$size)+1;  // floor : la partie entière d'un nombre décimal
    }
?>

<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="admin/images/logo.jpg" type="image" />
        <link rel="stylesheet" href="datatable/dataTable.bootstrap.min">
        <link rel="stylesheet" href="datatable/jquery.dataTables.min">
        <link rel="stylesheet" href="datatable/dataTable.bootstrap.min">
        <style>
        span{
                margin-top: -10px;
                padding-top: -10px; 
            }
            div p img{
                padding-left: 45%;
                margin-top: -30px;
                padding-top: -30px; 
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
    
        </style>
    </head>
    <body>
        
        <?php include ('nav_imprimer.php');?> 
        <div class="container">
            <div class="panel panel-success margetop60">
            
                <div class="panel-heading">CIN</div>
                    <div class="panel-body">
                        
                        <form method="get" action="imprimer_fact.php" class="form-inline">
                        
                            <div class="form-group">
                                
                                <input type="number" name="CIN_vit" placeholder="C.I.N du viticulteur" class="form-control" value="<?php echo $nomf ?>"/>
                                <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-search"></span>
                                Chercher...
                            </button>      
                            </div>
                            <br>
                                            
                            
                        </form>
                    </div>
                </div>
                            
        <tobody>
            <?php 
            while($Apropots=$condition->fetch())
        {
            while($filiere=$resultatF->fetch())
            { ?>
                <div class='print-container'>
                    <section>
                        <hr>
                            <div id='tete' align='left'>
                                <P>LAZAN'I BETSILEO
                                   <br><span> ISAHA - FIANARANTSOA</span>
                                <img src="images/logo.jpg"></P>
                            </div>
                            
                            <table>
                                <th width=800><center><b><h1>FANDRAISANA LANJAMBOALOBOKA</h1></b></center></th>
                                <th width='10' align='right'>N°</th>
                                <td>: <?php echo $filiere['id'] ?><td>
                            </table>
                                                    
                        <table id='example' class='table-striped table bordered' style="width:100%">
                            <div>
                                <table id='example' class='table-striped table bordered' style="width:100%">
                                    <tr>
                                        <th align='left'>Daty nadanjana</th>
                                        <td>: <?php echo $filiere['Date_fact']; ?></td>
                                                                
                                    </tr>
                                    <tr>
                                        <th align='left'>SECTEUR</th>
                                        <td>: <?php echo $Apropots['secteur']; ?></td>
                                                                
                                    </tr>
                                                        
                                    <tr>
                                        <th align='left'>MPAMBOLY</th>
                                        <td>: <?php echo $Apropots['Nom'].''. $Apropots['Prenom']; ?></td>
                                                                
                                    </tr>

                                    <tr>
                                        <th align='left'>TOERANA</th>
                                        <td>: <?php echo $filiere['Raisin_cult']; ?></td>
                                                                
                                    </tr>
                                </table>
                                                    
                            </div>
                            <table border='1'>
                                <tr>
                                    <th align='left'>TYPE</th>
                                    <td>POIDS BRUT/kg</td>
                                    <td>NOMBRE DE FÛT</td>
                                    <td>NOMBRE DE GARABA</td>
                                    <td>POIDS NET/kg</td>
                                    <td>P.U</td>
                                    <td>PRIX TOTAL</td> 
                                </tr>
                                <tr>
                                    <th align='left'> <?php echo $filiere['Type'] ?></th>
                                    <td><center><?php echo $filiere['Poids_brut'] ?></center></td>
                                    <td><center><?php echo $filiere['Nombre_fut'] ?></center></td>
                                    <td><center><?php echo $filiere['Nombre_garaba'] ?></center></td>
                                    <td><center><?php echo $filiere['Poids_net'] ?></center></td>
                                    <td><center><?php echo $filiere['pu']; ?></center></td>
                                    <td><center><?php echo $filiere['PT'] ?></center></td>
                                                            
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>Mpitatitra :</td>
                                    <td><?php echo $filiere['Transporteur'] ?></td>
                                </tr>
                                <tr>
                                    <td>Fiara N°</td>
                                    <td><?php echo $Apropots['Transport']; ?></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td width='600'><center><b><h2>Sonia</h2></b></center></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                
                                    <td  width='200'><center> Mpamboly</center></td>
                                    <td width='200'><center>Mpitatitra</center></td>
                                    <td width='200'><center>Mpandanja</center></td>
                                    <td width='200'><center>Commission de controle</center></td>
                                </tr>
                            </table>
                            <br><br><br><br><br>
                            <table>
                                <tr>
                                
                                    <td  width='200'><center><?php echo $Apropots['Nom'].''. $Apropots['Prenom']; ?></center></td>
                                    <td width='200'><center><?php //echo $Apropots['Nom'].''. $Apropots['Prenom']; ?></center></td>
                                    <td width='200'><center><?php echo $filiere['Nom_et_Prenom_pes'] ?></center></td>
                                    <td width='200'><center><?php echo $filiere['Nom_et_Prenom_contr'] ?></center></td>
                                </tr>
                            </table>
                        <table>
                        <hr>
                    </section>
                </div>
                <p>
                    <img src="images/icons8_print_32.png" width='15' alt="">
                    <!-- <b><button >imprimer</button> </b> -->
                    <input type="submit" value="Exporter en pdf" id='impresson' name='impression' onclick='imprimer_page()'>
                </p>
                
                <br><br><br><br><br><br><br><br><br><br>
                <?PHP
            }
        } 
            ?>
            <script type="text/javascript">
                function imprimer_page(){
                    window.print(document.getElementById='impri');
                }
            </script>
        </tbody>
        <a href="#">Retour en haut de page</a>
        <div id="footer">
                              
            <p>
                <a href="https://www.Lazanibetsileofianarantsoa.mg" align='right' target="_blank" style="text-decoration:none;">&copy; Lazan'iBetsileo Fianarantsoa.</a> 
            </p>



        </div>
       
    </body>
</HTML>