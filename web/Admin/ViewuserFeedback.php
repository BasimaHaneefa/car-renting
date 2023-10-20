<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Feedback</title>
</head>

<body>
<?php 
ob_start();
include("Head.php");

?>
<br>
<form id="form1" name="form1" method="post" action="">
	<h3 align="center">View Feedback</h3>
  <table width="900" border="1" align="center">
    <tr  style="background-color:#0033c4;color:white">
    <th>SI NO.</th>
    <th>Feedback</th>
    <th>Date</th>
    <th>customer</th>
  </tr>
  <?php
  $i = 0;
  $selQry = "select * from tbl_feedback f inner join tbl_customer u on f.customer_id=u.customer_id ";
  $row = $Conn->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  $i++;
  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["feedback_content"]?></td>
    <td><?php echo $data["feedback_date"]?></td>
    <td><?php echo $data["customer_name"]?></td>
    
  </tr>
  <?php
  }
  ?>
</table>
</form>
</body>
<br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>