<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Rent4u</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../Assets/Template/user/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Assets/Template/user/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../Assets/Template/user/css/responsive.css" rel="stylesheet" />
</head>
<?php
include("SessionValidator.php");
?>
<body>

  <div class="hero_area" >
    <!-- header section strats -->
    <header class="header_section" style="background-color:#240a5e">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span style="color:white">
              CARRENT
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="user_option">
              <a href="Logout.php">
                LogOut
              </a>
            </div>
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="Homepage.php">Home</a>
                <a href="Myprofile.php">MyProfile</a>
                <a href="Editprofile.php">Editprofile</a>
                <a href="ChangePassword.php">ChangePassword</a>
                <a href="Viewbooking.php">Viewbooking</a>
                <a href="Complaint.php">Complaint</a>
                <a href="Feedback.php">Feedback</a>
                <a href="Logout.php">LogOut</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
        <br><br><br><br>