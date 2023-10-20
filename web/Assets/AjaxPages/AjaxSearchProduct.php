<?php 
session_start();
include("../Connection/Connection.php");
?>
<?php

    if ($_GET["action"] != "") {


        $selBooking="select max(booking_id) as id from tbl_booking where customer_id='".$_SESSION["cid"]."'";
                        $rowBook=$Conn->query($selBooking);
                        $dataBook=$rowBook->fetch_assoc();   
                       
                        $selB="select *  from tbl_booking where booking_id='".$dataBook["id"]."'";
                        $rowB=$Conn->query($selB);
                        $dataB=$rowB->fetch_assoc();   
                       
                        $seldate="select DATEDIFF(booking_todate, booking_fromdate) AS date_difference  FROM tbl_booking where booking_id='".$dataBook["id"]."'";
                        $rowdate=$Conn->query($seldate);
                        $datadate=$rowdate->fetch_assoc(); 
                        $duration=$datadate["date_difference"];


        $sqlQry = "SELECT * from tbl_car c inner join tbl_brand b on c.brand_id=b.brand_id inner join tbl_seater s on s.seater_id=c.seater_id inner join tbl_agent a on a.agent_id=c.agent_id where a.place_id='".$dataB["pickup_point"]."'";
       $row = "SELECT count(*) as count from tbl_car c inner join tbl_brand b on c.brand_id=b.brand_id inner join tbl_seater s on s.seater_id=c.seater_id inner join tbl_agent a on a.agent_id=c.agent_id where a.place_id='".$dataB["pickup_point"]."' ";

        if ($_GET["brand"]!="") {

           $brand = $_GET["brand"];

            $sqlQry .= "AND c.brand_id IN(" . $brand . ")";
            $row .= "AND c.brand_id IN(" . $brand . ")";
        }
        if ($_GET["category"]!="") {

            $category = $_GET["category"];

            $sqlQry .= "AND s.seater_id IN(" . $category . ")";
            $row .= "AND s.seater_id IN(" . $category . ")";
        }
      
        $rs = $Conn->query($sqlQry);
        $rsr = $Conn->query($row);
        $rss=$rsr->fetch_assoc();
     
//Edited
  if ($rss["count"] > 0) {
            while ($rst=$rs->fetch_assoc()) {
				?>

 <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/vehicle/<?php echo $rst['car_photo']?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rst["car_name"] ?></h6>
                                    </div>
                                    <div class="card-body">
                                      <?php  
                                      $base=$rst["base_rate"];
                                      $amount=$base*$duration;
                                      
                                      
                                      ?>
                                        <h4 class="card-title text-danger" align="center">
                                            Rs. <?php echo $amount ?>/-
                                        </h4>
                                        <h6 class="card-title text-primary" align="center">
                                            Rs. <?php echo $rst["base_rate"] ?>/ day(Excess)
                                        </h6>
                                        <p align="center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fuel-pump" viewBox="0 0 16 16">
                                        <path d="M3 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-5Z"/>
                                        <path d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081v3.175a.5.5 0 0 1-.5.501H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm9 0a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v13h8V2Z"/>
                                        </svg> <?php echo $rst["car_fuel"] ?><br>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                        </svg> <?php echo $rst["car_mode"] ?><br>
                                         <img src="../Assets/Template/car-seat.png" width="20" height="20"><?php echo $rst["seater_count"] ?><br>   
                                          
                                        </p>
                                        <a href="BookNow.php?cid=<?php echo $rst["car_id"] ?>&&bid=<?php echo $dataBook["id"] ?>&&tamnt=<?php echo $amount ?>&&duration=<?php echo $duration ?>" class="btn btn-primary">Book Now</a>
                                   
                                        
                                    </div>
                                </div>
                            </div>
            </div>
<?php
            }
        } else {
            echo "<h4>Products Not Found!!!!</h4>";
        }
    }
?>