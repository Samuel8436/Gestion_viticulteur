<?php
require_once('connect_misql.php');
$ReadSql = "SELECT * FROM `raisin` ";

$res = mysqli_query($con, $ReadSql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de raisins</title>
    <link rel="stylesheet" href="hover_input.css">
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

                    <div class="form-group" align='center'>
                        <label><img src="images/search.png" alt=""> Recherche</label>
                        <input  id="myInput" type="text" placeholder="Recherche..">
                        
                    </div>
    <div class="container">
        <div class="row pt-4">
            <h2>
                <center><u>Listes des Raisins</u></center>
            </h2>
            
        </div>
<br><br>
        <table class="table table-striped mt-3" border="black">
            <thead border="3px">
                <tr border=3px>
                    <th>Id</th>
                    <th>Refference</th>
                    <th>Couleur du type</th>
                     <th>P.U</th>
                </tr>
            </thead>
            <tbody id='myTable'>
                <?php
                while ($r = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $r['id_raisin']; ?></th>
                        <td><?php echo $r['Ref_type']; ?></td>
                        <td><?php echo $r['Couleur']; ?></td>
                        <td><?php echo $r['PU']; ?></td>
                        <td>
                            <a href="modifier_raisin.php?id_raisin=<?php echo $r['id_raisin']; ?>" class="m-2">
                                <i class="fa fa-edit fa-2x"><button> modifier</button></i>
                            </a>
                            <a href="deleteRaisins.php?id_raisin=<?php echo $r['id_raisin']; ?>">
                                <button  onclick="return confirm('Voulez-vous vraiment suprimer');"> Suprimer</button>
                                <!--<button class="btn btn-danger" type="button">confirmer</button>!-->
                            </a>

                            <i class="fa fa-trash fa-2x red-icon" data-bs-toggle="modal" dat-bs-target="#exampleModal <?php echo $r['id_raisin']; ?> "></i>
                            <div class="model fade" id="exampleModal<?php echo $r['id_raisin']; ?>" role="dialog">
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