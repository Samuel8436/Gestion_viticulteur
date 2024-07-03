<?php 
include('securite_page.php');//Securisation avec login
include ('theme.php'); ?> 
<?php include('header.php'); 
// include('admin/connect.php'); ?>
<style>
    input {
    
    border: black;
    transition: width 2s;
    }

     /* input:hover {
    width: 500px;
    } */
   input.capitalize {
  text-transform: capitalize;
} 
/* button {
    display: inline-block;
    padding: 15px 25px;
    font-size: 24px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
} */
</style>
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
                        <h3>Ajout viticulteur</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
                        <form method="POST" action="action_cli.php">
                            <input type="hidden" name="send">
                            <div>
                                <label for="">Nom</label>
                                <input type="text" name="Nom_cli" placeholder='Nom' onkeyup="controlnom(this)" id='nom' autocomplete='off'>
                            </div>
                            <div>
                                <label for="">Prenom</label>
                                <input type="text" class="capitalize" name="Prenom_cli" placeholder='Prenom' autocomplete='off'>
                            </div>
                            
                            <div>
                                <label for="">C.I.N</label>
                                <input type="number" name="CIN" placeholder='C.I.N' autocomplete='off'>
                            </div>
                            <div>
                                <label for="">Adresse</label>
                                <input type="text" class="capitalize" name="Adresse" placeholder='Adresse' autocomplete='off'>
                            </div>
                            <div>
                                <label for="">Tel</label>
                                <input type="number" name="Tel_cli" id="" placeholder='Numero du telephone' autocomplete='off'>
                            </div>
                            <div>
                                <label for="Nom_soc">Secteur </label>
                                    
                                    <?php
                                        $mysqli = new mysqli('localhost', 'root', '', 'gestio_viticulture');
                                        $resultset = $mysqli->query("SELECT * FROM societe");
                                    ?>
                                    
                                    <select name="Nom_sect" class='form-control'>
                                    <option value="">Nom du secteur</option>
                                        <?php
                                         while ($rows = $resultset->fetch_assoc()) {
                                            $id = $rows['id'];
                                            $secteur = $rows['Nom_soc'];
                                            $e = ("<option value='$secteur'>$secteur</option>");
                                            echo $e; 
                                         } ?>
                                    </select>
                            </div>
                            <!--<div>
                            <label for="">Raisin culture</label>
                            <input type="text" name="Lieu" id="" placeholder='Raisin culture'>
                            </div> -->
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
    //include('footer_bottom.php');
    ?>
</body>
<script>
    function controlnom(str) 
    {
        var test = str.value;
        var nb = test.length;

        if (nb >= 1) {
            var maj = test.toUpperCase();
            str.value = maj;
        } else {
            // alert("Veuillez entrer votre nom");
            document.getElementById("nom").focus();
        }
    }
</script>


</html>