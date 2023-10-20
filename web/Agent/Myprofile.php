<?php
ob_start();
include("Head.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<br><br>
<form id="form1" name="form1" method="post" action="">
<?php
 $sel="select * from tbl_agent where agent_id='".$_SESSION["aid"]."'";
 $res=$Conn->query($sel);
 $row=$res->fetch_assoc();
 
?>
<h3  align="center">My Profile</h3>
  <table width="200" border="0" align="center">
    <tr>
      <td colspan="2" align="center"><img src="../Assets/Files/Agent/<?php echo $row['agent_photo']?>" width="150" height="150"></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><?php echo $row['agent_name']?></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $row['agent_address']?></td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><?php echo $row['agent_contact']?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $row['agent_email']?>
      </td>
    </tr>
    <tr>
      <td colspan=2 align="center"><a href="Editprofile.php">Edit Profile</a>|| <a href="ChangePassword.php">Change Password</a></td>
</tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>