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

if(isset($_POST['btn_save']))
{
$image=$_FILES['file_photo']['name'];
$path=$_FILES['file_photo']['tmp_name'];
move_uploaded_file($path,"../Assets/Files/Vehicle/".$image);



$insQry="insert into tbl_gallery(gallery_image,car_id)values('".$image."','".$_GET['gid']."')";
$Conn->query($insQry);

}
if(isset($_GET['did']))
{
$delQry="delete from tbl_gallery where gallery_id='".$_GET['did']."'";
$Conn->query($delQry);	
header("location:CarDetails.php");
}
?>
<br><br><br>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h3 align="center">Gallery</h3>
<table width="500" border="0" align="center">
  <tr>
    <td>Image</td>
    <td><label for="file_photo"></label>
    <input type="file" name="file_photo" id="file_photo" /></td>
  </tr>
  
  <tr>
    <td colspan=2  align="center"><input type="submit" name="btn_save" id="btn_save" value="save" style="background-color:#240a5e;border:white;color:white;padding:5px 10px"/>
    <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" style="background-color:#240a5e;border:white;color:white;padding:5px 10px"/></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="500" border="1" align="center">
  <tr>
    <th>SIno</th>
    <th>Car name</th>
    <th>Image</th>
    
    <th>Action</th>
  </tr>
  <?php
  $i=0;
  $selQry="select * from tbl_gallery  g inner join tbl_car v on v.car_id=g.car_id where v.car_id='".$_GET['gid']."'";
  $data=$Conn->query($selQry);
  while($row=$data->fetch_assoc())
  {
  	$i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['car_name'] ?></td>
    <td><img src="../Assets/Files/Vehicle/<?php echo $row['gallery_image'] ?>" width="100" height="100" /></td>

    <td><a href="AddGallery.php?did=<?php  echo $row['gallery_id']?>">Delete</a></td>
  </tr>
  <?php
  
  }
  ?>
</table>
<p>&nbsp;</p>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>