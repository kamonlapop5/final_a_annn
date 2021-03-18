<?php
include("./header.php");
include("./menu.php");


include("./connect.php");
 ?>
</-------------------------------------------------------------------------------->

<?php

if ($_SESSION["m_id"] != ""){
echo "<br><h3><center>ยินดีต้อนรับ คุณ".$_SESSION["m_fname"]." ".$_SESSION["m_lname"]." เข้าสู่ระบบจองสนามกีฬา บริษัท ThaiSport</h3></center> ";
?>
<?php
}else{
echo "<br><h3><center>ยินดีต้อนรับเข้าสู่ระบบจองสนามกีฬา บริษัท ThaiSport</h3></center>";
}

?>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
