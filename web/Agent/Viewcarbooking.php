<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
ob_start();
include("Head.php");

if(isset($_GET["bid"]))
{
  $currentDate = date("Y-m-d");
  $selQ="select * from tbl_booking where booking_id='".$_GET["bid"]."'";
  $rows=$Conn->query($selQ);
  $datas=$rows->fetch_assoc();

  $pickdate=$datas["booking_fromdate"];

  // Calculate date difference in seconds
  $timestamp1 = strtotime($pickdate);
  $timestamp2 = strtotime($currentDate);
  $dateDifference = abs($timestamp2 - $timestamp1); // Absolute value to handle date1 > date2
  
  // Calculate date difference in days
  $daysDifference = floor($dateDifference / (60 * 60 * 24));
  //echo $daysDifference;

  if($datas["booking_duration"]>$daysDifference)
  {

    $selCar="select base_rate from tbl_car where car_id='".$datas["car_id"]."'";
    $rowCar=$Conn->query($selCar);
    $dataCar=$rowCar->fetch_assoc();

    $baserate=$dataCar["base_rate"];

    $payingamount=$baserate+$baserate*$daysDifference;

    $upQr="update tbl_booking set booking_status=3,paying_amount='".$payingamount."' where booking_id='".$_GET["bid"]."'";
    if($Conn->query($upQr))
    {
      $up="update tbl_car set car_status=0 where car_id='".$_GET["cid"]."'";
      $Conn->query($up);
      header("location:Viewcarbooking.php");
    }


  }
  else{
   
    $totalamnt=$datas["total_amount"];
    $upQ="update tbl_booking set booking_status=3,paying_amount='".$totalamnt."' where booking_id='".$_GET["bid"]."'";
    if($Conn->query($upQ))
    {
      $up1="update tbl_car set car_status=0 where car_id='".$_GET["cid"]."'";
      $Conn->query($up1);
      header("location:Viewcarbooking.php");
    }

  }


}
if(isset($_GET["pid"]))
{

  $upQry="update tbl_booking set booking_status=2 where booking_id='".$_GET["pid"]."'";
  $Conn->query($upQry);
  header("location:Viewcarbooking.php");
}
?>
<br><br><br>
<h3 align="center">View Bookings</h3>
  <table border=1 align="center" width="1100">
    <tr>
      <th>Sl.no</th>
      <th>Pickup Date</th>
      <th>Pickup Time</th>
      <th>Pickup place</th>
      <th>Dropoff Date</th>
      <th>Dropoff place</th>
      <th>Total Amount</th>
      <th>Car name</th>
      <th>Booking Date</th>
      <th>Agency Name</th>
      <th>Agency Contact</th>
      <th>Status</th>
    </tr>
    <?php  
    $i=0;
      $selQry="select * from tbl_booking b inner join tbl_car c on c.car_id=b.car_id inner join tbl_seater s on s.seater_id=c.seater_id inner join tbl_place p on p.place_id=b.pickup_point and p.place_id=b.drop_point inner join tbl_district d on d.district_id=p.district_id inner join tbl_customer a on a.customer_id=b.customer_id where c.agent_id='".$_SESSION["aid"]."' ";
      $row=$Conn->query($selQry);
      while($data=$row->fetch_assoc())
      {
        $i++;
        ?>
        <td><?php  echo $i  ?></td>
        <td><?php  echo $data["booking_fromdate"] ?></td>
        <td><?php  echo $data["pickup_time"] ?></td>
        <td><?php  echo $data["place_name"] ?></td>
        <td><?php  echo $data["booking_todate"] ?></td>
        <td><?php  echo $data["place_name"] ?></td>
        <td><?php  echo $data["total_amount"] ?></td>
        <td><?php  echo $data["car_name"] ?></td>
        <td><?php  echo $data["booking_date"] ?></td>
        <td><?php  echo $data["customer_name"] ?></td>
        <td><?php  echo $data["customer_contact"] ?></td>
        <td><?php
        if($data["booking_status"]==1)
        {
           echo "Booked";
           ?>
           <a href="Viewcarbooking.php?pid=<?php echo $data["booking_id"] ?>">Picked up</a>
             <?php
   
        }
        else  if($data["booking_status"]==2)
        {
           echo "Picked Up";
           ?>
           <a href="Viewcarbooking.php?cid=<?php echo $data["car_id"] ?>&&bid=<?php echo $data["booking_id"] ?>">Dropped off</a>
             <?php
        }else  if($data["booking_status"]==3)
        {
           echo "Dropped ";
           if($data["payment_status"]==0)
           {
           ?>
           <a href="Payment.php?bid=<?php echo $data["booking_id"] ?> ">Pay Now</a>
            <?php
           }else{
            echo "Rs.".$data["paying_amount"]."Paid";
           }
        }
      
        
        ?>
        </td>

      <?php
      }
    ?>
    <tr></tr>
  </table>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>