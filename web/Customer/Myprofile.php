<?php
include("../Assets/Connection/Connection.php");

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
<form id="form1" name="form1" method="post" action="">
<?php
 $sel="select * from tbl_customer where customer_id='".$_SESSION["cid"]."'";
 $res=$Conn->query($sel);
 $row=$res->fetch_assoc();
 
?>
<h3 align="center">MyProfile</h3>
<br>
  <table width="200" border="0" align="center">
     <tr>
      <td colspan="2" align="center"><img src="../Assets/Files/Customer/<?php echo $row['customer_photo']?>" width="150" height="150"></td>
    </tr>
    <tr>
      <td>Name: &nbsp;</td>
      <td><?php echo $row['customer_name']?></td>
    </tr>
    <tr>
      <td>Address: &nbsp; &nbsp;</td>
      <td><?php echo $row['customer_address']?></td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><?php echo $row['customer_contact']?></td>
    </tr>
    <tr>
      <td>Email: &nbsp;</td>
      <td><?php echo $row['customer_email']?>
      </td>
    </tr>
   
  </table>
</form>
</body>

<?php
include("Foot.php");
ob_flush();
?>
</html>