<?php
    $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
    require_once('connect_misql.php');
    require_once("connectPDO.php");
    if (isset($_POST['send'])) 
    {
        //echo 'Tafiditra';
        if(empty($_POST['CIN_vit']))
        {
?>
            <script>
                alert("viticulteur est obligatoire. Afficher l'identiter de viticulteur s'il vous play");
                location.href = "facture.php";
            </script>
            <script src="Alert/src/sweetalert2.js"></script>
            <script src="Alert/src/SweetAlert.js"></script>
<?php
           
        }
        else{
            $Date_fact = htmlspecialchars($_POST['Date_fact']);
            $CIN_vit = htmlspecialchars($_POST['CIN_vit']);
            $Nom_et_Prenom_vit = htmlspecialchars($_POST['Nom_et_Prenom_vit']);
            $Adresse = htmlspecialchars($_POST['Adresse']);
            $Nom_sect = htmlspecialchars($_POST['Nom_sect']);
            $Num_phon = htmlspecialchars($_POST['Num_phon']);
            $Raisin_cult = htmlspecialchars($_POST['Raisin_cult']);
            $Poids_brut = htmlspecialchars($_POST['Poids_brut']);
            $Poids_brut1 = htmlspecialchars($_POST['Poids_brut1']);
            $Poids_brut2 = htmlspecialchars($_POST['Poids_brut2']);
            $Nombre_fut = htmlspecialchars($_POST['Nombre_fut']);
            $Nombre_fut1 = htmlspecialchars($_POST['Nombre_fut1']);
            $Nombre_fut2 = htmlspecialchars($_POST['Nombre_fut2']);
            $Nombre_garaba = htmlspecialchars($_POST['Nombre_garaba']);
            $Nombre_garaba1 = htmlspecialchars($_POST['Nombre_garaba1']);
            $Nombre_garaba2 = htmlspecialchars($_POST['Nombre_garaba2']);
            $Poids_net = htmlspecialchars($_POST['Poids_brut']-($_POST['Nombre_fut']*5)-($_POST['Nombre_garaba']));
            $Poids_net1 = htmlspecialchars($_POST['Poids_brut1']-($_POST['Nombre_fut1']*5)-($_POST['Nombre_garaba1']));
            $Poids_net2 = htmlspecialchars($_POST['Poids_brut2']-($_POST['Nombre_fut2']*5)-($_POST['Nombre_garaba2']));            
            $Type = htmlspecialchars($_POST['Type']);
            $Type1 = htmlspecialchars($_POST['Type1']);
            $Type2 = htmlspecialchars($_POST['Type2']);
            $Transporteur = htmlspecialchars($_POST['Transporteur']);
           // $Num_imatr = htmlspecialchars($_POST['Num_imatr']);
            //$CIN_pes = htmlspecialchars($_POST['CIN_pes']);
            $Nom_et_Prenom_pes = htmlspecialchars($_POST['Nom_et_Prenom_pes']);
            //$CIN_contr = htmlspecialchars($_POST['CIN_contr']);
            $Nom_et_Prenom_contr = htmlspecialchars($_POST['Nom_et_Prenom_contr']);
            //requete MYSQL
           
            // $ccv="SELECT CIN_vit,Nom_et_Prenom_vit,SUM(PT) FROM factur WHERE CIN_vit=$CIN_vit";
            $PT = $mysqli->query("SELECT raisin.Ref_type,raisin.PU AS PU,factur.Type FROM raisin,factur WHERE factur.Type=raisin.Ref_type OR factur.Type1=raisin.Ref_type OR factur.Type2=raisin.Ref_type group by factur.Type");
            $rows = $PT->fetch_assoc();
            $req = $db->prepare('INSERT INTO factur(Date_fact, CIN_vit, Nom_et_Prenom_vit, Adresse, Nom_sect, Num_phon, Raisin_cult, Poids_brut, Poids_brut1, Poids_brut2, Nombre_fut,Nombre_fut1,Nombre_fut2, Nombre_garaba,Nombre_garaba1,Nombre_garaba2,Poids_net,Poids_net1,Poids_net2, Type, Type1, Type2, Transporteur, Nom_et_Prenom_pes, Nom_et_Prenom_contr, PT) VALUES
                                (:Date_fact, :CIN_vit, :Nom_et_Prenom_vit, :Adresse, :Nom_sect, :Num_phon, :Raisin_cult, :Poids_brut, :Poids_brut1, :Poids_brut2, :Nombre_fut, :Nombre_fut1, :Nombre_fut2, :Nombre_garaba, :Nombre_garaba1, :Nombre_garaba2, :Poids_net, :Poids_net1, :Poids_net2, :Type, :Type1, :Type2, :Transporteur, :Nom_et_Prenom_pes, :Nom_et_Prenom_contr, :PT)');
            $req->execute(array(
                'Date_fact' => $Date_fact,
                'CIN_vit' => $CIN_vit,
                'Nom_et_Prenom_vit' => $Nom_et_Prenom_vit,
                'Adresse' => $Adresse,
                'Nom_sect' => $Nom_sect,
                'Num_phon' => $Num_phon,
                // 'Nom_sect' => $Nom_sect,
                // 'Num_phon' => $Num_phon,
                'Raisin_cult' => $Raisin_cult,
                'Poids_brut' => $Poids_brut,
                'Poids_brut1' => $Poids_brut1,
                'Poids_brut2' => $Poids_brut2,
                'Type' => $Type,
                'Type1' => $Type1,
                'Type2' => $Type2,
                'Poids_net' => $Poids_net,
                'Poids_net1' => $Poids_net1,
                'Poids_net2' => $Poids_net2,
                'Nombre_fut' => $Nombre_fut,
                'Nombre_fut1' => $Nombre_fut1,
                'Nombre_fut2' => $Nombre_fut2,
                'Nombre_garaba' => $Nombre_garaba,
                'Nombre_garaba1' => $Nombre_garaba1,
                'Nombre_garaba2' => $Nombre_garaba2,
                'Transporteur' => $Transporteur,
                'Nom_et_Prenom_pes' => $Nom_et_Prenom_pes,
                'Nom_et_Prenom_contr' => $Nom_et_Prenom_contr,
                'PT' => $Poids_net*$rows['PU'] + $Poids_net1*$rows['PU'] + $Poids_net2*$rows['PU']
            ));
            $req->closeCursor();
            
            // UPDATE `cliants` SET Solde=Solde+200 WHERE CIN='223443675'; 
            $pt=$Poids_net*$rows['PU'] + $Poids_net1*$rows['PU'] + $Poids_net2*$rows['PU'];   
            $sold=  $db->prepare("UPDATE `cliants` SET Solde=Solde + '$pt' WHERE CIN='$CIN_vit'");
            $sold->execute(array());
            $sold->closeCursor();
            header("Location: facture.php");
           

        }
    }
?>


