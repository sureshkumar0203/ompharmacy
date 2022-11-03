<!doctype html>
<html>
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Page Title -->
    <title>OM Healthcare Enterprise Limited</title>
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('public/img/favicon.png') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".tm-primary-nav">

<!-- Start Site Header Wrap -->
    <header class="tm-header2">
        <div class="tm-site-header">
            <div class="tm-header-info-wrap">
                <div class="container tm-header-info">
                    <a href="#"><i class="fa fa-phone"></i>1-800-120-0431</a>
                    <a href="#"><i class="fa fa-envelope"></i>support@ompharmacy.com</a>
                </div>
            </div>
            <div class="tm-header-menu">
                <div class="container tm-header-menu-container">
                    <div class="tm-site-branding">
                        <!-- For Image Logo -->
                        <a href="#" class="tm-logo-link">
                            <img src="{{ asset('public/img/logo.png') }}" alt="" class="tm-logo">
                        </a>
                        <!-- For Site Title -->
                        <!-- <span class="tm-site-title">
                        <a href="#">Om Pharmacy</a>
                        </span> -->
                    </div>
                    <nav class="tm-primary-nav">
                        <ul class="tm-primary-nav-list">
                        
                            <li class="menu-item"><a href="#" class="nav-link">Home</a></li>
                            <li class="menu-item"><a href="#" class="nav-link">About Us</a></li>
                            <li class="menu-item menu-item-has-children current-menu-ancestor current-menu-parent">
                                <a href="#" class="nav-link">Our Services <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li class="menu-item"><a href="#">Pharmacy</a></li>
                                    <li class="menu-item"><a href="#">Patho Lab</a></li>
                                    <li class="menu-item"><a href="#">Nurshing Care</a></li>
                                    <li class="menu-item"><a href="#">Bed Side Attedants</a></li>
                                    <li class="menu-item"><a href="#">Dietician</a></li>
                                    <li class="menu-item"><a href="#">Doctor At Door</a></li>
                                    <li class="menu-item"><a href="#">Physiotherapy</a></li>
                                    <li class="menu-item"><a href="#">Councellors</a></li>
                                </ul>
                            </li>
                             <li class="menu-item"><a href="#" class="nav-link">Contact Us</a></li>
                             <li class="menu-item"><a href="#" class="nav-link tm-header-ap">Customer Login / Register </a></li>
                        </ul>
                    </nav>
                </div><!-- .tm-header-menu-container -->
            </div><!-- .tm-header-menu -->
        </div><!-- .tm-site-header -->
    </header>
    <!-- End Site Header Wrap -->

    <!-- Start Hero Section -->
    <section class="hero tm-style1" id="home">
        <div class="hero-slider1 owl-carousel" id="hero-slider1">
            <div class="single-slide" style="background: url({{ asset('public/img/slide-01.jpg') }});">
                <div class="hero-overlay"></div>
                <!-- .container -->
            </div><!-- .single-slide -->
            <div class="single-slide" style="background: url({{ asset('public/img/slide-02.jpg') }});">
                <div class="hero-overlay"></div>
                <!-- .container -->
            </div><!-- .single-slide -->
            <div class="single-slide" style="background: url({{ asset('public/img/slide-03.jpg') }});">
                <div class="hero-overlay"></div>
                <!-- .container -->
            </div><!-- .single-slide -->
        </div><!-- #hero-slider1 -->
    </section>
    <!-- End Hero Section -->


    <!-- Start Department Section -->
    <section  id="department">
        <div class="empty-space col-md-b55 col-xs-b55"></div>
        <div class="tm-section-heading text-center">
            <h2>Our Services</h2>
            <div class="tm-section-seperator"><span></span></div>
            <div class="empty-space col-md-b30 col-xs-b40"></div>
        </div>
        <div class="container">
            <div class="tm-tab-wrap">
                <div class="tm-tabs-wrap">
                    <ul class="tabs service">
                        <li> <a href="#"><i class="fa fa-medkit"></i> PHARMACY</a></li>
                        <li><a href="#"><i class="fa fa-heartbeat"></i> PATHO LAB</a></li>
                        <li><a href="#"><i class="icofont icofont-crutches"></i> NURSHING CARE</a></li>
                        <li><a href="#"><i class="fa fa-stethoscope"></i> DIETICIAN</a></li>
                        <li><a href="#"><i class="fa fa-user-md"></i> DOCTOR AT DOOR</a></li>
                        <li><a href="#"><i class="fa fa-plus"></i> VIEW ALL</a></li>
                    </ul> <!-- .tabs -->
                </div>
                
                <div class="empty-space col-md-b60 col-xs-b40"></div>
                 <div class="row">
                            <div class="col-lg-6">
                                <div class="tm-dept-img"><img src="{{ asset('public/img/1.jpg') }}" alt=""></div>
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="tm-dept-details-wrap">
                                    <div class="tm-about">
                                        <h3 class="tm-about-title">Company<span> Overview</span></h3>
                                        <div class="tm-about-text">
                                            <p>OM Pharmacy Retail (P) Ltd, established in the year 2000 is the only Odisha based Company that has been registered under Companies Act 1956 on <br>
 15 .09. 2008, with its sole Retail Outlet. OM Pharmacy has now become a Branded Name in the Pharmacy Retail Chain World.</p>
                                        </div>
                                        <div class="empty-space col-xs-b25"></div>
                                        <div class="tm-about-btn">
                                            <a href="#" class="tm-btn1">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
              </div>
                   
            </div> <!-- .tab -->
        </div>
        <div class="empty-space col-md-b100 col-xs-b70"></div>
    </section>
    <!-- End Department Section -->

