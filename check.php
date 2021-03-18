<?php
include("./header.php");
include("./menu.php");
include("connect.php");

$User = $_POST["User"];
$Pass = $_POST["Password"];
 ?>
 <?php
 $sql = "select * from member where m_user = '$User'";
 $result = $mysqli -> query($sql)or die($mysqli ->error.__LINE__);
 $i=0;
 while ($row = mysqli_fetch_array($result)) {
   $i = $i+1;
   $m_id = $row["m_id"];
   $m_fname = $row["m_fname"];
   $m_lname = $row["m_lname"];
   $m_username = $row["m_user"];
   $m_password = $row["m_pass"];
 }
 if($i==0){
   echo "<meta http-equiv=\"refresh\"content=\"0; url=./login.php?error=กรุณากรอกข้อมูลให้ถูกต้อง\"/>";
   echo"<script>alert(\"กรุณากรอกข้อมูลให้ถูกต้อง\")</script>";
   echo exit();
 }elseif ($i==1) {
   if($Pass != $m_password){
     echo "<meta http-equiv=\"refresh\"content=\"0; url=./login.php?error=กรุณากรอกข้อมูลให้ถูกต้อง\"/>";
     echo"<script>alert(\"กรุณากรอกข้อมูลให้ถูกต้อง\")</script>";
     echo exit();
 }else {
   $_SESSION["m_id"]=$m_id;
   $_SESSION["m_fname"]=$m_fname;
   $_SESSION["m_lname"]=$m_lname;
   echo "<meta http-equiv=\"refresh\" content=\"0; url=./index.php\">";
 }
}
 $mysqli -> close();
   include("./footer.php");
  ?>
