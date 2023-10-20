<?php 
include("../Connection/Connection.php");
session_start();
$selCar="select * from tbl_vehicle v inner join tbl_vehicletype vt on vt.vehicletype_id=v.vehicletype_id where agent_id='".$_SESSION['cid']."' and v.vehicletype_id='".$_GET['did']."'";
$data=$Conn->query($selCar);
while($row=$data->fetch_assoc())
{
?>
<table width="200" border="1">
  <tr>
    <td><p><img src="../Assets/Files/Vehicle/<?php echo $row['vehicle_photo']?>"width="150" height="150"><br />
     <?php echo $row['vehicletype_name']?><br />
    <?php echo $row['vehicle_model']?><br />
     <?php echo $row['vehicle_details']?><br />
      <?php echo $row['rent_rate']?><br />
    <a href="BookNow.php?vid=<?php echo $row['vehicle_id']?>">Book Now</a>
    
    </p></td>
  </tr>
</table>
<?php

}
?>