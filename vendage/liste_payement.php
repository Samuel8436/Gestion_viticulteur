<?php
require_once('connect_misql.php');
$ReadSql = "SELECT * FROM payement";

$res = mysqli_query($con, $ReadSql);
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="admin/images/logo.jpg" type="image" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des payement</title>
    <link rel="stylesheet" href="Styl_back_ground.css">
    <link rel="stylesheet" href="style_body.css">
    <link rel="stylesheet" href="style_align_display.css">
    <link rel="stylesheet" href="forme_input.css">
    <script src="datatable/jquery-3.6.0.min.js"></script>
    <script src="datatable/bootstrap.min.js"></script>
</head>
<?php //include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<body>
    <br><?php include ('theme.php'); ?> 
    <?php
    //include('navtop.php');
    ?>
    <div class='backgruond' id="background">
        <div id="page">
            <?php //include ('nav_sidebar.php');?>
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                       

                    </div>
                    <div id="body">

                    <br><br>
                    <center><h2><?php include ('nav_imprimer.php');?></h2></center>
                        <p>
                            <?php //include ('product_menu_list.php');?>
                        </p>


        <div class="container">
            <div class="row pt-4">
                <h2>
                    <center><u>Listes des payements</u></center>
                </h2>
                
            </div>
            <div class="form-group">
                <span><label><img src="images/search.png" alt=""> Recherche</label></span>
                <span><input  id="myInput" type="text" placeholder="Recherche...."></span>
            </div>
            <br>
            <table class="table table-striped mt-3" border="black" width="100%" id="example">
                <thead border="3px">
                    <tr border=3px>
                        <th>Id</th>
                        <th>Date de payement</th>
                        <th>Nom et Prenom</th>
                        <th>C.I.N</th>
                        <th>Total de solde</th>
                        <th>Montant</th>
                        <th>Solde restant</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="myTable">
                    <?php
                    while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['date_pay']; ?></td>
                            <td><?php echo $r['Nom_et_Prenom_vit']; ?></td>
                            <td><?php echo $r['CIN']; ?></td>
                            <td><?php echo $r['Total_solde']; ?></td>
                            <td ><?php echo $r['montant']; ?></td>
                            <td ><?php echo $r['Solde']; ?></td>
                            <td width='50'>
                                <a title='modifier' href="modifier_pay.php?id=<?php echo $r['id']; ?>" class="m-2">
                                    <img src="images/b_edit.png" alt=""></a>
                                <a  title='Suprimer' href="deletePay.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Voulez vous vraiment suprimer');">
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

        </div>
    </div>
    <!-- <a href="http://localhost/vendage/index.php"><img src="images/acceuil.ico" alt="">Acceuil</a> -->
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
</body>
</html>