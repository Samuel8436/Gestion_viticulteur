<?php //include('header.php'); ?>
<?php
require_once('connect_misql.php');
$ReadSql = "SELECT * FROM `factur` ";

$res = mysqli_query($con, $ReadSql);
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="admin/images/logo.jpg" type="image" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des factures</title>
    <link rel="stylesheet" href="Styl_back_ground.css">
    <link rel="stylesheet" href="style_body.css">
    <link rel="stylesheet" href="style_align_display.css">
    <link rel="stylesheet" href="forme_input.css">
    <script src="datatable/jquery-3.6.0.min.js"></script>
    <script src="datatable/bootstrap.min.js"></script>
    <style>
    
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
        button{
            border-radius : 8px;
            width : 155px;
            height :30px;
        }
    </style>
</head>

<body>
<br>
<?php include ('theme.php'); ?>  
<div>
    <div class='backgruond' id="background">
        <div id="page">
                    <br><br>
                    <center><h2><?php include ('nav_imprimer.php');?></h2></center>
            <!-- <div class="container">manao anio fotsifotsi io -->
        <div class="row pt-4">
            <h2>
                <center><u>Listes des factures</u></center>
            </h2>
        </div>
        <div class="form-group">
            <span><button id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer"><img width="15" src="images/icons8_print_32.png" alt=""> Exporter en pdf</button></span>
        
            <span><label><img src="images/search.png" alt=""> Recherche</label></span>
            <span><input  id="myInput" type="search" class="form control" placeholder="Recherche.."></span>
        </div>
        <br>
                <span class='print-container'>
                    <table style=""  class="table table-bordered" border="black" width="100%" id="example">
                        <thead border="3px">
                            <tr border=3px>
                                <td>Id</td>
                                <td>Date de facture</td>
                                <td>C.I.N du viticulteur</td>
                                <td>Nom et Prenom du viticulteur</td>
                                <td>Secteur</td>
                                <td>Raisin culture</td>
                                <td>Pods brute1</td>
                                <td>Pods brute2</td>
                                <td>Pods brute3</td>
                                <td>Poids net</td>
                                <td>Nombre de fut</td>
                                <td>Nombre de garaba</td>
                                <td>Type1</td>
                                <td>Type2</td>
                                <td>Type3</td>
                                <td>Prix TOTAL</td>
                                <!-- <td>P.U1</td>
                                <td>P.U2</td>
                                <td>P.U3</td> -->
                                <td>Transporteur</td> 
                                <td>Nom et Prenom du peseur</td>
                                <td>Nom et Prenom du controleur</td>
                                <td>  </td>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                            <?php
                            while ($r = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $r['id']; ?></th>
                                    <td><?php echo $r['Date_fact']; ?></td>
                                    <td><?php echo $r['CIN_vit']; ?></td>
                                    <td ><?php echo $r['Nom_et_Prenom_vit']; ?></td>
                                    <td><?php echo $r['Nom_sect']; ?></td>
                                    <td><?php echo $r['Raisin_cult']; ?></td>
                                    <td><?php echo $r['Poids_brut']; ?></td>
                                    <td><?php echo $r['Poids_brut1']; ?></td>
                                    <td><?php echo $r['Poids_brut2']; ?></td>
                                    <td ><?php echo $r['Poids_net']; ?></td>
                                    <td><?php echo $r['Nombre_fut']; ?></td>
                                    <td><?php echo $r['Nombre_garaba']; ?></td>
                                    <td><?php echo $r['Type']; ?></td>
                                    <td><?php echo $r['Type1']; ?></td>
                                    <td><?php echo $r['Type2']; ?></td>
                                    <td><?php echo $r['PT']; ?> Ar</td>
                                    <!-- <td><?php //echo $r['PU']; ?></td>
                                    <td><?php //echo $r['PU']; ?></td>
                                    <td><?php //echo $r['PU']; ?></td> -->
                                    <td><?php echo $r['Transporteur']; ?></td>
                                    <!-- <td><?php //echo $r['Num_imatr']; ?></td> -->
                                    <!-- <td ><?php //echo $r['CIN_pes']; ?></td> -->
                                    <td><?php echo $r['Nom_et_Prenom_pes']; ?></td>
                                    <!-- <td ><?php //echo $r['CIN_contr']; ?></td> -->
                                    <td><?php echo $r['Nom_et_Prenom_contr']; ?></td>
                                    <td width='50'>
                                        <a href="modifier_fact.php?id=<?php echo $r['id']; ?>" class="m-2" title="Modiifier">
                                            <img src="images/b_edit.png" alt=""></a>
                                        <a href="deleteFacture.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Voulez vous vraiment suprimer');" title='Suprimer'>
                                            <img src="images/IconSupprimer.png" alt=""></a> 

                                    </td>
                                        
                                        <i class="fa fa-trash fa-2x red-icon" data-bs-toggle="modal" dat-bs-target="#exampleModal <?php echo $r['id']; ?> "></i>
                                        <div class="model fade" id="exampleModal<?php echo $r['id']; ?>" role="dialog">
                                            <div class='modal-dialog'>
                                                <div class="modal-content">

                                                    <div class="modal-footer">
                                                    
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </span>
    </div>
</div> <br>
<button><a href="liste_facture.php">retour en haut</a></button>          
        <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
            function imprimer_page(){
                window.print(document.getElementById='impri');
            }
        </script>


</body>
</html>