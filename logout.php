<?php 
session_start();
  if($_SESSION["name"])
  {
  
  //unset($_SESSION["id"]);
  unset($_SESSION["name"]);
  header("location:index.php");
  }
  else{
    header("location:index.php");
  }
?>