<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['Nom_pes']) or empty($_POST['CIN_pes']))
        {
?>
            <script>
                alert("Nom et C.I.N obligatoire");
                location.href = "forme_secteur.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
            //header('Location: form_cli.php');  
        }
        else{
            $nom = htmlspecialchars($_POST['Nom_pes']);
            $Prenom = htmlspecialchars($_POST['Prenom_pes']);
            $CIN = htmlspecialchars($_POST['CIN_pes']);
            $Adresse = htmlspecialchars($_POST['Adresse_pes']);
            $Tel = htmlspecialchars($_POST['Tel_pes']);
            //requete MYSQL
            $req = $db->prepare('INSERT INTO peseur(Nom_pes, Prenom_pes, CIN_pes, Adresse_pes, Num_phon_pes) VALUES
            (:Nom_pes, :Prenom_pes, :CIN_pes, :Adresse_pes, :Tel_pes)');
            $req->execute(array(
                'Nom_pes' => $nom,
                'Prenom_pes' => $Prenom,
                'CIN_pes' => $CIN,
                'Adresse_pes' => $Adresse,
                'Tel_pes' => $Tel
                
            ));
            $req->closeCursor(); 
           
?>
           <script>
                alert("Peseur bien ajouter");
                location.href = "form_pes.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script> 
<?php
        }
    }
?>