<!-- Start Fun Fact Section -->
    <section class="tm-fun-fact-wrap tm-bg">
        <div class="empty-space col-md-b100 col-xs-b70"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="tm-fun-fact text-center">
                        <i class="icofont icofont-briefcase-alt-2"></i>
                        <h2 class="tm-counter">25</h2>
                        <h3>Years of experience</h3>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-3 col-md-6">
                    <div class="tm-fun-fact text-center">
                        <i class="icofont icofont-emo-simple-smile"></i>
                        <h2 class="tm-counter">2500</h2>
                        <h3>Happy Patients</h3>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-3 col-md-6">
                    <div class="tm-fun-fact text-center">
                        <i class="icofont icofont-doctor"></i>
                        <h2 class="tm-counter">150</h2>
                        <h3>Number of Doctors</h3>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-3 col-md-6">
                    <div class="tm-fun-fact text-center">
                        <i class="icofont icofont-users-social"></i>
                        <h2 class="tm-counter">250</h2>
                        <h3>Number of Staffs</h3>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                </div><!-- .col -->
            </div>
        </div>
        <div class="empty-space col-lg-b70 col-xs-b40"></div>
    </section>
    <!-- End Fun Fact Section -->

    <!-- Start Testimonial Section -->
    <section>
        <div class="empty-space col-md-b100 col-xs-b70"></div>
        <div class="tm-section-heading text-center">
            <h2>What Our Customer Says</h2>
            <div class="tm-section-seperator"><span></span></div>
            <div class="empty-space col-md-b60 col-xs-b40"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="owl-carousel tm-testimonial tm-testimonial-2 tm-dots1">
                        <div class="tm-single-testimonial">
                            <div class="tm-testimonial-thumb"><img src="{{ asset('public/img/test-01.jpg') }}" alt=""></div>
                            <div class="tm-testimonial-text">
                                <i class="fa fa-quote-right"></i>
                                <blockquote>They saved my life. They didn't give up, and they pushed for a treatment that would put me in remission. They continue to have some of the best staffing I've ever had. </blockquote>
                                <div class="tm-testimonial-meta">
                                    <h3>SR Rana</h3>
                                   
                                </div>
                            </div>
                        </div><!-- testimonail slide -->
                        <div class="tm-single-testimonial">
                            <div class="tm-testimonial-thumb"><img src="{{ asset('public/img/test-02.jpg') }}" alt=""></div>
                            <div class="tm-testimonial-text">
                                <i class="fa fa-quote-right"></i>
                                <blockquote>Nothing but the best. Team medicine with top notched specialists. Worth the drive to come here especially if it involves your health or the health of a loved one.</blockquote>
                                <div class="tm-testimonial-meta">
                                    <h3>Sheri </h3>
                                </div>
                            </div>
                        </div><!-- testimonail slide -->
                        <div class="tm-single-testimonial">
                            <div class="tm-testimonial-thumb"><img src="{{ asset('public/img/test-03.jpg') }}" alt=""></div>
                            <div class="tm-testimonial-text">
                                <i class="fa fa-quote-right"></i>
                                <blockquote>I love this , I definetly think its the best in Odisha, I had both of my children there, their staff is really nice, and they definelty took care of me.</blockquote>
                                <div class="tm-testimonial-meta">
                                    <h3>MR R.</h3>
                                </div>
                            </div>
                        </div><!-- testimonail slide -->
                    </div>
                </div>
            </div>
        </div>
        <div class="empty-space col-md-b100 col-xs-b70"></div>
    </section>
    <!-- End Testimonial Section -->

    
