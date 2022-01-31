<?php session_start(); 
include("../library/variabel.php");
include("../library/koneksi.php");

if($_SESSION["user"]!="" && $_SESSION["pass"]!=""){
	include "../library/koneksi.php";
	include "view/index.php"; 
}else{
header('location:../login.php');
}
?>
