<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>seater</title>
</head>

<body>
<?php
ob_start();
include("Head.php");
if(isset($_POST["btn_save"]))
{
	$Vehicle=$_POST["txt_type"];
	$id = $_POST["txt_id"];
	if($id!="")
	{
		$upQry = "update tbl_seater set seater_count='".$Vehicle."' where seater_id='".$id."'";
		if($Conn->query($upQry))
		{
			header("Location:Seater.php");
		}
	}
	else
	{
		$insQry="insert into tbl_seater(seater_count)values('".$Vehicle."')";
		if($Conn->query($insQry))
		{
			?>
        	<script>
			alert("data inserted!!");
			window.location="Seater.php";
			</script>
   		 	<?php
    	}
	}
}
if(isset($_GET["did"]))
{
	$delQry = "delete from tbl_seater where seater_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
		header("Location:Seater.php");
	}
}

$typid = "";
$typename = "";
if(isset($_GET["eid"]))
{
	$seltype = "select * from tbl_seater where seater_id='".$_GET["eid"]."'";
	$rowtype = $Conn->query($seltype);
	$datatype = $rowtype->fetch_assoc();
	
	$typid = $datatype["seater_id"];
	$typename = $datatype["seater_count"];
	
}
?>
<br>
<form id="form1" name="form1" method="post" action="">
	<h3 align="center">Seater</h3>
  <table width="200" border="0"align="center">
    <tr>
      <td>Seater</td>
      <td><label for="txt_type"></label>
      <input type="text" name="txt_type" id="txt_type" value="<?php echo $typename ?>"/> <input type="hidden" name="txt_id" value="<?php echo $typid ?>"/></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_save" id="btn_save" value="save" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"/>
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"/></td>
    </tr>
  </table>
  <br />
  <table width="500" border="1"align="center">
    <tr style="background-color:#0033c4;color:white">
    
      <th>SINO</th>
      <th>SEATER</th>
      <th>ACTION</th>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_seater";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	

	?>
    <tr>
      <td><?php echo $i ?> </td>
      <td><?php echo $data["seater_count"] ?></td>
            <td><a href="Seater.php?did=<?php echo $data["seater_id"]?>">Delete</a>||<a href="Seater.php?eid=<?php echo $data ["seater_id"]?>">Edit</a></td>

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