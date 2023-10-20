
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");

ob_start();
include("Head.php");
if(isset($_POST["btn_save"]))
{
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$upqry="update tbl_customer set customer_name='".$name."',customer_contact='".$contact."',customer_address='".$address."',customer_email='".$email."' where customer_id='".$_SESSION['cid']."'  ";
	$Conn->query($upqry);
	header("location:Editprofile.php");
	
	
}
$selqry="select * from tbl_customer where customer_id='".$_SESSION['cid']."' ";
$data=$Conn->query($selqry);
$row=$data->fetch_assoc();
?>

<form id="form1" name="form1" method="post" action="">
<h3 align="center">Edit Your Profile...</h3>
<br>
  <table width="200" border="0" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $row['customer_name']?>" />        </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $row['customer_email']?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row['customer_contact']?>" /></td>
    </tr>
    <tr>
       <td>Address</td>
      <td><textarea name="txt_address"><?php echo $row['customer_address']?></textarea></td>
    </tr>
    <tr>
       <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="submit"   style="background-color:#240a5e;border:white;color:white;padding:5px 10px"/>
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" style="background-color:#240a5e;border:white;color:white;padding:5px 10px" /></td>
    </tr>
  </table>
</form>
</body>
<br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>