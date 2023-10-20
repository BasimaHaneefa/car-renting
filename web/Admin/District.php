<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carrenting::District </title>
</head>

<body>
<?php
ob_start();
include("Head.php");
if(isset($_POST["btn_save"]))
{
	$District=$_POST["txt_district"];
		$id = $_POST["txt_id"];

	if($id!="")
	{
		$upQry = "update tbl_district set district_name='".$District."' where district_id='".$id."'";
		if($Conn->query($upQry))
		{
			header("Location:district.php");
		}
	}
	else
	{
		$insQry="insert into tbl_district(district_name)values('".$District."')";
		if($Conn->query($insQry))
		{
			?>	
				<script>
				alert("data inserted!!");
				window.location="District.php";
				</script>
   			 <?php
    	}
	}
}
if(isset($_GET["did"]))
{
	$delQry = "delete from tbl_district where district_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
		header("Location:district.php");
	}
}

$disid = "";
$disname = "";
if(isset($_GET["eid"]))
{
	$seldis = "select * from tbl_district where district_id='".$_GET["eid"]."'";
	$rowdis = $Conn->query($seldis);
	$datadis = $rowdis->fetch_assoc();
	
	$disid = $datadis["district_id"];
	$disname = $datadis["district_name"];
	
}

	?>
    
    <br>
<form id="form1" name="form1" method="post" action="">
	<h3 align="center">District</h3>
  <table width="200" border="0" align="center">
    <tr>
      <td>District  </td>
      <td><label for="txt_district"></label>
      <input type="text" name="txt_district" id="txt_district"value="<?php echo $disname ?>" required/> <input type="hidden" name="txt_id" value="<?php echo $disid ?>"/></td> 
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="save" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"/>
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"/></td>
    </tr>
  </table>
  <br />
  <br />
  <table width="500" border="1" align="center">
    <tr style="background-color:#0033c4;color:white">
      <th width="76">SINO</th>
      <th width="98">District</th>
      <th width="8">Action</th>
    </tr>
    <?php
	$i=0;
	$selQry= "select * from tbl_district";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	
	?>
    <tr>
   
      <td><?php echo $i?></td>
      <td><?php echo $data["district_name"]?></td>
      <td><a href="District.php?did=<?php echo $data ["district_id"]?>">Delete</a>||<a href="district.php?eid=<?php echo $data ["district_id"]?>">Edit</a></td>
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