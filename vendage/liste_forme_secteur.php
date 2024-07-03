<?php
require_once('connect_misql.php');
$ReadSql = "SELECT * FROM `societe` ";

$res = mysqli_query($con, $ReadSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de matiere</title>
    <!-- <link rel="stylesheet" href="hover_input.css"> -->
    <link rel="stylesheet" href="style_align_display.css">
    <!-- <link rel="stylesheet" href="forme_input.css"> -->
    <link rel="stylesheet" href="Styl_back_ground.css.css">
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
    <div class="container">
        <div class="row pt-4">
            <h2>
                <center><u>Listes des secteur</u></center>
            </h2>
            
        </div>
        <div class="form-group">
            <span><label><img src="images/search.png" alt=""> Recherche</label></span>
            <span><input  id="myInput" type="text" placeholder="Recherche.."></span>
        </div>
<br><br>
        <table class="table table-striped mt-3" id="example" border="black">
            <thead border="3px">
                <tr border=3px>
                    <th>Id</th>
                    <th>Nom du secteur</th>
                    <th>Adresse de secteur</th>
                     
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                while ($r = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $r['id']; ?></th>
                        <td><?php echo $r['Nom_soc']; ?></td>
                        <td><?php echo $r['Adresse_soc']; ?></td>

                        <td>
                            <a href="modifier_secteur.php?id=<?php echo $r['id']; ?>" class="m-2">
                                <i class="fa fa-edit fa-2x"><button> modifier</button></i>
                            </a>
                            <a href="deleteSecteur.php?id=<?php echo $r['id']; ?>">
                                <button onclick="return confirm('Voulez vous vraiment suprimer');"> Suprimer</button>
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