<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['Nom_transp']))
        {
?>
            <script>
                alert("Nom detransporteur est obligatoire");
                location.href = "form_transp.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
            //header('Location: form_cli.php');  
        }
        else{
            $nom = htmlspecialchars($_POST['Nom_transp']);
            $Adresse = htmlspecialchars($_POST['Frai']);
            $Num = htmlspecialchars($_POST['Num_imatr']);
           
            //requete MYSQL
            $req = $db->prepare('INSERT INTO transporteur(Nom_transp, Num_imatr, Frai) VALUES
            (:Nom_transp, :Num_imatr, :Frai)');
            $req->execute(array(
                'Nom_transp' => $nom,
                'Num_imatr' => $Num,
                'Frai' => $Adresse
                
                
            ));
            $req->closeCursor(); 
           //header('Location: forme_secteur.php');
?>
            <script>
                alert("Transporteur bien ajouter");
                location.href = "form_transp.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
            
<?php
        }
    }
?>