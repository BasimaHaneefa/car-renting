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
if(isset($_POST["btn_save"]))
{
  $brand=$_POST["sel_brand"];
  $car=$_POST["txt_name"];
  $fuel=$_POST["fuel"];
  $mode=$_POST["mode"];
  $seater=$_POST["Seater"];
  $base=$_POST["txt_base"];
  

  $image=$_FILES["fileimage"]["name"];
  $path=$_FILES["fileimage"]["tmp_name"];
  move_uploaded_file($path,"../Assets/Files/Vehicle/".$image);

  $insQry="insert into tbl_car(seater_id,agent_id,car_name,car_fuel,base_rate,car_mode,car_photo,brand_id) values('".$seater."','".$_SESSION["aid"]."','".$car."','".$fuel."','".$base."','".$mode."','".$image."','".$brand."')";
  if($Conn->query($insQry))
		{
			?>	
				<script>
				alert("data inserted!!");
				window.location="CarDetails.php";
				</script>
   			 <?php
    	}


}

if(isset($_GET['did']))
{
$delQry="delete from tbl_car where car_id='".$_GET['did']."'";
$Conn->query($delQry);
	header("location:CarDetails.php");
	
}
?>
<br><br><br>
    <form action="" enctype="multipart/form-data" method="post">
    <h3 align="center">Add your cars</h3>
      <table border=0 width="500" align="center">
        <tr>
          <td>Brand</td>
          <td><select name="sel_brand" id="sel_brand">
            <option>Select Brand</option>
            <?php  
            $selB="select * from tbl_brand";
            $rowB=$Conn->query($selB);
            while($dataB=$rowB->fetch_assoc())
            {
              ?>
              <option value="<?php echo $dataB["brand_id"] ?>"><?php echo $dataB["brand_name"] ?></option>
              <?php
            }
            ?>
          </select></td>
        </tr>
        <tr>
          <td>Image</td>
        <td><input type="file" name="fileimage" id=""></td>
      </tr>
        <tr>
          <td>Car Name</td>
          <td><input type="text" name="txt_name" id=""></td>
        </tr>
        <tr>
          <td>Fuel</td>
          <td><input type="radio" name="fuel" id="fuel" value="Petrol">Petrol
          <input type="radio" name="fuel" id="fuel" value="Diesel">Diesel
          <input type="radio" name="fuel" id="fuel" value="Electric">Electric</td>
        </tr>
        <tr>
          <td>Mode</td>
          <td><input type="radio" name="mode" id="mode" value="Manual">Manual
          <input type="radio" name="mode" id="mode" value="Automatic">Automatic</td>
        </tr>
        <tr>
        <td>Seater</td>
          <td><select name="Seater" id="Seater">
            <option>Select Seater</option>
            <?php  
            $selS="select * from tbl_seater";
            $rowS=$Conn->query($selS);
            while($dataS=$rowS->fetch_assoc())
            {
              ?>
              <option value="<?php echo $dataS["seater_id"] ?>"><?php echo $dataS["seater_count"] ?></option>
              <?php
            }
            ?>
          </select></td>
        </tr>
        <tr>
          <td>Base Rate per Day</td>
          <td><input type="text" name="txt_base" id=""></td>
        </tr>
        
        <tr>
          <td colspan=2 align="center"><input type="submit" name="btn_save" id="btn_save" value="Save"  style="background-color:#240a5e;border:white;color:white;padding:5px 10px"/>
          <input type="reset" name="btn_can" id="btn_can" value="Cancel"  style="background-color:#240a5e;border:white;color:white;padding:5px 10px" /></td>
        </tr>
      </table>
    </form>
  <p>&nbsp;</p>
  <table width="1000" border="1" align="center">
    <tr>
      <th>Sl.no</th>
      <th>Brand</th>
      <th>Photo</th>
      <th>Car name</th>
      <th>Seater</th>
      <th>Fuel</th>
      <th>Mode</th>
      <th>Base Rate per day</th>
      <th>Action</th>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_car c inner join tbl_seater s on s.seater_id=c.seater_id inner join tbl_brand b on b.brand_id=c.brand_id where agent_id='".$_SESSION['aid']."'";
	$data=$Conn->query($selQry);
while($row=$data->fetch_assoc())
{
	$i++;
	?>
   <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['brand_name']?></td>
      <td><img src="../Assets/Files/vehicle/<?php echo $row['car_photo']?>" width="100" height="100" /></td>
      <td><?php echo $row['car_name'] ?></td>
      <td><?php echo $row['seater_count'] ?></td>
      <td><?php echo $row['car_fuel'] ?></td>
      <td><?php echo $row['car_mode'] ?></td>
      <td>Rs.<?php echo $row['base_rate'] ?></td>
      <td><a href="CarDetails.php?did=<?php echo $row['car_id'] ?>">Delete</a>||<a href="AddGallery.php?gid=<?php echo $row['car_id'] ?>">Add Gallery</a></td>
    </tr>
   <?php
}
   ?>
  </table>
  <?php
include("Foot.php");
ob_flush();
?>


</body>
</html>