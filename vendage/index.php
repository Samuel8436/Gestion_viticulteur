<?php
include('securite_page.php');//Securisation avec login
//style
include('header.php');
?>
<style>
    /* div.two img:hover{
        font-size:150%;
    } */
</style>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">

        <div id="page">

            <?php include ('nav_sidebar.php');?>

            <div id="content">
                <div class="hero-unit-table">  
                    <?php include ('theme.php'); ?> 
                                     <!-- image slider -->
                    <!-- <div class="slider-wrapper theme-default">

                        <div id="slider" class="nivoSlider">
                            <div class="two"><img src="admin/images/wine.png" data-thumb="images/toystory.jpg" alt="" /></div>
                            <div class="two"><img src="admin/images/instrument.jpg" data-thumb="images/toystory.jpg" alt="" /></div>
                            <div class="two"><img src="admin/images/instrument2.jpg" data-thumb="images/wineries.jpg" alt="" /></div>
                            <div class="two"><img src="admin/images/large.jpg"  alt="" data-transition="slideInLeft" /></div>
                            <div class="two"><img src="admin/images/guitar.jpg" data-thumb="images/nemo.jpg" alt=""  /></div>
                        </div>

                     
                    </div> -->
                    <!-- end slider -->
			<hr/>
			
                    <div id="body">

                        <div class="body">
                            <ul>
                                <li>
								
                                    <a class="figure" href="#pic1" data-toggle = "modal"><img class = "image-rounded"src="images/g1.jpg" height="200" width="150" alt=""></a>
                                </li>
                                <li>
                                    <a class="figure" href="#pic2" data-toggle = "modal" ><img class = "image-rounded"src="images/featured-wine.png" height="200" width="150" alt=""></a>

                                </li>
                                <li>
                                    <a class="figure" href="#pic3" data-toggle = "modal" ><img class = "image-rounded" src="images/wineries.jpg" height="200" width="150" alt=""></a>

                                </li>
                                <li>
                                    <a class="figure"  href="#pic4" data-toggle = "modal" ><img class="img-rounded" src="images/wine-farm.jpg" height="200" width="150" alt=""></a>         
                                </li>

                            </ul>

                          <?php include ('modal_latest.php');?>
                        </div>

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