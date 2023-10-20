<?php

include("../Assets/Connection/connection.php");
 

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
  <a href="Homepage.php">Home</a>
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_agent";
  $row=$Conn->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["agent_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_agent";
  $row=$Conn->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(*) as id from tbl_booking b inner join tbl_car c on c.car_id=b.car_id inner join tbl_agent a on a.agent_id=c.agent_id WHERE c.agent_id='".$data["agent_id"]."'";
	  
	  $row1=$Conn->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#00FFFF",
  "#FF00FF",
  "#FFFF00",
  "#000000"
];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Bookings"
    }
  }
});
</script>

</div>
</body>
</html>
