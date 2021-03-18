<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<!------------------------------------------------------>
<?php
$b_id = $_GET["b_id"];

    $sql = "delete from book where b_id='$b_id'" ;
    $mysqli -> query($sql) or die($mysqli->error.__LINE__);
    $mysqli -> close();
?>
<!------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
<meta http-equiv="refresh" content="0; url=./book_list.php">
