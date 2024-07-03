<?php 
include('securite_page.php');//Securisation avec login
include('header.php'); ?>
<?php //include('admin/connect.php'); ?>
<style> 
input {
 
  border: black;
  transition: width 2s;
}

input:hover {
  width: 300px;
}
</style>
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


                        <h3>Ajout du raisin</h3>
                        <p>
                            <?php //include ('product_menu.php');?>
                        </p>
    <form method="POST" action="Action_raisin.php">
        <input type="hidden" name="send">
        <div>
            <label for="">Reference du type</label>
            <input type="text" name='Ref_type' placeholder='Refference du raisin'>
        </div>
        <div>
            <label for="">Couleur du type</label>
            <input type="text" name="Couleur" placeholder='Couleurs du raisins' id="">
        </div>
        <div>
            <label for="">P.U</label>
            <input type="number" name="PU" placeholder='Prix par KG' id="">
        </div>
      
        <div>
            <button class='btn btn-primary m-3' onclick="return confirm('Voulez vous vraiment Ajouter');">Ajouter</button>
        </div>
    </form>
</body>
</html>