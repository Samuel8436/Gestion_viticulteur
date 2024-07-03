<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['Nom_cli']) or empty($_POST['CIN']) or empty($_POST['Nom_sect']))
        {
?>
            <script>
                alert("Renseigner biun l'identiter de viticulteur");
                location.href = "guitar.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
    //    echo "ajout echouer";    
        }
        else{
            
            $nom = htmlspecialchars($_POST['Nom_cli']);
            $Prenom = htmlspecialchars($_POST['Prenom_cli']);
            $CIN = htmlspecialchars($_POST['CIN']);
            $Adresse = htmlspecialchars($_POST['Adresse']);
            $Tel = htmlspecialchars($_POST['Tel_cli']);
            $Sect = htmlspecialchars($_POST['Nom_sect']);
            //$lieu = htmlspecialchars($_POST['Lieu']);
            //requete MYSQL
            $req = $db->prepare('INSERT INTO cliants(Nom_cli, Prenom_cli, CIN, Adresse, Tel_cli, Nom_sect) VALUES
            (:Nom_cli, :Prenom_cli, :CIN, :Adresse, :Tel_cli, :Nom_sect)');
            $req->execute(array(
                'Nom_cli' => $nom,
                'Prenom_cli' => $Prenom,
                'CIN' => $CIN,
                'Adresse' => $Adresse,
                'Tel_cli' => $Tel,
                'Nom_sect' => $Sect
                // 'Lieu' => $lieu
            ));
           
            $req->closeCursor(); 
           
?>
            <script>
                alert("viticulteur bien ajouter");
                location.href = "guitar.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
        }
    }
?>


