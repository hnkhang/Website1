<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bunny restaurant</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->
        

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/animate/animate.css" />
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <?php
        session_start();
        include_once("connection.php"); 
        ?>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       
        
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
            <div class="header_top_menu clearfix">	
                <div class="container">
                    <div class="row">	
                        <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
                            <div class="call_us_text">
								<a href=""><i class="fa fa-clock-o"></i> We serve 24/7</a>
								<a href=""><i class="fa fa-phone"></i>0342 552 442</a>
							</div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="head_top_social text-right">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><i class="fa fa-pinterest-p"></i></a>
                                <a href=""><i class="fa fa-youtube"></i></a>
                                <a href=""><i class="fa fa-phone"></i></a>
                                <a href=""><i class="fa fa-camera"></i></a>
                            </div>	
                        </div>

                    </div>			
                </div>
            </div>

            <!-- End navbar-collapse-->

            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="?page=index"><img src="assets/images/logo.png" alt="" /></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="?page=index">Home</a></li>
                                        <li><a href="?page=index#abouts">About us</a></li>
                                        <?php
                                        if(isset($_SESSION['us']) && $_SESSION['us']!=""){
                                            if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
                                        ?>
                                        <li><a href="?page=update_customer">Hi, <?php echo $_SESSION['us']?></a></li>
                                        <li><a href="?page=logout">Log out</a></li>
                                        <li><a href="?page=product_management">Product</a></li>
                                        <li><a href="?page=category_management">Category</a></li>
                                        <li><a href="?page=index#ourPakeg">Menu</a></li>      
                                            <?php
                                            }
                                            else{
                                            ?>  
                                                <li><a href="?page=update_customer">Hi, <?php echo $_SESSION['us']?></a></li>
                                                <li><a href="?page=logout">Log out</a></li>
                                                <li><a href="?page=index#ourPakeg">Menu</a></li>
                                                <li><a href="?page=feed_back">Feedback</a></li>
                                                <li><a href="?page=booking" class="booking">Table Booking</a></li>                              
                                        <?php 
                                                }
                                        }
                                        else{
                                        ?>
                                        <li><a href="?page=login">Log in</a></li>
                                        <li><a href="?page=register">Register</a></li>
                                        <li><a href="?page=index#ourPakeg">Menu</a></li>
                                        <?php
                                            }
                                        ?>
                                        
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>	
        </header> <!-- End Header Section -->
        <section id="slider" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    <h1>Bunny Restaurant</h1>
                                    <p> The best place in the world for food lovers. Come and dine with us, we have many type of desserts, meal and drink of your liking </p>
                                    
                                </div>
                            </div>	
                        </div>

                    </div>
                </div>
            </div>
        </section>
       <?php
	 if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page=='login'){
        include_once("Login.php");
        }
        elseif($page=='register'){
            include_once("Register.php");
        }
        elseif($page=='category_management'){
            include_once("Category_Management.php");
        }
        elseif($page=='product_management'){
            include_once("Product_Management.php");
        }
        elseif($page=='add_category'){
            include_once("Add_category.php");
        }
        elseif($page=='update_category'){
            include_once("Update_category.php");
        }
        elseif($page=='add_product'){
            include_once("Add_Product.php");
        }
        elseif($page=='update_product'){
            include_once("Update_Product.php");
        }
        elseif($page=='update_customer'){
            include_once("Update_customer.php");
        }
        elseif($page=='logout'){
            include_once("LogOut.php");
            }
        elseif($page=='feed_back'){
            include_once("FeedBack.php");
            }
         elseif($page=='booking'){
            include_once("Booking.php");
            }
        else{
            include("Content.php");
        }

    }
	?>

        <section id="footer_widget" class="footer_widget">
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="2s">
                                <h3>Our address and contact</h3>

                                <div class="single_widget_info">
                                    <p>112 No Where street.

                                        <span>Unknown city,</span>
                                        <span>Oblivion</span>
                                        <span class="phone_email">phone: 0342 552 442</span>
                                        <span>Email: BunnyRestaurant@gmail.com</span></p>
                                </div>

                                <div class="footer_socail_icon">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                    <a href=""><i class="fa fa-pinterest-p"></i></a>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                    <a href=""><i class="fa fa-phone"></i></a>
                                    <a href=""><i class="fa fa-camera"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="4s">
                                <h3>Our openning time</h3>

                                <div class="single_widget_info">
                                    <p><span class="date_day">Monday To Friday</span>
                                        <span>8:00am to 10:00am(Breakfast)</span>
                                        <span>11:00am to 10:00pm(Lunch/Diner)</span>

                                        <span class="date_day">Saturday & Sunday</span>
                                        <span>9:00am to 11:00am(Brunch)</span>
                                        <span>11:00am to 12:00pm(Lunch/Dinner)</span></p>
                                </div>
                            </div>
                        </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright wow zoomIn" data-wow-duration="3s">
							<p>Made with <i class="fa fa-heart"></i> by <a href="http://bootstrapthemes.co">Bootstrap Themes</a>2016. All Rights Reserved</p>
						</div>
                    </div>
                </div>
            </div>
        </footer>
		
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>		


        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow/wow.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
