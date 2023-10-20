<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>
</head>
<body>
<?php
ob_start();
include("Head.php");
if(isset($_POST["btn_save"]))
{
    $brand=$_POST["txt_brand"];
    $hid=$_POST["txt_hid"];

    if($hid=="")
    {
    $insQry="insert into tbl_brand(brand_name)values('".$brand."')";
    if($Conn->query($insQry))
		{
			?>
        	<script>
			alert("data inserted!!");
			window.location="Brand.php";
			</script>
   		 	<?php
    	}
    }else
    {
        $upQry="update tbl_brand set brand_name='".$brand."' where brand_id='".$hid."'";
        $Conn->query($upQry);
        header("location:Brand.php");
    }

}
if(isset($_GET["did"]))
{
    $delQry="delete from tbl_brand where brand_id='".$_GET["did"]."'";
    $Conn->query($delQry);
    header("location:Brand.php");
}
$bid="";
$bname="";
if(isset($_GET["edid"]))
{
    $selQ="select * from tbl_brand where brand_id='".$_GET["edid"]."'";
    $rowE=$Conn->query($selQ);
    $dataE=$rowE->fetch_assoc();

    $bid=$dataE["brand_id"];
    $bname=$dataE["brand_name"];

}
?>
    <br>
<form id="form1" name="form1" method="post" action="">
	<h3 align="center">Brand</h3>
        <table border='0' align="center">
            <tr>
                <td>
                    Brand
                </td>
                <td><input type="text" name="txt_brand" id="" value="<?php echo $bname ?>">
            <input type="hidden" name="txt_hid" value="<?php echo $bid ?>"></td>
            </tr>
            <tr>
                <td colspan=2 align="center"><input type="submit" value="Save" name="btn_save"style="background-color:#0033c4;border:white;color:white;padding:5px 10px">
                <input type="reset" value="Cancel" style="background-color:#0033c4;border:white;color:white;padding:5px 10px"></td>
            </tr>
        </table>
    </form>
    <br><br>
    <table border=1 align=center>
        <tr style="background-color:#0033c4;color:white">
            <th>Sl.no</th>
            <th>Brand</th>
            <th>Action</th>
        </tr>
        <?php
        $i=0;
        $selQry="select * from tbl_brand";
        $row=$Conn->query($selQry);
	    while($data=$row->fetch_assoc())
	    {
		    $i++;
		
	
        ?>
        <tr>
            <td><?php  echo $i; ?></td>
            <td><?php  echo $data["brand_name"]?></td>
            <td><a href="Brand.php?did=<?php echo $data["brand_id"] ?>">Delete</a>||<a href="Brand.php?edid=<?php echo $data["brand_id"] ?>">Edit</td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>