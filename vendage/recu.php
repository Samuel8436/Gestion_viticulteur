
<?php include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <div id="page">
            <?php include ('nav_sidebar.php');?>
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                       

                    </div>
                    <div id="body">


                        <h3>Recu de payement</h3>
                        <p>
                            <?php include ('product_menu_fact.php');?>
                        </p>
                        <form action="">
                            <div>
                                <input type="date" name="Date_pay" id="">
                            </div>
                            <div>
                                <label for="CIN">C.I.N du viticulteur </label>
                                    
                                    <?php
                                    $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                    $resultset = $mysqli->query("SELECT * FROM cliants");
                                    ?>
                                    
                                    <select name="CIN_vit" onchange="nomdeviticulteur(this.value)" class='form-control'>
                                    <option value="">chossser la C.I.N du viticulteur</option>
                                        <?php
                                        while ($rows = $resultset->fetch_assoc()) {
                                            $id = $rows['id'];
                                            $Nom_cli=$rows["Nom_cli"];
                                            $Prenom_cli = $rows["Prenom_cli"];
                                            $secteur = $rows['Nom_sect'];
                                            $CIN = $rows['CIN'];
                                            //$prenom_etu = $rows['prenom_etu'];
                                            $e = ("<option value='$Nom_cli $Prenom_cli'>$CIN</option>");
                                            echo $e; 
                                        } ?>
                                    </select>
                            </div>
                            <div>
                                <label for="">Nom et Prenom du viticulteur</label>
                                <input type="text" name="Nom_et_Prenom_vit" id="nom" placeholder='Nom et Prenom du viticulteur'<?php echo "" ?>>
                            </div>
                            <div>
                                <label for="Nom_transp">CIN du controleur </label>
                                    
                                    <?php
                                    $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                    $resultset = $mysqli->query("SELECT * FROM controleur");
                                    ?>
                                    
                                    <select name="CIN_contr" class='form-control'>
                                    <option value="">Chosisser le C.I.N du Controleur</option>
                                        <?php
                                        while ($rows = $resultset->fetch_assoc()) {
                                            $id = $rows['id'];
                                            $CIN_contr = $rows['CIN_contr'];
                                           

                                            $e = ("<option value='$CIN_contr'>$CIN_contr</option>");
                                            echo $e; 
                                        } ?>
                                    </select>
                            </div>
                            <div>
                                <label for="">Nom du controleur</label>
                                <input type="text" name="" id="" placeholder='Nom du controleur'>
                            </div><div>
                                <label for="">Prenom du controleur</label>
                                <input type="text" name="" id="" placeholder='Nom du controleur'>
                            </div>
                        </form>