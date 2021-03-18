<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
<?php
$s_id = $_POST["s_id"];
$s_date = $_POST["s_date"];
$s_time = $_POST["s_time"];
$b_id = $_POST["b_id"];
$sql = "SELECT * FROM stadium where s_id = $s_id";
$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
while($row = mysqli_fetch_array($result)) {
  $s_name = $row["s_name"];
  $s_price = $row["s_price"];
}

$b_advance_deposit = $s_price *0.25;

$timestamp = strtotime($s_date);
$new_date = date("d-m-Y", $timestamp);

$today = strtotime(date("d-m-Y"));

if ($today >= $timestamp) {
  $message = "กรุณาเลือกวันล่วงหน้าอย่างน้อย 1 วัน";
  echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<body onload=\";return history.back();\">";
  echo exit();
}
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">ข้อมูลการจอง</p></center>
<center><table width="30%">
  <form action = "./update_book.php" method="post">
    <input type = "hidden"  name = "b_id" value="<?php echo $b_id;?>">
    <input type = "hidden"  name = "s_id" value="<?php echo $s_id;?>">
    <input type = "hidden"  name = "s_name" value="<?php echo $s_name;?>">
    <input type = "hidden"  name = "s_price" value="<?php echo $s_price;?>">
    <input type = "hidden"  name = "s_date" value="<?php echo $new_date;?>">
    <input type = "hidden"  name = "s_time" value="<?php echo $s_time;?>">
    <input type = "hidden"  name = "b_advance_deposit" value="<?php echo $b_advance_deposit;?>">
    <td>&nbsp;</td>
    <tr>
      <td>สนาม : </td> <td><?php echo "$s_name" ?></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>ราคา : </td>  <td><?php echo "$s_price" ?></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>วันที่จอง : </td> <td><?php echo "$new_date" ?></td>
         </tr>
    <td>&nbsp;</td>
    <tr>
      <td>เวลาที่จอง : </td><td><?php echo "$s_time" ?></td>
         </tr>
    <td>&nbsp;</td>
    <tr>
      <td>ราคามัดจำ : </td><td><?php echo "$b_advance_deposit" ?></td>
         </tr>
    <td>&nbsp;</td>
      <tr>
        <td align="center"><input style="background-color:B5E06B" type="submit" value="ตกลง"></td>
        <td align="center"><button type="cancel" style="background-color:FF0000" onclick="window.location='index.php';return false;">ยกเลิก</button></td>
      </tr>
      <td>&nbsp;</td>
</center>
</form>
</table>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
