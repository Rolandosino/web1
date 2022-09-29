<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>BIBLIOTEHQUE | Home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Chronicle Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="css/shop.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <!-- logo -->
    <link href="//fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <!-- titles -->
    <link href="//fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <!-- body -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
</head>
<?php include_once('partials/nav.php');?>
        <!-- //navbar ends here -->
        <!-- banner -->
        <div class="banner-bg-agileits">
            <!-- banner-text -->
            <div class="banner-text">
                <div class="container">
                    <p class="b-txt">La</p>
                    <h2 class="title">
                        Bibliothèque universitaire
                    </h2>
                    
                </div>
            </div>
            <!-- //banner-text -->
        </div>
        <!-- //banner -->
        <!-- about -->
        <div class="about-sec section" id="about">
            <div class="container">
                <!-- about-left-grid -->
                <div class="col-md-7 about-left-grid">
                    <div class="inner-about2">
                        <h4>La splendide bibliothèque universitaire!</h4>
                        <p>La bibliothèque universitaire regorge beaucoup de livres dans divers domaines qui sont disponibles aux utilisateurs.</p>
                        <h5>Les catégories de livres disponibles:</h5>
                        <ul class="about-list">
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Mathematiques</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Sciences physiques</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Informatique</li>

                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Français</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Anglais</li>
                            
                            
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Allemand</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>philosophie</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Géographie</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Histoire</li>
                            <li>
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>Roman</li>


                        </ul>
                    </div>

                    <!-- about left bottom - services -->
                    <div class="principles-grids principles-grids1">
                        <div class="abt-btm agileits w3layouts aos-init aos-animate">
                            <div class="col-md-6 col-sm-6 agileits elite-services1 w3layouts bottom-gds" data-aos="fade-up">
                                <div class="bott-img agileits w3layouts">
                                    <div class="icon-holder agileits w3layouts">
                                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                                    </div>
                                    <h4 class="mission agileits w3layouts">law library</h4>
                                    <div class="description agileits w3layouts">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 agileits elite-services2 w3layouts bottom-gds" data-aos="fade-down">
                                <div class="bott-img bott-img1 agileits w3layouts">
                                    <div class="icon-holder agileits w3layouts">
                                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                                    </div>
                                    <h4 class="mission agileits w3layouts">asian materials</h4>
                                    <div class="description agileits w3layouts">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- //about left bottom - services ends here -->
                </div>
               
                <div class="col-md-5 about-right-grid"></div>
             
                <div class="clearfix"></div>
            </div>
        </div>
        
        <?php include_once('partials/footer.html');?>
    <!-- //home -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!--search jQuery-->
    <script src="js/main.js"></script>
    <!--search jQuery-->
    <!-- cart-js -->
    <script src="js/minicart.js"></script>
    <script>
        chr.render();

        chr.cart.on('new_checkout', function (evt) {
            var items, len, i;

            if (this.subtotal() > 0) {
                items = this.items();

                for (i = 0, len = items.length; i < len; i++) {}
            }
        });
    </script>
    <!-- //cart-js -->
    <!-- Scrolling Nav JavaScript -->
    <script src="js/scrolling-nav.js"></script>
    <!-- //fixed-scroll-nav-js -->
    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- about bottom grid Numscroller -->
    <script src="js/numscroller-1.0.js"></script>
    <!-- //about bottom grid Numscroller -->
    <!-- Bootstrap core JavaScript
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>