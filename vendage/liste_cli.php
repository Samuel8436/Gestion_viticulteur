<?php
require_once('connect_misql.php');
$ReadSql = "SELECT * FROM `cliants` ";

$res = mysqli_query($con, $ReadSql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de matiere</title>
    <link rel="stylesheet" href="hover_input.css">
    <!-- <link rel="stylesheet" href="dimension_input.css"> -->
    <script src="datatable/jquery-3.6.0.min.js"></script>
    <script src="datatable/bootstrap.min.js"></script>
    <style>
      input {
        border: black;
        /* transition: width 2s; */
        }

        /* input:hover {
        width: 500px;
        } */
        div label{
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
    </style>
</head>
<?php include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<body><br>
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

    <span><button id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer"><img width="15" src="images/icons8_print_32.png" alt=""> Exporter en pdf</button></span>
    <div class="form-group" align='center'>
        <label><img src="images/search.png" alt=""> Recherche</label>
        <input  id="myInput" type="text" placeholder="Recherche..">
        
    </div>
    <div class="container">
        <div class="row pt-4">
            <h2>
                <center><u>Listes des viticulteur</u></center>
            </h2>
        
        </div>
<br><br>

<div class='print-container'>
        <table class="table table-striped mt-3" border="black" width="100%" id="example">
            <thead border="3px">
                <tr border=3px>
                    <th>Id</th>
                    <th>Nom et Prenom</th>
                    <th>C.I.N</th>
                    <th>Adresse</th>
                    <th>Numero téléphone</th>
                    <th>Secteur</th>
                    <!-- <th>Raisin culture</th> -->
                     
                </tr>
            </thead>

            <tbody id="myTable">
                <?php
                while ($r = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $r['id']; ?></th>
                        <td ><?php echo $r['Nom_cli'] . " " . $r['Prenom_cli']; ?></td>
                        <td><?php echo $r['CIN']; ?></td>
                        <td><?php echo $r['Adresse']; ?></td>
                        <td><?php echo $r['Tel_cli']; ?></td>
                        <td><?php echo $r['Nom_sect']; ?></td>
                        <!-- <td><?php //echo $r['Lieu']; ?></td> -->
                        <td width="39%">
                            <a href="modifier_cli.php?id=<?php echo $r['id']; ?>" class="m-2">
                                <i class="fa fa-edit fa-2x"><button title='Modifier' class="btn btn-secondary"> modifier</button></i>
                            </a>
                            <a href="delete_vit.php?id=<?php echo $r['id']; ?>">
                                <button onclick="return confirm('Voulez-vous vraiment suprimer');" title='Suprimer' class="btn btn-secondary"> Suprimer</button>
                                <!--<button class="btn btn-danger" type="button">confirmer</button>!-->
                            </a>

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