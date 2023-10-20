<?php

$Servername="localhost";
$Username="root";
$Password="";
$db="db_carrenting";

$Conn= mysqli_connect($Servername,$Username,$Password,$db);

if(!$Conn)
{
	echo "Not connected";
}
?>