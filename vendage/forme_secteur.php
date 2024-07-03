<?php 
include('securite_page.php');//Securisation avec login
include ('theme.php'); ?> 
<?php include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<link rel="stylesheet" href="hover_input.css">
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


                        <h3>Ajout de secteur</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
    <form method="POST" action="Action_secteur.php">
        <input type="hidden" name="send">
        <div>
            <label for="">Nom du secteur</label>
            <input type="text" name='Nom_soc' placeholder='Secteur'>
        </div>
        <div>
            <label for="">Adresse</label>
            <input type="text" name="Adresse_soc" placeholder='Adresse' id="">
        </div>
        <!-- <div>
            <label for="">Tel de société</label>
            <input type="number" name="Tel_soc" placeholder='Numero de téléphone' id="">
        </div> -->
        <div>
            <!-- <input type="submit" value="Ajouter"> -->
            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment Ajouter');">Ajouter</button>
        </div>
    </form>
</body>
</html>