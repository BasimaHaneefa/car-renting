<?php
session_start();
if(!(isset($_SESSION['adid']) && !empty($_SESSION['adid']))){
    header("location: ../Guest/Login.php");
}