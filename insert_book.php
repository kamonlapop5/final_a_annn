<?php
include("./header.php");
include("./menu.php");
include("./connect.php"); ?>
<?php

$m_id = $_SESSION['m_id'];
$s_id = $_POST["s_id"];
$s_name = $_POST["s_name"];
$s_price = $_POST["s_price"];
$s_date = $_POST["s_date"];
$s_time = $_POST["s_time"];
$b_advance_deposit = $_POST["b_advance_deposit"];

$to_date = date("Y-m-d H:i:s",strtotime("1 day 6 Hours"));
$exp_date = date($to_date,$th);


$sql_select = "select * from book";
$select =  $mysqli -> query($sql_select) or die($mysqli->error.__LINE__);
$t = 0;
while($row = mysqli_fetch_array($select)){
    $book_b_date = $row['b_date'];
    $book_b_time = $row['b_time'];
    $book_s_id = $row['s_id'];

    if ($book_s_id == $s_id and $book_b_date == $s_date and $s_time == $book_b_time )  {
      $message = "ไม่สามารถจองได้ เนื่องจากมีการจองนี้แล้ว";
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0; url=./book_detail.php\"/>";
      $t = $t+1;
      echo exit();
    }
  }
if ($t <= 0) {
  $sql_insert = "insert into book values('','1','5','$b_advance_deposit','$s_date','$s_time','$exp_date','$m_id','$s_id')";
  $mysqli -> query($sql_insert) or die($mysqli->error.__LINE__);
  $mysqli -> close();
}
 ?>
 <?php echo"<meta http-equiv=\"refresh\" content=\"0; url=book_list.php\">" ?>

 <?php
 $message = "จองสำเร็จ";
 echo "<script type='text/javascript'>alert('$message');</script>";
 ?>
