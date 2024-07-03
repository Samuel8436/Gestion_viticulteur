<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['Nom_soc']) or empty($_POST['Adresse_soc']))
        {
?>
            <script>
                alert("Nom et Adresse obligatoire");
                location.href = "forme_secteur.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
            //header('Location: form_cli.php');  
        }
        else{
            $nom = htmlspecialchars($_POST['Nom_soc']);
            $Adresse = htmlspecialchars($_POST['Adresse_soc']);
            
           
            //requete MYSQL
            $req = $db->prepare('INSERT INTO societe(Nom_soc, Adresse_soc) VALUES
            (:Nom_soc, :Adresse_soc)');
            $req->execute(array(
                'Nom_soc' => $nom,
                'Adresse_soc' => $Adresse
                
                
            ));
            $req->closeCursor(); 
           header('Location: forme_secteur.php');
?>
            
<?php
        }
    }
?>