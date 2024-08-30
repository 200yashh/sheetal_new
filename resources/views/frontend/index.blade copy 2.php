<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crazy Life Tourism</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style-starter.css') }}">
    <!-- Template CSS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <h1><a class="navbar-brand mr-lg-5" href="index.html">
                        Delight My Trip
                    </a></h1>
                <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.html">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-us">About</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="#destinations">Destinations</a> -->
                            <a class="nav-link" href="#destinations">Destinations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>

                    </ul>
                </div>
                <div class="d-lg-block dne">
                    <a href="#contact" class="btn btn-style btn-secondary">Get In Touch</a>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //header -->
    <!--banner-slider-->
    <!-- main-slider -->
    <section class="w3l-main-slider" id="home">
        <div class="banner-content">
            <div id="demo-1" data-zs-src='["{{ asset('frontend/assets/images/banner1.jpg') }}", "{{ asset('frontend/assets/images/banner2.jpg') }}","{{ asset('frontend/assets/images/banner3.jpg') }}", "{{ asset('frontend/assets/images/banner4.jpg') }}"]' data-zs-overlay="dots">
                <div class="demo-inner-content">
                    <div class="container">
                        <div class="banner-infhny">
                            <h3>You don't need to go far to find what matters.</h3>
                            <h6 class="mb-3">Discover your next adventure</h6>
                            <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                                <form action="#" method="post" class="booking-form">
                                    <div class="row book-form">
                                        <div class="form-input col-md-4 mt-md-0 mt-3">

                                            <select name="city" class="selectpicker city" id="city">
                                                <option value="">Destinaion</option>
                                            </select>
                                        </div>
                                        <!-- <div class="form-input col-md-4 mt-md-0 mt-3">
                                            <input type="date" name="" placeholder="Date" required="">
                                        </div> -->
                                        <!-- <div class="bottom-btn col-md-4 mt-md-0 mt-3">
                                            <button class="btn btn-style btn-secondary"><span class="fa fa-search mr-3" aria-hidden="true"></span> Search</button>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /main-slider -->
    <!-- //banner-slider-->

    <!--/grids-->
    <section class="w3l-grids-3 py-5 destinations" id="destinations">
        <div class="container py-md-5">
            <div class=" title-content text-left mb-lg-5 mb-4">
                <h6 class="sub-title">View</h6>
                <h3 class="hny-title package-heading" id="package-heading">Popular Packages</h3>
            </div>
            <div class="row bottom-ab-grids" id="package-container">
                <!--/row-grids-->
                <div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="3" data-agent-id="2" data-package-name="super deluxe">
                    <div class="subject-card-header p-4">
                        <span class="card_title p-lg-4d-block">
                            <div class="row align-items-center">
                                <!-- <div class="col-sm-5 subject-img">
                                    <img src="{{ asset('frontend/assets/images/g1.jpg') }}" class="img-fluid" alt="">
                                </div> -->
                                <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                    <h4>Paris</h4>
                                    <p>3Days, 4 Nights</p>
                                    <div class="dst-btm">
                                        <h6 class=""> Start From </h6>
                                        <span>$1650</span>
                                    </div>
                                    <p class="sub-para">Per person</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="3" data-agent-id="2" data-package-name="super deluxe">
                    <div class="subject-card-header p-4">
                        <span class="card_title p-lg-4d-block">
                            <div class="row align-items-center">
                                <!-- <div class="col-sm-5 subject-img">
                                    <img src="{{ asset('frontend/assets/images/g2.jpg') }}" class="img-fluid" alt="">
                                </div> -->
                                <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                    <h4>Bankok</h4>
                                    <p>3Days, 4 Nights</p>
                                    <div class="dst-btm">
                                        <h6 class=""> Start From </h6>
                                        <span>$1850</span>
                                    </div>
                                    <p class="sub-para">Per person</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <!--//row-grids-->
                <!--/row-grids-->
                <div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="3" data-agent-id="2" data-package-name="super deluxe">
                    <div class="subject-card-header p-4">
                        <span class="card_title p-lg-4d-block">
                            <div class="row align-items-center">
                                <!-- <div class="col-sm-5 subject-img">
                                    <img src="{{ asset('frontend/assets/images/g3.jpg') }}" class="img-fluid" alt="">
                                </div> -->
                                <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                    <h4>Maldives</h4>
                                    <p>3Days, 4 Nights</p>
                                    <div class="dst-btm">
                                        <h6 class=""> Start From </h6>
                                        <span>$1350</span>
                                    </div>
                                    <p class="sub-para">Per person</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="3" data-agent-id="2" data-package-name="super deluxe">
                    <div class="subject-card-header p-4">
                        <span class="card_title p-lg-4d-block">
                            <div class="row align-items-center">
                                <!-- <div class="col-sm-5 subject-img">
                                    <img src="{{ asset('frontend/assets/images/g4.jpg') }}" class="img-fluid" alt="">
                                </div> -->
                                <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                    <h4>Greece</h4>
                                    <p>3Days, 4 Nights</p>
                                    <div class="dst-btm">
                                        <h6 class=""> Start From </h6>
                                        <span>$1650</span>
                                    </div>
                                    <p class="sub-para">Per person</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <!--//row-grids-->
                <!--/row-grids-->
                <div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="3" data-agent-id="2" data-package-name="super deluxe">
                    <div class="subject-card-header p-4">
                        <span class="card_title p-lg-4d-block">
                            <div class="row align-items-center">
                                <!-- <div class="col-sm-5 subject-img">
                                    <img src="{{ asset('frontend/assets/images/g5.jpg') }}" class="img-fluid" alt="">
                                </div> -->
                                <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                    <h4>London</h4>
                                    <p>3Days, 4 Nights</p>
                                    <div class="dst-btm">
                                        <h6 class=""> Start From </h6>
                                        <span>$1750</span>
                                    </div>
                                    <p class="sub-para">Per person</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="3" data-agent-id="2" data-package-name="super deluxe">
                    <div class="subject-card-header p-4">
                        <span class="card_title p-lg-4d-block">
                            <div class="row align-items-center">
                                <!-- <div class="col-sm-5 subject-img">
                                    <img src="{{ asset('frontend/assets/images/g6.jpg') }}" class="img-fluid" alt="">
                                </div> -->
                                <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                    <h4>Julian Alps</h4>
                                    <p>3Days, 4 Nights</p>
                                    <div class="dst-btm">
                                        <h6 class=""> Start From </h6>
                                        <span>$1950</span>
                                    </div>
                                    <p class="sub-para">Per person</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//grids-->
    <!-- stats -->
    <section class="w3l-stats py-5" id="stats">
        <div class="gallery-inner container py-lg-0 py-3">
            <div class="row stats-con pb-lg-3">
                <div class="col-lg-3 col-6 stats_info counter_grid">
                    <p class="counter">730</p>
                    <h4>Branches</h4>
                </div>
                <div class="col-lg-3 col-6 stats_info counter_grid1">
                    <p class="counter">1680</p>
                    <h4>Travel Guides</h4>
                </div>
                <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-5">
                    <p class="counter">812</p>
                    <h4>Happy Customers</h4>
                </div>
                <div class="col-lg-3 col-6 stats_info counter_grid2 mt-lg-0 mt-5">
                    <p class="counter">990</p>
                    <h4>Awards</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats -->
    <!--/-->
    <div class="best-rooms py-5">
        <div class="container py-md-5">
            <div class="ban-content-inf row">
                <div class="maghny-gd-1 col-lg-6">
                    <div class="maghny-grid">
                        <figure class="effect-lily border-radius  m-0">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/g10.jpg') }}" alt="" />
                            <figcaption>
                                <div>
                                    <h4>3Days, 4 Nights</h4>
                                    <p>From 1720$ </p>
                                </div>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="maghny-gd-1 col-lg-6 mt-lg-0 mt-4">
                    <div class="row">
                        <div class="maghny-gd-1 col-6">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/g9.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4>3Days, 4 Nights</h4>
                                            <p>From 1220$ </p>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="maghny-gd-1 col-6">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/g8.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4>3Days, 4 Nights</h4>
                                            <p>From 1620$ </p>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="maghny-gd-1 col-6 mt-4">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/g7.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4>3Days, 4 Nights</h4>
                                            <p>From 1820$ </p>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="maghny-gd-1 col-6 mt-4">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/g6.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4>3Days, 4 Nights</h4>
                                            <p>From 1520$ </p>
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //stats -->
    <!--/w3l-bottom-->
    <section class="w3l-bottom py-5">
        <div class="container py-md-4 py-3 text-center">
            <div class="row my-lg-4 mt-4">
                <div class="col-lg-9 col-md-10 ml-auto">
                    <div class="bottom-info ml-auto">
                        <div class="header-section text-left">
                            <h3 class="hny-title two">Traveling makes a man wiser, but less happy.</h3>
                            <p class="mt-3 pr-lg-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
                                beatae laudantium
                                voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem ipsum
                                dolor sit
                                amet adipisicing elit.</p>
                            <a href="#about-us" class="btn btn-style btn-secondary mt-5">Read More</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3l-bottom-->

    <section class="w3l-grids-3 w3l-cta4 py-5" id="about-us">
        <div class="container py-lg-5">
            <div class="ab-section text-center">
                <h6 class="sub-title">About Us</h6>
                <h3 class="hny-title">Travel to make memories all around the world.</h3>
                <p class="py-3 mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum labore sed, veniam
                    nisi
                    sunt
                    laboriosam ducimus, odio
                    aspernatur fugiat minima blanditiis dignissimos.</p>
                <a href="#destinations" class="btn btn-style btn-primary">Read More</a>
            </div>
            <div class="row mt-5">
                <div class="col-md-9 mx-auto">
                    <img src="{{ asset('frontend/assets/images/banner3.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- testimonials -->
    <section class="w3l-clients" id="clients">
        <!-- /grids -->
        <div class="cusrtomer-layout pt-5">
            <div class="container py-md-3 pb-lg-0">
                <div class="heading text-center mx-auto">
                    <h6 class="sub-title text-center">Here’s what they have to say</h6>
                    <h3 class="hny-title mb-md-5 mb-4">our clients do the talking</h3>
                </div>
                <!-- /grids -->
                <div class="testimonial-width">
                    <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <span class="fa fa-quote-left" aria-hidden="true"></span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem
                                        ipsum dolor sit
                                        amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('frontend/assets/images/c1.jpg') }}" class="img-fluid" alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Rohit Paul</h3>
                                            <p class="indentity">Example City</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <span class="fa fa-quote-left" aria-hidden="true"></span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem
                                        ipsum dolor sit
                                        amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('frontend/assets/images/c2.jpg') }}" class="img-fluid" alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Shveta</h3>
                                            <p class="indentity">Example City</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <span class="fa fa-quote-left" aria-hidden="true"></span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem
                                        ipsum dolor sit
                                        amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('frontend/assets/images/c3.jpg') }}" class="img-fluid" alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Roy Linderson</h3>
                                            <p class="indentity">Example City</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <span class="fa fa-quote-left" aria-hidden="true"></span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi. Integer sit amet .Lorem
                                        ipsum dolor sit
                                        amet adipisicing elit. Laborum dolor facere ipsum adipisicingelit.
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="test-img"><img src="{{ asset('frontend/assets/images/c4.jpg') }}" class="img-fluid" alt="client-img">
                                        </div>
                                        <div class="peopl align-self">
                                            <h3>Mike Thyson</h3>
                                            <p class="indentity">Example City</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /grids -->
        </div>
        <!-- //grids -->
    </section>
    <!-- //testimonials -->

    <!-- contact-form -->
    <section class="w3l-grids-3 w3l-contact pt-3" id="contact">
        <div class="contact-infubd py-5">
            <div class="container py-lg-3">
                <div class="contact-grids row">
                    <div class="col-lg-6 contact-left">
                        <div class="partners">
                            <div class="cont-details">
                                <h5>Get in touch</h5>
                                <p class="mt-3 mb-4">Hi there, We are available 24/7 by fax, e-mail or by phone. Drop
                                    us line so we can
                                    talk
                                    futher about that.</p>
                            </div>
                            <div class="hours">
                                <h6 class="mt-4">Email:</h6>
                                <p> <a href="mailto:mail@Delight My Trip.com">
                                        mail@delightmytrip.com</a></p>
                                <h6 class="mt-4">Visit Us:</h6>
                                <p> 78-80 Upper St Giles St. Norwich NR2 1LT United Kingdom.</p>
                                <h6 class="mt-4">Contact:</h6>
                                <p class="margin-top"><a href="tel:+44-255-366-88">+44-255-366-88</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
                        <form action="" method="post" class="signin-form">
                            <div class="input-grids">
                                <div class="form-group">
                                    <select name="b_city" id="b_city" class="contact-input">
                                        <option value="">Select City</option>
                                        @foreach ($cityData as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="w3lName" id="w3lName" placeholder="Your Name*" class="contact-input" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="w3lSender" id="w3lSender" placeholder="Your Email*" class="contact-input" required="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="w3lSubect" id="w3lSubect" placeholder="Subject*" class="contact-input" />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="w3lMessage" id="w3lMessage" placeholder="Type your message here*" required=""></textarea>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-style btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="map">
                    <h5>Map</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86654334463!2d-74.25818682528057!3d40.70531100753592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1493028309728" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
    </section>
    <!-- /contact-form -->

    <!--/w3l-footer-29-main-->
    <footer>
        <!-- footer -->
        <section class="w3l-footer">
            <div class="w3l-footer-16-main py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 column">
                            <div class="row">
                                <div class="col-md-4 column">
                                    <h3>Company</h3>
                                    <ul class="footer-gd-16">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="#about-us">About Us</a></li>
                                        <li><a href="#destinations">Services</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="#contact">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 column mt-md-0 mt-4">
                                    <h3>Useful Links</h3>
                                    <ul class="footer-gd-16">
                                        <li><a href="#url">Destinations</a></li>
                                        <li><a href="#url">Our Branches</a></li>
                                        <li><a href="#url">Latest Media</a></li>
                                        <li><a href="#about-us">About Company</a></li>
                                        <li><a href="#url">Our Packages</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 column mt-md-0 mt-4">
                                    <h3>Our Services</h3>
                                    <ul class="footer-gd-16">
                                        <li><a href="#url">Privacy Policy</a></li>
                                        <li><a href="#url">Our Terms</a></li>
                                        <li><a href="#destinations">Services</a></li>
                                        <li><a href="landing-single.html">Landing Page</a></li>
                                        <li><a href="#url">Our Guides</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 column pl-lg-5 column4 mt-lg-0 mt-5">
                            <h3>Newsletter </h3>
                            <div class="end-column">
                                <h4>Get latest updates and offers.</h4>
                                <form action="#" class="subscribe" method="post">
                                    <input type="email" name="email" placeholder="Email Address" required="">
                                    <button type="submit">Go</button>
                                </form>
                                <p>Sign up for our latest news & articles. We won’t give you spam mails.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
                        <div class="columns text-lg-left text-center">
                            <p>&copy; 2020 Kamyab Travels. All rights reserved.Design by <a href="https://w3layouts.com/" target="_blank">
                                    W3Layouts</a>
                            </p>
                        </div>
                        <div class="columns-2 mt-lg-0 mt-3">
                            <ul class="social">
                                <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- move top -->
            <button onclick="topFunction()" id="movetop" title="Go to top">
                <span class="fa fa-angle-up"></span>
            </button>
            <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("movetop").style.display = "block";
                    } else {
                        document.getElementById("movetop").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
            <!-- //move top -->
            <script>
                $(function() {
                    $('.navbar-toggler').click(function() {
                        $('body').toggleClass('noscroll');
                    })
                });
            </script>
        </section>
        <!-- //footer -->
    </footer>
    <!-- Template JavaScript -->
    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme-change.js') }}"></script>
    <!--/slider-js-->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.zoomslider.min.js') }}"></script>
    <!--//slider-js-->
    <script src="{{ asset('frontend/assets/js/owl.carousel.js') }}"></script>
    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function() {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    736: {
                        items: 1,
                        nav: false
                    },
                    1: {
                        items: 1,
                        nav: false,
                        loop: true
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->
    <!-- stats number counter-->
    <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countup.js') }}"></script>
    <script>
        $('.counter').countUp();
    </script>
    <!-- //stats number counter -->

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->

    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"> -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageModalLabel">Add User Details: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="query-form" method="post" action="">
                    <div class="modal-body">
                        <div class="main-form-container">
                            <div class="row form-container form-1" data-count="0">
                                <div class="col-md-11">
                                    <div class="modal-form border-modal mt-3">
                                        <div class="border-modal passport-details" id="passport-details">
                                            <h5 class="passport-heading" id="packageModalLabel">Passport Details</h5>
                                            <input type="hidden" name="agent_id" id="agent_id" value="">
                                            <input type="hidden" name="agent_package_id" id="agent_package_id" value="">
                                            <input type="hidden" name="master_package_id" id="master_package_id" value="">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="name" class="col-form-label">Name:</label>
                                                    <input type="text" class="form-control" id="name" name="enquiry[0][name_as_per_passport]">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="passport" class="col-form-label">Passport No:</label>
                                                    <input type="text" class="form-control" id="passport" name="enquiry[0][passport_number]">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nationality" class="col-form-label">Nationality:</label>
                                                    <input type="text" class="form-control" id="nationality" name="enquiry[0][nationality]">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dob" class="col-form-label">Dob:</label>
                                                    <input type="date" class="form-control" id="dob" name="enquiry[0][dob]">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="place-of-birth" class="col-form-label">Place Of Birth:</label>
                                                    <input type="text" class="form-control" id="place-of-birth" name="enquiry[0][place_of_birth]">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="gender" class="col-form-label">Gender:</label>
                                                    <select name="enquiry[0][gender]" id="gender" class="form-control">
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="date-of-issue" class="col-form-label">Date Of Issue:</label>
                                                    <input type="date" class="form-control" id="date-of-issue" name="enquiry[0][passport_date_of_issue]">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="date-of-expiry" class="col-form-label">Date Of Expiry:</label>
                                                    <input type="date" class="form-control" id="date-of-expiry" name="enquiry[0][passport_date_of_expiry]">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="contact" class="col-form-label">Contact No.:</label>
                                                <input type="text" class="form-control" id="contact" name="enquiry[0][contact]">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email" class="col-form-label">Email:</label>
                                                <input type="email" class="form-control" id="email" name="enquiry[0][email]">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="address" class="col-form-label">Address:</label>
                                                <textarea class="form-control" id="address" name="enquiry[0][address]"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-1 minus-icon-div">
                                    <span class="fa fa-minus-circle fa-lg"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 add-icon-div btn btn-primary text-center mt-3">
                            <span class="fa fa-plus-circle fa-lg">Add one more passanger</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save-query-form">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script>
    $(document).ready(function() {

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // city dropdown open
        var citySettings = {
            "url": "api/get_city",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "encryption_key": "{{config('secrets.api_encryption_key')}}"
            }),
        };

        $.ajax(citySettings).done(function(response) {
            var options = "<option value=\"\">Destination</option>";
            if (response && response.city) {
                var city = response.city;
                city.forEach(data => {
                    var cityId = data.id;
                    var cityName = data.name;
                    options += `<option value="${cityName}" data-id="${cityId}" class="city-option">${cityName}</option>`;
                });
            }
            $("#city").html(options);
        });
        // city dropdown close
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // load default packages open

        var defaultPackageSettings = {
            "url": "api/get_popular_agents_packages",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "encryption_key": "{{config('secrets.api_encryption_key')}}"
            }),
        };

        $.ajax(defaultPackageSettings).done(function(response) {
            if (response && response.package_data) {
                if (response.package_data.length > 2) {
                    var packageHtml = "";
                    var i = 1;
                    response.package_data.forEach(data => {
                        var package_id = data.id;
                        var agent_id = data.agent_id;
                        var package_category = data.package_category;
                        var master_package_id = data.master_package_id;
                        var days = data.days;
                        var rate = data.rate;

                        // `<div class="col-sm-5 subject-img">
                        //         <img src="{{ asset('frontend/assets/images/g1.jpg') }}" class="img-fluid" alt="">
                        //     </div>`
                        packageHtml +=
                            `<div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="${package_id}" data-agent-id="${agent_id}" data-package-name="${package_category}" data-master-package-id=${master_package_id} id="hello-${i}">
                                <div class="subject-card-header p-4">
                                    <span class="card_title p-lg-4d-block">
                                        <div class="row align-items-center">
                                            <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                                   <h4>${package_category}</h4>
                                                <p>${days}</p>
                                                <div class="dst-btm">
                                                    <h6 class=""> Start From </h6>
                                                    <span>${rate}</span>
                                                </div>
                                                <p class="sub-para">Per person</p>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>`;
                    });

                    $("#package-container").html(packageHtml);
                } else {
                    console.log("Default data is not more than 2, so it can't be shown");
                }
            } else {
                console.log('default packageSettings errror')
            }
        });
        // load default packages close
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // show dynamic packages open
        $(document).on("change", "#city", function() {
            let cityName = $(this).val();
            let cityId = $(this).children("option:selected").attr("data-id");
            // let cityName = "Varanasi";
            // let cityId = 585;

            var packageSettings = {
                "url": "api/get_agents_packages",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                    "city_id": cityId,
                    "encryption_key": "{{config('secrets.api_encryption_key')}}"
                }),
            };

            $.ajax(packageSettings).done(function(response) {
                if (response && response.package_data) {
                    // Object.keys(response.package_data).forEach(key => {
                    var packageHtml = "";
                    var i = 1;
                    response.package_data.forEach(data => {
                        var package_id = data.id;
                        var agent_id = data.agent_id;
                        var package_category = data.package_category;
                        var master_package_id = data.master_package_id;
                        var days = data.days;
                        var rate = data.rate;

                        // `<div class="col-sm-5 subject-img">
                        //         <img src="{{ asset('frontend/assets/images/g1.jpg') }}" class="img-fluid" alt="">
                        //     </div>`
                        packageHtml +=
                            `<div class="col-lg-4 subject-card mt-lg-0 my-4 package-div" data-toggle="modal" data-target="#packageModal" data-package-id="${package_id}" data-agent-id="${agent_id}" data-package-name="${package_category}" data-master-package-id=${master_package_id} id="hello-${i}">
                                <div class="subject-card-header p-4">
                                    <span class="card_title p-lg-4d-block">
                                        <div class="row align-items-center">
                                            <div class="col-sm-12 subject-content mt-sm-0 mt-4">
                                                   <h4>${package_category}</h4>
                                                <p>${days}</p>
                                                <div class="dst-btm">
                                                    <h6 class=""> Start From </h6>
                                                    <span>${rate}</span>
                                                </div>
                                                <p class="sub-para">Per person</p>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>`;
                    });

                    $("#package-container").html(packageHtml);
                } else {
                    console.log('packageSettings errror')
                }

                let destinationsSection = $("#destinations");

                $("#package-heading").text("Popular Packages in " + cityName);

                $("html, body").animate({
                    scrollTop: destinationsSection.offset().top
                }, 0);
            });
        });
        // show dynamic packages close
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // query form modal submit open
        $(document).on("click", ".package-div", function() {
            var package_id = $(this).attr("data-package-id");
            var agent_id = $(this).attr("data-agent-id");
            var master_package_id = $(this).attr("data-master-package-id");
            // var package_name = $(this).attr("data-package-name");
            // var package_text = "Name: " + package_name + " ::: " + package_id + " ::: " + agent_id;
            // $("#packageModalLabel").text(package_text);

            $("#agent_id").val(agent_id);
            $("#agent_package_id").val(package_id);
            $("#master_package_id").val(master_package_id);
        });

        $(document).on("click", ".add-icon-div", function() {
            var count = $(".form-container:last").attr("data-count");
            var iCount = parseInt(count) + 1;
            var clonedForm = $(".form-container:last").clone();
            clonedForm.find(':input').val('');

            var formIndex = iCount;
            // Find all form controls in the cloned form and update their IDs
            clonedForm.find(':input').each(function(index, element) {
                var originalName = $(element).attr('name');
                var newName = originalName.replace(/\[\d+\]/g, '[' + formIndex + ']');

                $(element).attr({
                    'name': newName,
                    'id': newName,
                });

                // You can also update other attributes as needed
            });

            // Append the cloned form to the form container
            $(".main-form-container").append(clonedForm);

            $(".form-container:last").removeAttr("data-count");
            $(".form-container:last").attr("data-count", iCount);

            // Show minus icon if there is more than one form
            toggleMinusIcon();
        });

        $(document).on("click", ".fa-minus-circle", function() {
            $(this).closest(".form-container").remove();
            toggleMinusIcon();
        });

        // Function to show/hide the minus icon based on the number of forms
        function toggleMinusIcon() {
            var formCount = $(".main-form-container .form-container").length;

            if (formCount > 1) {
                $(".fa-minus-circle").show();
            } else {
                $(".fa-minus-circle").hide();
            }
        }

        // Initial setup: hide minus icon if there is only one form
        toggleMinusIcon();
        // query form modal submit close
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        // $(document).on("click", ".save-query-form", function() {
        $(document).on("submit", ".query-form", function(event) {
            event.preventDefault();

            var agent_id = $("#agent_id").val()
            var agent_package_id = $("#agent_package_id").val()
            var master_package_id = $("#master_package_id").val()
            // Collect form data
            var formData = $(".query-form").serializeArray();
            formData.push({
                name: "encryption_key",
                value: "{{config('secrets.api_encryption_key')}}"
            }, {
                name: "agent_id",
                value: agent_id
            }, {
                name: "agent_package_id",
                value: agent_package_id
            }, {
                name: "master_package_id",
                value: master_package_id
            }, );

            // Perform the AJAX request
            $(".save-query-form").text("Submitting...").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "api/save_enquiry", // Replace with your actual server endpoint
                data: formData,
                success: function(response) {
                    // Handle the success response
                    console.log("Form submitted successfully", response);
                    $(".close").click()
                    alert("Success")
                    $(".form-container").not(":first").remove();
                    var last_remaining_form = $(".form-container:last");
                    last_remaining_form.find(':input').val('');
                    $(".save-query-form").text("Submit").prop("disabled", false);

                    toggleMinusIcon();
                },
                error: function(error) {
                    // Handle the error response
                    console.error("Error submitting form", error);
                }
            });
        });

        //save enquiry form close

    })
</script>