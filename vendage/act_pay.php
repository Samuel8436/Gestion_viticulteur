
<?php
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['montant']) or empty($_POST['CIN']))
        {
?>
            <script>
                alert("C.IN et montant sont obligatoire donc vous ne pouvez pas faire cette payement");
                location.href = "form_pay.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
           
        }
        else{
            $Nom_et_Prenom_vit = htmlspecialchars($_POST['Nom_et_Prenom_vit']);
            $CIN = htmlspecialchars($_POST['CIN']);
            $Total_solde = htmlspecialchars($_POST['Total_solde']);
            $montant = htmlspecialchars($_POST['montant']);
            $date_pay = htmlspecialchars($_POST['date_pay']);
            $Solde = htmlspecialchars($_POST['Total_solde']-$_POST['montant']);
            if ($Solde<$montant) {
                # code...
                ?>
                    <script>
                alert("Impossible de fait cette payement");
                location.href = "form_pay.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
                <?php
            }else {
                 //requete MYSQL date_pay
            $req = $db->prepare('INSERT INTO payement(montant,Nom_et_Prenom_vit,CIN,Total_solde,Solde,date_pay) VALUES (:montant, :Nom_et_Prenom_vit, :CIN, :Total_solde, :Solde, :date_pay)');
            $req->execute(array('montant' => $montant,'Nom_et_Prenom_vit' => $Nom_et_Prenom_vit,'CIN' => $CIN,'Total_solde' =>$Total_solde,'Solde' => $Solde,'date_pay' =>$date_pay));
            $req->closeCursor();
            // UPDATE `cliants` SET Solde=Solde+200 WHERE CIN='223443675'; 
            // $pt=$Poids_net*$rows['PU'] + $Poids_net1*$rows['PU'] + $Poids_net2*$rows['PU'];   
            $sold=  $db->prepare("UPDATE `cliants` SET Solde=Solde - '$montant' WHERE CIN='$CIN'");
            $sold->execute(array());
            $sold->closeCursor(); 
            header('Location: impri_recu.php');
            }
           
        }
    }
?>


