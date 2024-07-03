
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>Menu</TITLE>
    <META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
    <STYLE type=text/css>
        LI{
            background : #ccffff;
            border-radius : 5px;
        }
        #monmenu UL UL {
            PADDING-RIGHT: 0px;
            DISPLAY: none;
            PADDING-LEFT: 0px;
            LEFT: 140px;
            PADDING-BOTTOM: 0px;
            MARGIN: 0px;    
            PADDING-TOP: 0px;       
            POSITION: absolute; TOP: -1px;
           /* background: purple;
             */
        }
        #monmenu LI {
            PADDING-RIGHT: 2px;
            PADDING-LEFT: 2px;
            PADDING-BOTTOM: 2px;
            MARGIN: 0px;
            WIDTH: 165px;
            PADDING-TOP: 2px;
            LIST-STYLE-TYPE: none;
            POSITION: relative;
        }
        
        #monmenu LI:hover UL.niveau2 {
            DISPLAY: block
        }
        #monmenu LI LI:hover UL.niveau3 {
            DISPLAY: block
        }
        #monmenu LI.sfhover UL.niveau2 {
            DISPLAY: block
        }
        #monmenu LI LI.sfhover UL.niveau3 {
            DISPLAY: block
        }
        #monmenu LI.plus {
            BACKGROUND-POSITION: right 50%;
            BACKGROUND-IMAGE: url(illustrations/fdroite.gif);
             BORDER-BOTTOM: #b0b0b0 3px solid;
            BACKGROUND-REPEAT: no-repeat
        }
        /* unvisited link */
        a:link {
        color: red;
        }

        /* visited link */
        a:visited {
        color: green;
        }

        /* mouse over link */
        a:hover {
        color: hotpink;
        font-size:150%;
        }

        /* selected link */
        a:active {
        color: blue;
        }
    </STYLE>

    <META 
    content="CSS, cascading style sheets, mise en page, design, site, web, techniques, sites, webmaster, page" 
    name=keywords>
    <META 
    content="Voici un exemple de code de menu hi�rarchique d�roulant r�alis� � l'aide de CSS." 
    name=description>
    <META content="MSHTML 6.00.2900.2180" name=GENERATOR>
</HEAD>
<BODY>
<div id="sidebar" class = "pull-left">
<a href="#" class="logo"><img src="admin/images/article.jpg" alt="" width="230" height='250'></a>
    <!-- <DIV 
        style="LEFT: 0px; WIDTH: 140px; POSITION: absolute; BACKGROUND-COLOR: rgb(247,243,234)">
    </DIV> -->
    <DIV id=monmenu>
        <UL class=niveau1>
            <br>
            <li class="">
                <span><a href="index.php" title='Acceuil'><img src="images/acceuil.ico" width='20'></i> Home</a></span>
            </li>
            <!-- <br>
            </li><li class="">
                <span><a href="form_pay.php" title="Payement du solde de viticuleur"><img src="images/Purchase Order_24px.png" alt="" width='20'>Payement</a></span>
            </li> -->
            <br>
            <LI><a href="solde.php">Solde</a></LI>
            <br>
            <LI><a href=""><img src="images/icons8_print_32.png" width='20' alt="">Impression</a> 
                <UL class=niveau2>
                    <LI class=plus>
                    <a href="imprimer_fact.php" title="Facture de livraison">Facture de livraison</a>
                    </LI>
                    <LI>
                    <a href = "impri_recu.php" title="Recu de payement">Recu de payement</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Viticulteur</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href="guitar.php" title="Ajout"><img src="images/Add List_24px.png" width='14'> Ajout</a>
                    </LI>
                    <LI>
                    <a href = "liste_cli.php" title="Liste des membres"><img src="images/Ingredients List_24px.png" alt="" width='14'> Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Livraison</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href = "facture.php" title="Ajout de facture"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI>
                    <LI>
                        <a href = "liste_facture.php" title="Listes des factures"><img src="images/Ingredients List_24px.png" width='14' alt="">Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Payement</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href="form_pay.php" title="Ajout de facture ou facturation"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI>
                    <LI>
                        <a href = "liste_payement.php" title="Listes des payements"><img src="images/Ingredients List_24px.png" alt="" width='14'>Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Raisins</a> 
                <UL class=niveau2>
                    <!-- <LI class=plus>
                        <a href = "form_raisin.php" title="Ajout de raisins"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI> -->
                    <LI>
                        <a href = "liste_raisin.php" title="Liste des types de raisins"><img src="images/Ingredients List_24px.png" width='14' alt="">Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Transporteur</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href = "form_transp.php" title="Ajout de transporteur"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI>
                    <LI>
                        <a href = "liste_transporteur.php" title="Liste des transporteurs"><img src="images/Ingredients List_24px.png" alt="" width='14'>Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Peseur</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href = "form_pes.php" title="Ajout de Peseur"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI>
                    <LI>
                        <a href = "liste_form_pes.php" title="Listes peseurs"><img src="images/Ingredients List_24px.png" alt="" width='14'>Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Controleur</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href = "form_contr.php" title="Ajout de controleur"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI>
                    <LI>
                        <a href = "liste_form_contr.php" title="Listes des controleurs"><img src="images/Ingredients List_24px.png" alt="" width='14'>Liste</a>
                    </LI> 
                </UL>
            </LI>
            <br><br>
            <LI><a href="">Secteur</a> 
                <UL class=niveau2>
                    <LI class=plus>
                        <a href = "forme_secteur.php" title="Ajout de secteur"><img src="images/Add List_24px.png" width='14'>Ajout</a>
                    </LI>
                    <LI>
                        <a href = "liste_forme_secteur.php" title="Listes des secteurs"><img src="images/Ingredients List_24px.png" alt="" width='14'>Liste</a>
                    </LI> 
                </UL>
            </LI>
            
        </UL><br><br> <br>
        
    </DIV>
    <?php //include('sidebar.php'); ?>
</div>
    
</BODY>