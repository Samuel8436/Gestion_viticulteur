<?php
    require_once('connect_misql.php');
    $requete= "SELECT * FROM cliants ORDER BY Nom_cli ASC";
    $res = mysqli_query($con, $requete);
    
?>
<?php //Recherche
    require_once("connectPDO.php");
  
    $nomf=isset($_GET['CIN'])?$_GET['CIN']:"";
    $niveau=isset($_GET['CIN'])?$_GET['CIN']:"all";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
     
    if($niveau=="all"){
        $requete="SELECT * from cliants where CIN like '%$nomf%' limit $size offset $offset";
        // $requeteCount="SELECT count(*) countF from cliants where CIN like '%$nomf%'";
    }
    else{
         $requete="SELECT * from cliants where CIN like '%$nomf%' limit $size offset $offset";
        
        // $requeteCount="SELECT count(*) countF from cliants where CIN like '%$nomf%'"; 
    }

    $resultatF=$db->query($requete);
    // $resultatCount=$db->query($requeteCount);
    // $tabCount=$resultatCount->fetch();
    // $nbrFiliere=$tabCount['countF'];
    // $reste=$nbrFiliere % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    // if($reste===0)
    // { //$nbrFiliere est un multiple de $size
        //  $nbrPage=$nbrFiliere/$size;
         ?>
         <!-- <script>
                 alert("C.I.N n'existe pas");
                 location.href = "solde.php";
             </script>
             <script src="Alert/src/sweetalert2.js"></script>
             <script src="Alert/src/SweetAlert.js"></script>    -->
        <?php
    // }   
    // else
    // {
    //     $nbrPage=floor($nbrFiliere/$size)+1;  // floor : la partie entière d'un nombre décimal
    // }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="admin/images/logo.jpg" type="image"/>
    <link rel="stylesheet" href="forme_input.css">
    <link rel="stylesheet" href="style_align_display.css">
    <header>
        <link rel="stylesheet" href="datatable/bootstrap.min.css">
    </header>
    <script src="datatable/jquery-3.6.0.min.js"></script>
    <script src="datatable/bootstrap.min.js"></script>
    <style>
    div label{
            display: inline;
        }
</style>
</head>
<body>
    <br>
    <?php include ('theme.php'); ?>
    <p><center><?php include ('nav_imprimer.php');?></center></p>
    <form method="get" action="solde.php" class="form-inline">
                        
        <div class="form-group">
            <span><label><img src="images/search.png" alt=""> Recherche</label></span>
            <span><input id="myInput" type="search" placeholder="Recherche...."></span>
        </div>
        <br>
                                            
                            
    </form>
    
    <div>
    <table class="table table-hover" id="example" border="black" width="100%">
    
            <thead border="3px">
                <tr border=3px>
                    
                    <th>Nom et Prenom</th>
                    <th>C.I.N</th>
                    <th>Solde</th>
                    <!-- <th>Payement</th> -->
                </tr>
            </thead>
            <tbody id="myTable">
                <?php while($filiere=$resultatF->fetch())
                { 
                    while ($r = mysqli_fetch_assoc($res)) 
                    {
                        // while ($p = mysqli_fetch_assoc($result))
                        // {?>
                        <tr>
                            <td ><?php echo $r['Nom_cli'].''. $r['Prenom_cli']; ?></td>
                            <td><?php echo $r['CIN']; ?></td>
                            <td><?php
                            //$poids = $r['sum_poi'];
                            // $prix = $r['prix_total'];
                            
                            
                             echo $r['Solde']; ?></td>
                             <!-- <td><?php 
                                // $PRIX = $p['SOM'];
                                // echo $PRIX ?></td> -->
                        </tr>
                        <?PHP 
                } 
                    } 
                        //}?>
            </tbody>
    </table>
    </div>
    <br>
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