<!-- Start video Section -->
    <div class="tm-newsletter tm-bg">
        <div class="tm-nl-overlay"></div>
        <div class="empty-space col-md-b100 col-xs-b70"></div>
        <div class="container text-center video-sec">
       <h4 class="text-center text-white">All medicines, food stuff & toiletries are purchased against 100% bills & hence they carry a genuine & authentic </h4>
        <a href="#"><span><i class="fa fa-play video-player-icon"></i></span></a>
                
        </div>
        <div class="empty-space col-md-b100 col-xs-b70"></div>
    </div>
    <!-- End video Section -->
   
    <!-- Start Clients Section -->
    <div class="tm-clients-wrap">
        <div class="empty-space col-md-b100 col-xs-b70"></div>
        <div class="tm-section-heading text-center">
            <h2>Clients</h2>
            <div class="tm-section-seperator"><span></span></div>
            <div class="empty-space col-md-b60 col-xs-b40"></div>
        </div>
        <div class="container">
            <div class="tm-clients-curosor owl-carousel">
                <div class="tm-client"><img src="{{ asset('public/img/clients/amri.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/apollo.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/care.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/kims.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/tata.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/east.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/aiims.png') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/nalco.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/ved.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/rbi.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/ins.jpg') }}" alt=""></div>
                <div class="tm-client"><img src="{{ asset('public/img/clients/cghs.png') }}" alt=""></div>
            </div>
        </div>
            
        <div class="empty-space col-md-b100 col-xs-b70"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="empty-space col-md-b0 col-xs-b40"></div>
                    <div class="tm-contact-info">
                        <div class="tm-single-contact tm-style1">
                            <i class="fa fa-map-marker"></i>
                            <h3>Address</h3>
                            <p>M - 54, Samanta Vihar, Kalinga Hospital Square, Chandrasekharpur, Bhubaneswar - 751017, Odisha</p>
                        </div>
                        <div class="empty-space col-md-b60 col-xs-b30"></div>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-4">
                    <div class="tm-single-contact tm-style1">
                        <i class="fa fa-phone"></i>
                        <h3>Phone</h3>
                        <p>+91-9777797475  <br>
                           0674 - 2300431</p>
                    </div>
                    <div class="empty-space col-md-b60 col-xs-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-4">
                    <div class="tm-single-contact tm-style1">
                        <i class="fa fa-envelope"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:support@ompharmacy.com">support@ompharmacy.com </a><br>
                      </p>
                    </div>
                    <div class="empty-space col-md-b60 col-xs-b30"></div>
                </div><!-- .col -->
                
            </div>
        </div>
    
    </div>
    <!-- End Clients Section -->

    <!-- Start Footer -->
    <footer class="tm-overflow-hidden">
        <div class="tm-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="tm-footer-social">
                            <h2>Follow Us</h2>
                            <div class="tm-footer-social-list">
                                <a href="#" class="tm-social-btn blue">
                                    <i class="fa fa-facebook-square"></i>
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#" class="tm-social-btn blue">
                                    <i class="fa fa-google-plus-square"></i>
                                    <i class="fa fa-google-plus-square"></i>
                                </a>
                                <a href="#" class="tm-social-btn blue">
                                    <i class="fa fa-twitter-square"></i>
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                                <a href="#" class="tm-social-btn blue">
                                    <i class="fa fa-linkedin-square"></i>
                                    <i class="fa fa-linkedin-square"></i>
                                </a>
                               
                            </div>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
        <div class="tm-site-footer">
            <div class="container"><!-- row-md-reverce -->
                <div class="row row-sm-reverce">
                    <div class="col-md-7 col-lg-8">
                        <p class="tm-copyright">Copyright &copy; {{ date("Y") }} Om Pharmacy. Developed by <a href="https://www.bletechnolabs.com/" target="_blank">BLE Technologies-E</a></p>
                    </div><!-- .col -->
                    <div class="col-md-5 col-lg-4">
                        <div class="tm-footer-hotline">
                            <div class="tm-footer-hotline-in">
                                <div class="tm-phone-icon"><i class="fa fa-mobile"></i></div>
                                <h3>Toll Free</h3>
                                <p>1-800-120-0431</p>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scroll Up -->
    <div id='scrollup'></div>

    <!-- Scripts -->
    <script src="{{ asset('public/js/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
</body>

</html>