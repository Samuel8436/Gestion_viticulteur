<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['Couleur']))
        {
?>
            <script>
                alert("Le coulelur du raisin obligatoire");
                location.href = "form_raisin.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
            //header('Location: form_cli.php');  
        }
        else{
            $nom = htmlspecialchars($_POST['Ref_type']);
            $Adresse = htmlspecialchars($_POST['Couleur']);
            $PU = htmlspecialchars($_POST['PU']);
           
            //requete MYSQL
            $req = $db->prepare('INSERT INTO raisin(Ref_type, Couleur, PU) VALUES
            (:Ref_type, :Couleur, :PU)');
            $req->execute(array(
                'Ref_type' => $nom,
                'Couleur' => $Adresse,
                'PU' => $PU
                
            ));
            $req->closeCursor(); 
           header('Location: form_raisin.php');
?>
            
<?php
        }
    }
?>