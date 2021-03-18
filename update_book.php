<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<?php
$b_id = $_POST["b_id"];
$m_id = $_SESSION['m_id'];
$s_id = $_POST["s_id"];
$s_name = $_POST["s_name"];
$s_price = $_POST["s_price"];
$s_date = $_POST["s_date"];
$s_time = $_POST["s_time"];
$b_advance_deposit = $_POST["b_advance_deposit"];


$sql = "select * from book where b_id = $b_id";
$select =  $mysqli -> query($sql) or die($mysqli->error.__LINE__);
$row = mysqli_fetch_array($select);
$b_status = $row['status_id'];
$book_b_advance_deposit = $row['b_advance_deposit'];

$sql_select = "select * from book where not b_id = $b_id";
$select =  $mysqli -> query($sql_select) or die($mysqli->error.__LINE__);
$t = 0;
while($row = mysqli_fetch_array($select)){
    $book_b_date = $row['b_date'];
    $book_b_time = $row['b_time'];
    $book_s_id = $row['s_id'];

  if ($book_s_id == $s_id and $book_b_date == $s_date and $s_time == $book_b_time )  {
    $message = "ไม่สามารถแก่ไขได้ เนื่องจากมีการจองนี้แล้ว";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<meta http-equiv=\"refresh\"content=\"0; url=./book_list.php\"/>";
    $t = $t+1;
    echo exit();
  }
}
if ($b_advance_deposit > $book_b_advance_deposit and $b_status != 1) {
  $message = "ไม่สามารถแก่ไขได้ เนื่องจากกำนวนเงินค่ามัดมีค่ามากกว่าเงินมัดจำที่จ่ายมาแล้ว";
  echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<meta http-equiv=\"refresh\"content=\"0; url=./book_list.php\"/>";
  $t = $t+1;
  echo exit();
}
  if ($t <= 0 and $b_status == 1) {
    $sql_update = "update book set b_advance_deposit = '$b_advance_deposit', b_date = '$s_date',
    b_time = '$s_time' , s_id = '$s_id' where b_id='$b_id' ";
    $mysqli -> query($sql_update) or die($mysqli->error.__LINE__);
    $mysqli -> close();
  }else {
    $sql_update = "update book set b_date = '$s_date',
    b_time = '$s_time' , s_id = '$s_id' where b_id='$b_id' ";
    $mysqli -> query($sql_update) or die($mysqli->error.__LINE__);
    $mysqli -> close();
  }
    echo"<meta http-equiv=\"refresh\" content=\"1; url=book_list.php\">"."";
    $message = "แก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$message');</script>";
?>
