<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
include("Head.php");

if(isset($_GET["aid"]))
{
	$upqry="update tbl_agent set agent_status=1 where agent_id='".$_GET["aid"]."' ";
	$Conn->query($upqry);
	header("location:rejectagency.php");

}

?>
<br>
<table width="900" border="1"align="center">
<h3 align="center" >Seater</h3>
    <tr style="background-color:#0033c4;color:white">
      <th>SIno</th>
      <th>Agent name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Address</th>
      <th>District</th>
      <th>Place</th>
      <th>Agent photo</th>
      <th>Proof</th>
      <th><p>Action</p></th>
    </tr>
          <?php
	$i=0;
	$selQry= "select * from tbl_agent a inner join tbl_place p on a.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where agent_status=2";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	
	?>

    <tr>
      <td><?php echo $i ?></td>
    <td><?php echo $data["agent_name"]?></td>
    <td><?php echo $data["agent_email"]?></td>
    <td><?php echo $data["agent_contact"]?></td>
    <td><?php echo $data["agent_address"]?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"]?></td>
    <td><img src="../Assets/Files/Agent/<?php echo $data["agent_photo"]?>" width="100" height="100"/></td>
    <td><a href="../Assets/Files/Agent/<?php echo $data["agent_proof"]?>" download >Download</a></td>
    <td><a href="rejectagency.php?aid=<?php echo $data["agent_id"] ?>">Accept</a></td>

    </tr>
    <?php
	}
	?>
    
  </table>

</body>
<br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>