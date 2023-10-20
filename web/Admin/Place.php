<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carrenting::Place</title>
</head>

<body>
<?php
ob_start();
include("Head.php");
if(isset($_POST["btn_save"]))
{
	$district=$_POST["txt_dis"];
	$Place=$_POST["txt_place"];

$insQry="insert into tbl_place(place_name,district_id)values('".$Place."','".$district."')";
		if($Conn->query($insQry))
		{
			?>	
				<script>
				alert("data inserted!!");
				window.location="place.php";
				</script>
   			 <?php
    	}
}
if(isset($_GET["did"]))
{
	$delQry = "delete from tbl_place where place_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
		header("Location:place.php");
	}
}

$placeid = "";
$placename = "";
if(isset($_GET["eid"]))
{
	$selplace = "select * from tbl_place where place_id='".$_GET["eid"]."'";
	$rowplace = $Conn->query($seldis);
	$dataplace = $rowdis->fetch_assoc();
	
	$placeid = $dataplace["place_id"];
	$placename = $dataplace["place_name"];
	
}

?>
<br>
<form id="form1" name="form1" method="post" action="">
<h3 align="center">Place</h3>
  <table width="200" border="0" align="center">
    <tr>
      <td>District</td>
      <td><label for="txt_dis"></label>
        <label for="txt_dis2"></label>
        <select name="txt_dis" id="txt_dis2" required>
        <option>Select</option>
        <?php
		
		$selqry="select * from tbl_district";
		$row=$Conn->query($selqry);
		while($data=$row->fetch_assoc())
		{
			?>
            
            <option value="<?php echo $data["district_id"] ?>"><?php  echo $data["district_name"]; ?></option>
            
          <?php  
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" required/></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Save" style="background-color:#0033c4;border:white;color:white;padding:5px 10px" />
    <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"/></td>
    </tr>
  </table>
  <br><br>
  <table width="500" border="1"  align="center">
    <tr style="background-color:#0033c4;color:white">
      <th>SIno</th>
      <th>District</th>
      <th>Place</th>
    
      <th>Action</th>
    </tr>
     <?php
	$i=0;
	$selQry= "select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	
	?>
    <tr>
   
      <td><?php echo $i?></td>
      <td><?php echo $data["district_name"]?></td>
      <td><?php echo $data["place_name"]?></td>
      
      <td><a href="place.php?did=<?php echo $data ["place_id"]?>">Delete</a>||<a href="place.php?eid=<?php echo $data ["place_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>