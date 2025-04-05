<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> TastyGo - Good Food on the Move. </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
    .logo img{
        height: 100px;
    }
</style>
<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/transTestyGo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent">
                <div class="main-header  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="assets/img/logo/transTestyGo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <div class="menu-main d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu f-right d-none d-lg-block">
                                        <nav> 
                                            <ul id="navigation">
                                                <li><a href="{{ route('home') }}">Home</a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <li><a href="{{ route('menu') }}">Menu</a></li>
                                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                                @if (Route::has('login'))
                                                @auth
                                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                @else
                                                <li><a href="{{ url('login') }}">Login</a></li>
                                                @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                                @endif
                                               @endauth
                                               @endif
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="header-right-btn f-right d-none d-lg-block ml-20">
                                        <a href="contact.html" class="border-btn header-btn">Order Online</a>
                                    </div>
                                </div>
                            </div>   
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
    	@yield('content')
   </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/section_bg02.png">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ route('home') }}"><img src="assets/img/logo/transTestyGo.png" alt="" height="100px"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Testimonial</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="{{ route('contact') }}">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Useful Links</h4>
                                    <ul>
                                        <li><a href="{{ route('register') }}">Registration</a></li>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="#">Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Instagram -->
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Instagram Feed</h4>
                                </div>
                                <div class="instagram-gellay">
                                    <ul class="insta-feed">
                                        <li><a href="#"><img src="assets/img/gallery/instagram1.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/gallery/instagram2.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/gallery/instagram3.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/gallery/instagram4.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/gallery/instagram5.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/gallery/instagram6.png" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <!-- Footer Social -->
                            <div class="footer-social text-center">
                                <span>Follow Us</span>
                                <a href="https://www.linkedin.com/in/dev-ravirajput"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.facebook.com/profile.php?id=100026887834468"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://dev-ravirajput.github.io/Portfolio/"><i class="fas fa-globe"></i></a>
                                <a href="https://www.instagram.com/the.ravi.rajput"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script> 

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->    
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
    </body>
</html>
