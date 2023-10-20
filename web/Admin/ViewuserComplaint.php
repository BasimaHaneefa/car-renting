<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaint</title>
</head>

<body>
<?php 
ob_start();
include("Head.php");
?>
 <br>
<form id="form1" name="form1" method="post" action="">
	<h3 align="center">View New Complaint</h3>
  <table width="900" border="1" align="center">
    <tr  style="background-color:#0033c4;color:white">
      <th>Sl.No</th>
      <th>Title</th>
      <th>Content</th>
      <th>Date</th>
      <th>customername</th>
      <th>Action</th>
    </tr>
    <?php
  $i = 0;
  $selQry = "select * from tbl_complaint c inner join tbl_customer u on c.customer_id=u.customer_id where complaint_status=0";
  $row =$Conn->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  $i++;
  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["complaint_title"]?></td>
    <td><?php echo $data["complaint_content"]?></td>
    <td><?php echo $data["complaint_date"]?></td>
    <td><?php echo $data["customer_name"]?></td>   
    <td><a href="Reply.php?cid=<?php echo $data["complaint_id"]?>">Reply</a></td>
    
  </tr>
  <?php
  }
  ?>
  </table>
  <br /><br />
  <table width="900" border="1" align="center">
  <h3 align="center" >View Replied Complaints</h3>
    <tr style="background-color:#0033c4;color:white">
      <th>Sl.No</th>
      <th>Title</th>
      <th>Content</th>
      <th>Date</th>
      <th>Reply</th>
      <th>customername</th>
    </tr>
    <?php
  $i = 0;
  $selQry = "select * from tbl_complaint c inner join tbl_customer u on c.customer_id=u.customer_id where complaint_status=1";
  $row =$Conn->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  $i++;
  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["complaint_title"]?></td>
    <td><?php echo $data["complaint_content"]?></td>
    <td><?php echo $data["complaint_date"]?></td>
    <td><?php echo $data["complaint_reply"]?></td>
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