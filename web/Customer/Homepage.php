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

<body>
<?php
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");

if(isset($_POST["btn_search"]))
{

    $pickplace=$_POST["sel_place"];
    $pickdate=$_POST["pick_date"];
    $picktime=$_POST["pick_time"];
    $dropplace=$_POST["sel_pla"];
    $dropdate=$_POST["drop_date"];

    $insQry="insert into tbl_booking(pickup_point,booking_fromdate,pickup_time,drop_point,booking_todate,customer_id)values('$pickplace','$pickdate','$picktime','$dropplace','$dropdate','".$_SESSION["cid"]."')";
    $Conn->query($insQry);
    header("location:SearchCar.php");
}


?>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
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
      <div class="slider_container">
        <div class="img-box">
          <img src="../Assets/Template/user/images/hero-img.jpg" alt="">
        </div>
        <div class="detail_container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="detail-box">
                  <h1>
                    Welcome <br>
                    To <br>
                    Car Rental
                  </h1>
                 
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                <h1>
                    Welcome <br>
                    To <br>
                    Car Rental
                  </h1>
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                <h1>
                    Welcome <br>
                    To <br>
                    Car Rental
                  </h1>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <!-- book section -->
  <section class="book_section">
    <div class="form_container">
      <form action="" method="post">
        <div class="form-row">
          <div class="col-lg-8">
            <div class="form-row">
              <div class="col-md-6">
                <label for="parkingName">Pick Up Locaion <span style="color:red">*</span></label>
                <select name="sel_dis" id="sel_dis" onchange="getplace(this.value)" class="form-control" required>
                <option>&#x1F4CD; Select Pickup District</option> 
                <?php
		   $selqry1="select * from tbl_district";
		   $result2=$Conn->query($selqry1);
		   while($row1=$result2->fetch_assoc())
		   {
			   ?>
               <option value="<?php  echo ($row1['district_id']);?>"><?php  echo ($row1['district_name']);?></option>
               <?php
		   }
		   ?>
      </select>
      <select name="sel_place" id="sel_place" class="form-control" required>
       <option>&#x1F4CD; Select Pickup city</option>
      </select>
              </div>
              <div class="col-md-6">
                <label for="parkingNumber">Drop Location <span style="color:red">*</span></label>
                <select name="sel_loc" id="sel_loc" class="form-control" onchange="getpla(this.value)" required>
            <option>&#x1F4CD; Select Dropoff District</option> <!-- Unicode for location icon -->
            <?php
		   $selqry="select * from tbl_district";
		   $result1=$Conn->query($selqry);
		   while($row=$result1->fetch_assoc())
		   {
			   ?>
               <option value="<?php  echo ($row['district_id']);?>"><?php  echo ($row['district_name']);?></option>
               <?php
		   }
		   ?>
      </select>
     
       <select name="sel_pla" id="sel_pla" class="form-control" required>
       <option>&#x1F4CD; Select Dropoff city</option>
      </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="parkingName">PickUp Date & Time <span style="color:red">*</span></label>
                <input type="date" name="pick_date" class="form-control" id="pick_date" required>
                <input type="time" name="pick_time" class="form-control" id="pick_time" required>
              </div>
              <div class="col-md-6">
                <label for="parkingNumber">Dropoff Date <span style="color:red">*</span></label>
                <input type="date" name="drop_date" id="drop_date"  class="form-control"required>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="btn-container">
              <button type="submit" name="btn_search" class="">
                Search
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
    <div class="img-box">
      <img src="../Assets/Template/user/images/book-car.png" alt="">
    </div>
  </section>

  <!-- end book section -->


  
  <!-- us section -->

  <section class="us_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          Why choose Us
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the
        </p>
      </div>
    </div>
    <div class="us_container layout_padding2">
      <div class="content_box">
        <div class="box">
          <div class="img-box">
            <img src="../Assets/Template/user/images/u-1.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Low Rent
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="../Assets/Template/user/images/u-2.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Fast Car
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="../Assets/Template/user/images/u-3.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Safe Car
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="../Assets/Template/user/images/u-4.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Quick Support
            </h5>
          </div>
        </div>
      </div>
      
    </div>
  </section>

  <!-- end us section -->

 
  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      Copyright &copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="../Assets/Template/user/js/jquery-3.4.1.min.js"></script>
  <script src="../Assets/Template/user/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="../Assets/Template/user/js/custom.js"></script>


</body>

</html>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getplace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#sel_place").html(html);
	  }
	});
}
function getpla(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#sel_pla").html(html);
	  }
	});
}
</script>