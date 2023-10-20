<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Reply</title>
</head>

<body>
<?php
ob_start();
include("Head.php");

if(isset($_POST["btn_save"]))
{
	    $reply=$_POST["txt_rep"];
	
	    $upQry = "update tbl_complaint set complaint_reply='".$reply."', complaint_status=1 where complaint_id='".$_GET['cid']."'";
		if($Conn->query($upQry))
		{
			?>
			<script>
			alert("Replied");
			windows.location="ViewuserComplaint.php";
			</script>
			<?php
		}
}
?>
 <br>
<form id="form1" name="form1" method="post" action="">
	<h3 align="center">Reply</h3>
  <table width="200" border="0" align="center">
    <tr>
      <td>Reply</td>
      <td><label for="txt_rep"></label>
      <textarea name="txt_rep" id="txt_rep" cols="20" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" value="Save" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"/>&nbsp;&nbsp;
	  <input type="reset" name="btn_cancel" value="Cancel" style="background-color:#0033c4;border:white;color:white;padding:5px 10px" /></td>
     
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
