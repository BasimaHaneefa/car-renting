<!doctype html>
<html lang="en">

  <head>
    <title>Car Rent &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Assets/Template/Main/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Assets/Template/Main/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Assets/Template/Main/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../Assets/Template/Main/css/style.css">

  </head>
  
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <?php

include("../Assets/Connection/Connection.php");
include("SessionValidator.php");

?>  
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html">CarRent</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="Homepage.php" class="nav-link">Home</a></li>
                  <li><a href="CarDetails.php" class="nav-link">Car Details</a></li>
                  <li><a href="Viewcarbooking.php" class="nav-link">View Bookings</a></li>
                  <li><a href="Myprofile.php" class="nav-link">Myprofile</a></li>
                  <li><a href="Logout.php" class="nav-link">LogOut</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('../Assets/Template/Main/images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
          <h2 align="center" style="color:white"><b>Welcome <?php  echo $_SESSION["aname"] ?><b></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pt-0 pb-0 bg-light">
      <div class="container">
        <div class="row">
        
          <div class="col-12">
          <div class="col-lg-3">
          
</div>
            </div>
        </div>
      </div>
    </div>

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h3>Our Cars</h3>
            
              <a href="#" class="btn btn-primary custom-prev">Previous</a>
              <span class="mx-2">/</span>
              <a href="#" class="btn btn-primary custom-next">Next</a>
            </p>
          </div>
          <div class="col-lg-9">




            <div class="nonloop-block-13 owl-carousel">
                <?php
                    $selQry="select * from tbl_car c inner join tbl_brand b on c.brand_id=b.brand_id inner join tbl_seater s on s.seater_id=c.seater_id where c.agent_id='".$_SESSION["aid"]."'";
                    $rowsel=$Conn->query($selQry);
                    while($datasel=$rowsel->fetch_assoc())
                    {
                ?>
              <div class="item-1">
                <a href="#"><img src="../Assets/Files/Vehicle/<?php echo $datasel["car_photo"] ?>" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#"><?php echo $datasel["car_name"] ?></a></h3>
                  
                  <div class="rent-price"><span>Rs.<?php echo $datasel["base_rate"] ?>/</span>day</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Brand</span>
                      <span class="spec"><?php echo $datasel["brand_name"] ?></span>
                    </li>
                    <li>
                      <span>Seats</span>
                      <span class="spec"><?php echo $datasel["seater_count"] ?></span>
                    </li>
                    <li>
                      <span>Transmission</span>
                      <span class="spec"><?php echo $datasel["car_mode"] ?></span>
                    </li>
                    <li>
                      <span>Fuel</span>
                      <span class="spec"><?php echo $datasel["car_fuel"] ?></span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="Guest/Login.php" class="btn btn-primary">Rent Now</a>
                  </div>
                </div>
              </div>
                        <?php
                    }
                        ?>

              

            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="site-section section-3" style="background-image: url('../Assets/Template/Main/images/hero_2.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h2 class="text-white">Our services</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
              <div class="service-1-contents">
                <h3>Choose your car</h3>
                 </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
              <div class="service-1-contents">
                <h3>Drive your way</h3>
                 </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
              <div class="service-1-contents">
                <h3>On your finger tip</h3>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>How it works</h2>
         </div>
      </div>
      <div class="how-it-works d-flex">
        <div class="step">
          <span class="number"><span>01</span></span>
          <span class="caption">Time &amp; Place</span>
        </div>
        <div class="step">
          <span class="number"><span>02</span></span>
          <span class="caption">Car</span>
        </div>
        <div class="step">
          <span class="number"><span>03</span></span>
          <span class="caption">Details</span>
        </div>
        <div class="step">
          <span class="number"><span>04</span></span>
          <span class="caption">Checkout</span>
        </div>
        <div class="step">
          <span class="number"><span>05</span></span>
          <span class="caption">Done</span>
        </div>

      </div>
    </div>
    
    
    



    

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-4">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="../Assets/Template/Main/js/jquery-3.3.1.min.js"></script>
    <script src="../Assets/Template/Main/js/popper.min.js"></script>
    <script src="../Assets/Template/Main/js/bootstrap.min.js"></script>
    <script src="../Assets/Template/Main/js/owl.carousel.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.sticky.js"></script>
    <script src="../Assets/Template/Main/js/jquery.waypoints.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.animateNumber.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.fancybox.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.easing.1.3.js"></script>
    <script src="../Assets/Template/Main/js/bootstrap-datepicker.min.js"></script>
    <script src="../Assets/Template/Main/js/aos.js"></script>

    <script src="../Assets/Template/Main/js/main.js"></script>

  </body>

</html>

