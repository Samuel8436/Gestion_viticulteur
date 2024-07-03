<?php
//include('admin/connect.php');
include('header.php');

?>
<body>
    <?php
    include('navtop.php');
    ?>
   
        <div id="page">

          <?php include ('nav_sidebar2.php');?>

            <div id="content">
                <div class="hero-unit-table">                        <!-- image slider -->
                    <div class="slider-wrapper theme-default">

                          <div id="slider" class="nivoSlider">
                            <img src="admin/images/wine.png" data-thumb="images/toystory.jpg" alt="" />
                            <img src="admin/images/instrument.jpg" data-thumb="images/toystory.jpg" alt="" />
                            <img src="admin/images/instrument2.jpg" data-thumb="images/wineries.jpg" alt="" />
                            <img src="admin/images/large.jpg"  alt="" data-transition="slideInLeft" />
                            <img src="admin/images/guitar.jpg"  alt=""  />
                        </div>

                        <div id="htmlcaption" class="nivo-html-caption">
                            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
                        </div>
                    </div>
                    <!-- end slider -->

                    <div id="body">

                        <div class="body">
                            <ul>
                                <li>
                                    <a class="figure" href=""><img class = "image-rounded"src="images/g1.png" alt=""></a>
                                </li>
                                <li>
                                    <a class="figure" href=""><img class = "image-rounded"src="images/drumset.png" alt=""></a>

                                </li>
                                <li>
                                    <a class="figure" href=""><img class = "image-rounded" src="images/piano.png" alt=""></a>

                                </li>
                                <li>
                                    <a class="figure" href=""><img class="img-rounded" src="images/violin.png" alt=""></a>         
                                </li>

                            </ul>	
                            
                             
                        </div>

                    </div>
                    <div id="footer">
                        <?php include('footer_user.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>