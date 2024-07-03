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
    <style>
        div label{
            display: inline;
        }
        input {
            border: black;
            transition: width 2s;
            }

        input:hover {
            border: black 3px;
            width: 500px;
        }
    </style>
</head>
<body>


    <div class="container">
        <div class="row pt-4">
            <h2>
                <center><u>Listes des société</u></center>
            </h2>
            
        </div>
        <div class="form-group">
            <label><img src="images/search.png" alt=""> Recherche</label>
            <input  id="myInput" type="text" placeholder="Recherche..">
        </div>
<br><br>
        <table class="table table-striped mt-3" border="black">
            <thead border="3px">
                <tr border=3px>
                    <th>Id</th>
                    <th>Nom du société</th>
                    <th>Adresse</th>
                    <th>Numero téléphone</th> 
                </tr>
            </thead>

            <tbody>
                <?php
                while ($r = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $r['id']; ?></th>
                        <td><?php echo $r['Nom_soc']; ?></td>
                        <td><?php echo $r['Adresse_soc']; ?></td>
                        <td><?php echo $r['Tel_soc']; ?></td>

                        <td>
                            <a href="update_matiere.php?id=<?php echo $r['id']; ?>" class="m-2">
                                <i class="fa fa-edit fa-2x"><button> modifier</button></i>
                            </a>
                            <a href="deleteMatiere.php?id=<?php echo $r['id']; ?>">
                                <button> Suprimer</button>
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
</body>
</html>