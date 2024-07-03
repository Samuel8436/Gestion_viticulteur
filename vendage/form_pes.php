<?php 
include('securite_page.php');//Securisation avec login
include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<link rel="stylesheet" href="hover_input.css">
<link rel="stylesheet" href="controle_champ.css">
<body><br>
<?php include ('theme.php'); ?> 
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


                        <h3>Ajout du peseur</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
                        <form method="POST" action="action_pes.php">
                            <input type="hidden" name="send">
                            <div>
                                <label for="">Nom</label>
                                <input type="text" class="uppercase" name="Nom_pes" placeholder='Nom'>
                            </div>
                            <div>
                                <label for="">Prenom</label>
                                <input type="text" class="capitalize" name="Prenom_pes" placeholder='Prenom'>
                            </div>
                            <div>
                                <label for="">C.I.N</label>
                                <input type="number" name="CIN_pes" id="" placeholder='C.I.N'>
                            </div>
                            <div>
                                <label for="">Adresse</label>
                                <input type="text" name="Adresse_pes" placeholder='Adresse'>
                            </div>
                            <div>
                                <label for="">Tel</label>
                                <input type="number" name="Tel_pes" id="" placeholder='Numero du telephone'>
                            </div>
                            <!-- <input type="submit" value="Ajouter"> -->
                            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment Ajouter');">Ajouter</button>
                        </form>
                    </div>
                    <!-- <div id="footer">
                        <?php //include('footer.php'); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php
    // include('footer_bottom.php');
    ?>
</body>



</html>