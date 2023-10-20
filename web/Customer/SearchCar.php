<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
       
        <title> Search Car</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
        
        <style>
            .custom-alert-box{
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
.search-main{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}
.search-bar{
    display: flex;
    flex-direction: row;
    gap: 2rem;
}
.search-column{
    display: flex;
    flex-direction: column;
    gap:1rem;
}
    </style>
    </head>
    <body>
    <?php
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_GET["cid"]))
{
    $upQry="update tbl_booking set booking_date=curdate(),car_id='".$_GET["cid"]."',total_amount='".$_GET["tamnt"]."', booking_status=1 ,booking_duration='".$_GET["duration"]."'  where booking_id='".$_GET["bid"]."' ";
    if($Conn->query($upQry))
    {
        $upQ="update tbl_car set car_status=1 where car_id='".$_GET["cid"]."'";
        if($Conn->query($upQ))
        {
            ?>	
				<script>
				alert("Successfully Booked");
				window.location="Homepage.php";
				</script>
   			 <?php
        }
    }


}
?>

      <a href="Homepage.php">Home</a> 
       
        <div class="container-fluid">
          
            <div class="row">
              
                <div class="col-lg-3">
                  
                    <h5>Filter Car</h5>
                    <hr>
                    
                    <h6 class="text-info"> Select Brand</h6>
                    <ul class="list-group">
                        <?php  
                             $selcat = "SELECT * from tbl_brand";
                           $row=$Conn->query($selcat);
						   while($data=$row->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?php echo $data["brand_id"]?>" id="brand"><?php echo $data["brand_name"] ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <h6 class="text-info"> Select Seater</h6>
                    <ul class="list-group">
                       
                            <?php
							$selsub="select * from tbl_seater";
							$rows=$Conn->query($selsub);
							while($datas=$rows->fetch_assoc())
                            {
                            
                            ?>
                             <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input value="<?php echo $datas["seater_id"] ?>" id="category" type="checkbox" class="form-check-input product_check"><?php echo $datas["seater_count"] ?>
                                </label>
                            </div>
                            <?php
                            }
                            ?>
                        </li>
                       
                    </ul>
                   
                </div>
                <div class="col-lg-9">
                <form action="" method="post">
    <div class="search-main">
        <div class="search-bar" >
            <?php
             $selBooking="select max(booking_id) as id from tbl_booking where customer_id='".$_SESSION["cid"]."'";
             $rowBook=$Conn->query($selBooking);
             $dataBook=$rowBook->fetch_assoc();   
            
             $selB="SELECT
             B.*,
             P1.place_name AS pickup_place_name,
             D1.district_name AS pickup_district_name,
             P2.place_name AS drop_place_name,
             D2.district_name AS drop_district_name
         FROM
             tbl_booking AS B
         INNER JOIN
             tbl_place AS P1 ON B.pickup_point = P1.place_id
         INNER JOIN
             tbl_district AS D1 ON P1.district_id = D1.district_id
         INNER JOIN
             tbl_place AS P2 ON B.drop_point = P2.place_id
         INNER JOIN
             tbl_district AS D2 ON P2.district_id = D2.district_id where booking_id='".$dataBook["id"]."'";
             $rowB=$Conn->query($selB);
             $dataB=$rowB->fetch_assoc();   
            
             $seldate="select DATEDIFF(booking_todate, booking_fromdate) AS date_difference  FROM tbl_booking where booking_id='".$dataBook["id"]."'";
             $rowdate=$Conn->query($seldate);
             $datadate=$rowdate->fetch_assoc(); 
             $duration=$datadate["date_difference"];
            ?>
        <div class="search-column">
        <h4 align="center">Pickup point </h4><br>
        <input type="text" name="txt_pick" id="" value="<?php  echo $dataB["pickup_district_name"] ?>" readonly>
     
        <input type="text" name="txt_pick" id="" value="<?php  echo $dataB["pickup_place_name"] ?>" readonly>
       
        </div>
        <div class="search-column">
    <h4 align="center">Pickup Date & Time </h4><br>
    <input type="text" name="txt_pick" id="" value="<?php  echo $dataB["booking_fromdate"] ?>" readonly>
   <input type="time" name="pick_time" id="pick_time" value="<?php  echo $dataB["pickup_time"] ?>" readonly>
   </div>
        <div class="search-column">
    <h4 align="center">Dropoff point </h4><br>
    <input type="text" name="txt_pick" id="" value="<?php  echo $dataB["drop_district_name"] ?>" readonly>
     
     <input type="text" name="txt_pick" id="" value="<?php  echo $dataB["drop_place_name"] ?>" readonly>
      </div>
        <div class="search-column">
    <h4 align="center">Dropoff Date </h4><br>
    <input type="date" name="drop_date" id="drop_date" value="<?php  echo $dataB["booking_todate"] ?>" readonly>
        </div>
        </div>
       <div> 
       <h5 align="center">Total Duration </h5>

    <input type="text" value="<?php  echo $duration ?> days" name="" readonly>
        </div>
        </div>

</form>
                    <h5 class="text-center" id="textChange">All Products</h5>
                   
                  
                    <div class="text-center">
                        <img src="../assets/Files/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">

                        <?php
                       


                        $selProduct = "SELECT * from tbl_car c inner join tbl_brand b on c.brand_id=b.brand_id inner join tbl_seater s on s.seater_id=c.seater_id inner join tbl_agent a on a.agent_id=c.agent_id where a.place_id='".$dataB["pickup_point"]."'";
                            $rowp=$Conn->query($selProduct);
							while($datap=$rowp->fetch_assoc()) {
                        ?>

                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/vehicle/<?php echo $datap['car_photo']?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $datap["car_name"] ?></h6>
                                    </div>
                                    <div class="card-body">
                                      <?php  
                                      $base=$datap["base_rate"];
                                      $amount=$base*$duration;
                                      
                                      
                                      ?>
                                        <h4 class="card-title text-danger" align="center">
                                            Rs. <?php echo $amount ?>/-
                                        </h4>
                                        <h6 class="card-title text-primary" align="center">
                                            Rs. <?php echo $datap["base_rate"] ?>/ day(Excess)
                                        </h6>
                                        <p align="center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fuel-pump" viewBox="0 0 16 16">
                                        <path d="M3 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-5Z"/>
                                        <path d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081v3.175a.5.5 0 0 1-.5.501H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm9 0a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v13h8V2Z"/>
                                        </svg> <?php echo $datap["car_fuel"] ?><br>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                        </svg> <?php echo $datap["car_mode"] ?><br>
                                         <img src="../Assets/Template/car-seat.png" width="20" height="20"><?php echo $datap["seater_count"] ?><br>   
                                          
                                        </p>
                                        <?php
                                            if($datap["car_status"]==0)
                                          {  
                                        ?>
                                    <a href="SearchCar.php?cid=<?php echo $datap["car_id"] ?>&&bid=<?php echo $dataBook["id"] ?>&&tamnt=<?php echo $amount ?>&&duration=<?php echo $duration ?>" class="btn btn-primary">Book Now</a>
                                        <?php
                                          }else  if($datap["car_status"]==1)
                                          {  
                                                    echo "SOLD OUT!!!</p>";

                                          }
                                        ?>
                                    </div>
                                    
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
                    <script src="../assets/Jquery/jQuery.js"></script>
        <script>

           

            $(document).ready(function() {
              //  alert("hello");

                $(".product_check").click(function() {
                    $("#loder").show();
                   // 
                    var action = 'data';
                    var brand = get_filter_text('brand');
                    var category = get_filter_text('category');
                   // var material = get_filter_text('maerial');
                   // var gender = get_filter_text('gender');
                   // var size = get_filter_text('size');
                   // var color = get_filter_text('color');


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action + "&brand=" + brand + "&category=" + category,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                });



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            });
        </script>
    </body>
</html>

