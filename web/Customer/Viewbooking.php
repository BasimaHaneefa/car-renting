<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
include("../Assets/Connection/Connection.php");

ob_start();
include("Head.php");

if(isset($_GET["bid"]))
{
   $upQry="update tbl_booking set booking_status=0 where booking_id='".$_GET["bid"]."'";
   if($Conn->query($upQry))
   {
    $upQ="update tbl_car set car_status=0 where car_id='".$_GET["cid"]."'";
    $Conn->query($upQry);
    header("location:Viewbooking.php");

   }
}
?>
<h3 align="center">View Your Bookings...</h3>
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
      $selQry="select * from tbl_booking b inner join tbl_car c on c.car_id=b.car_id inner join tbl_seater s on s.seater_id=c.seater_id inner join tbl_place p on p.place_id=b.pickup_point and p.place_id=b.drop_point inner join tbl_district d on d.district_id=p.district_id inner join tbl_agent a on a.agent_id=c.agent_id where b.customer_id='".$_SESSION["cid"]."' ";
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
        <td><?php  echo $data["agent_name"] ?></td>
        <td><?php  echo $data["agent_contact"] ?></td>
        <td><?php
        if($data["booking_status"]==1)
        {
           echo "Booked";
           ?>
           <a href="Viewbooking.php?cid=<?php echo $data["car_id"] ?>&&bid=<?php echo $data["booking_id"] ?>">Cancel</a>
             <?php
   
        }
        else  if($data["booking_status"]==2)
        {
           echo "Picked Up";
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
<br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>