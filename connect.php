<?php
$mysqli = mysqli_connect("localhost","root","123456789","final_a_annn");
if(mysqli_connect_errno($mysqli)){
  echo "Failed to connect to MySQL : ".mysqli_connect_error();
}
$mysqli -> query("SET NAMES utf8");
 ?>
