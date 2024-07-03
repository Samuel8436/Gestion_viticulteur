<?php
require_once('connect_misql.php');
$ReadSql = "SELECT * FROM `peseur` ";

$res = mysqli_query($con, $ReadSql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de peseur</title>
    <script src="datatable/jquery-3.6.0.min.js"></script>
    <script src="datatable/bootstrap.min.js"></script>
    <style>
        div label{
            display: inline;
        }
    </style>
</head>
<?php include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<body>
<br><?php include ('theme.php'); ?> 
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


                        
                        <p>
                            <?php //include ('product_menu_list.php');?>
                        </p>


            <div class="container">
                <div class="row pt-4">
                <div class="container">
                <div class="row pt-4">
                <div class="form-group" align='center'>
                <label><img src="images/search.png" alt=""> Recherche</label>
                <input  id="myInput" type="text" placeholder="Recherche..">    
            </div>
            <h2>
                <center><u>Liste des peseurs</u></center>
            </h2>
            
        </div>
<br><br>
        <table class="table table-striped mt-3" border="black" width="100%">
            <thead border="3px">
                <tr border=3px>
                    <th>Id</th>
                    <th>Nom et Prenom</th>
                    <th>C.I.N</th>
                    <th>Adresse</th>
                    <th>Numero téléphone</th> 
                </tr>
            </thead>

            <tbody id="myTable">
                <?php
                while ($r = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $r['id_pes']; ?></th>
                        <td ><?php echo $r['Nom_pes'] . " " . $r['Prenom_pes']; ?></td>
                        <td><?php echo $r['CIN_pes']; ?></td>
                        <td><?php echo $r['Adresse_pes']; ?></td>
                        <td><?php echo $r['Num_phon_pes']; ?></td>

                        <td width="39%">
                            <a href="modifier_peseur.php?id_pes=<?php echo $r['id_pes']; ?>" class="m-2">
                                <i class="fa fa-edit fa-2x"><button> modifier</button></i>
                            </a>
                            <a href="deletePeseur.php?id_pes=<?php echo $r['id_pes']; ?>">
                                <button onclick="return confirm('Voulez vous vraiment Ajouter');"> Suprimer</button>
                                
                            </a>

                            <i class="fa fa-trash fa-2x red-icon" data-bs-toggle="modal" dat-bs-target="#exampleModal <?php echo $r['id_pes']; ?> "></i>
                            <div class="model fade" id_pes="exampleModal<?php echo $r['id_pes']; ?>" role="dialog">
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