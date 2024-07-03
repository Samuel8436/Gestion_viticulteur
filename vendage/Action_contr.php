<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['Nom_contr']) or empty($_POST['CIN_contr']))
        {
?>
            <script>
                alert("Nom et C.I.N obligatoire");
                location.href = "form_contr.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
          // echo ("Nom et C.I.N obligatoire");
            // header('Location: form_cli.php');  
        }
        else{
            $nom = htmlspecialchars($_POST['Nom_contr']);
            $Prenom = htmlspecialchars($_POST['Prenom_contr']);
            $CIN = htmlspecialchars($_POST['CIN_contr']);
            $Adresse = htmlspecialchars($_POST['Adresse_contr']);
            $Tel = htmlspecialchars($_POST['Num_phon_contr']);
            //requete MYSQL
            $req = $db->prepare('INSERT INTO controleur(Nom_contr, Prenom_contr, CIN_contr, Adresse_contr, Num_phon_contr) VALUES
            (:Nom_contr, :Prenom_contr, :CIN_contr, :Adresse_contr, :Num_phon_contr)');
            $req->execute(array(
                'Nom_contr' => $nom,
                'Prenom_contr' => $Prenom,
                'CIN_contr' => $CIN,
                'Adresse_contr' => $Adresse,
                'Num_phon_contr' => $Tel
                
            ));
            $req->closeCursor(); 
            // header('Location: form_cli.php');
?>
            <script>
                alert("Les controleur est bien ajouter");
                location.href = "form_contr.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
        }
    }
?>


