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

?>
<?php

if(isset($_POST["btn_submit"]))
{
	
	$current=$_POST['txt_current'];
	$new=$_POST['txt_new'];
	$repassword=$_POST['txt_re'];
	
	$selqry="select * from tbl_agent where agent_id='".$_SESSION['aid']."' ";
$data=$Conn->query($selqry);
$row=$data->fetch_assoc();
$Password=$row['agent_password'];
if($Password==$current)
{
	if($new==$repassword)
	{
	
	$upqry="update tbl_agent set agent_password='".$new."'where agent_id='".$_SESSION['aid']."'  ";
	if($Conn->query($upqry))
	{
?>
	<script>
	alert("Password Changed");
	window.location="ChangePassword.php";
	</script>
    <?php
}
	}
	else
{
?>
	<script>
	alert("Password mismatch");
	window.location="ChangePassword.php";
	</script>
    <?php
}
}
else
{
?>
	<script>
	alert("Current Password is invalid");
	window.location="ChangePassword.php";
	</script>
    <?php
}
}

?>
<br><br><br>
<form id="form1" name="form1" method="post" action="">
<h3 align="center">Change Password</h3>
  <table width="200" border="0" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_current"></label>
      <input type="text" name="txt_current" id="txt_current" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" /></td>
    </tr>
    <tr>
      <td>Re-Password</td>
      <td><label for="txt_re"></label>
      <input type="text" name="txt_re" id="txt_re" /></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Save" style="background-color:#240a5e;border:white;color:white;padding:5px 10px" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" style="background-color:#240a5e;border:white;color:white;padding:5px 10px"/></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>