<?php 
include("../Connection/Connection.php");
$selQry="select * from tbl_agent a inner join tbl_place p on p.place_id=a.place_id inner join tbl_district d on d.district_id=p.district_id where a.place_id='".$_GET['aid']."'";
$data=$Conn->query($selQry);
while($row=$data->fetch_assoc())
{

?>

<table width="200" border="1">
  <tr>
    <td><p><img src="../Assets/Files/Agent/<?php echo $row['agent_photo'] ?>" width="150" height="150"/><br />
    <?php  echo $row['agent_name']?><br />
    <?php  echo $row['agent_address']?><br>
    <?php echo $row['agent_contact']?></br>
    <?php  echo $row['district_name']?><br />
    <?php  echo $row['place_name']?><br>
    <a href="SearchCar.php?cid=<?php echo $row['agent_id'] ?>">View Cars</a>
    </p></td>
  </tr>
</table>
<?php
}
?>