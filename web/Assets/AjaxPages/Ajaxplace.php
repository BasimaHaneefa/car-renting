

<option value="">Select City</option>
<?php
include("../Connection/Connection.php");
    $selQry="select * from tbl_place where district_id='".$_GET["did"]."'";
    $rs=$Conn->query($selQry);
    while($row=$rs->fetch_assoc())
    {
       ?>
        <option value="<?php echo $row["place_id"]?>"><?php echo $row["place_name"]?></option>
       <?php
    }
?>