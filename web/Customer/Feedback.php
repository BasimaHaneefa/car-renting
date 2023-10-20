<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<?php

include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_save"]))
{
	
	$Connt=$_POST["txt_feed"];
	$id=$_POST["txt_id"];
	if($id!="")
	{
		$upQry = "update tbl_feedback set feedback_content='".$Connt."' where feedback_id='".$id."'";
		if($Conn->query($upQry))
		{
			header("Location:Feedback.php");
		}
	}
	else
	{
	$insQry="insert into tbl_feedback(feedback_content,feedback_date,customer_id)values('".$Connt."',curdate(),'".$_SESSION["cid"]."')";
		if($Conn -> query($insQry))
		{
			?>
			<script>
			alert("Feedback was uploaded");
			windows.location="Feedback.php";
			</script>
			<?php
		}
	}
}
if(isset($_GET["did"]))
{
	$delqry="delete from tbl_feedback where feedback_id='".$_GET["did"]."'";
	if($Conn -> query($delqry))
	{
		header("Location:Feedback.php");
	}
}

$feedbackid = "";
$feedbackc = "";
if(isset($_GET["eid"]))
{
	$selfeedback = "select * from tbl_feedback where feedback_id='".$_GET["eid"]."'";	
	$rowfeedback = $Conn->query($selfeedback);
	$datafeedback = $rowfeedback->fetch_assoc();
	
	$feedbackid = $datafeedback["feedback_id"];
	$feedbackc = $datafeedback["feedback_content"];
	
}
?>


<form id="form1" name="form1" method="post" action="">
<h3 align="center">Send Your Feedback</h3>
  <table width="200" border="0" align="center">
    <tr>
      <td>Feedback</td>
      <td><textarea name="txt_feed" id="txt_feed" cols="20" rows="5"><?php echo $feedbackc?></textarea>
          <input type="hidden" name="txt_id" value="<?php echo $feedbackid ?>"/>
      </td>
    </tr>
    
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btn_save" value="Save" style="background-color:#240a5e;border:white;color:white;padding:5px 10px" />&nbsp;&nbsp;<input type="reset" name="btn_cancel" value="Cancel" style="background-color:#240a5e;border:white;color:white;padding:5px 10px" /></td>
    </tr>
  </table>
  <br /><br />
<table width="500" border="1" align="center">
  <tr>
    <th>SI NO.</th>
    <th>Feedback</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  <?php
  $i = 0;
  $selQry = "select * from tbl_feedback where customer_id='".$_SESSION["cid"]."'";
  $row = $Conn->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  $i++;
  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["feedback_content"]?></td>
    <td><?php echo $data["feedback_date"]?></td>
    <td><a href="Feedback.php?did=<?php echo $data["feedback_id"]?>">Delete</a>||<a href="Feedback.php?eid=<?php echo $data["feedback_id"]?>">Edit</a></td>
    
  </tr>
  <?php
  }
  ?>
</table>
</form>
</body>
<br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>