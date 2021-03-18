<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
?>
<?php
$m_id = $_SESSION["m_id"];
$to_date = date("Y-m-d H:i:s",strtotime("6 Hours"));
$exp_date = date($to_date,$th);
 ?>

    <br><h2 class="well"><center>รายการการจอง</center></h2>
    <div class="col-lg-12 well">
      <?php if ($s_id == 2 or $station == 2): ?>
      <p align="right"><a href="./book_builing.php" class="btn btn-success glyphicon glyphicon-plus">เพิ่มข้อมูลการจอง</a></p>
    <?php endif; ?>
      <table id= "example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>

              <th class="bg-info text-center"><h5><center>ลำดับ</center></h5></th>
              <th class="bg-info text-center"><h5><center>สนาม</center></h5></th>
              <th class="bg-info text-center"><h5><center>วันที่</center></h5></th>
              <th class="bg-info text-center"><h5><center>เวลา</center></h5></th>
              <th class="bg-info text-center"><h5><center>สถานะ</center></h5></th>
              <th class="bg-info text-center"><center><h5>การจัดการ</h5></center></th>

          </tr>
        </thead>
        <tbody>

<?php
$i = 0;
$sql = "SELECT * FROM book inner join status on status.status_id = book.status_id inner join stadium on stadium.s_id = book.s_id WHERE m_id = '$m_id' ";
$result = $mysqli -> query($sql) or die($mysqli->error.__line__);
while($row = mysqli_fetch_array($result)){
    $sql1 = "SELECT * FROM book inner join status on status.status_id = book.status_id_stadium";
    $result1 = $mysqli -> query($sql1) or die($mysqli->error.__line__);
    $row1 = mysqli_fetch_array($result1);
    $i = $i+1;
    $b_id = $row['b_id'];
    $s_name = $row['s_name'];
    $b_price = $row['b_price'];
    $b_date = $row['b_date'];
    $b_time = $row['b_time'];
    $status_name = $row['status_name'];
    $status_id = $row['status_id'];
    $b_exp_date = $row['b_exp_date'];

    $f_date_now = substr("$b_time",0, 5);

    $all_date_time = $b_date.' '.$f_date_now;
    $timestamp_book = strtotime($all_date_time);
    $new_date = date("Y-m-d H:i:s", $timestamp_book);
    $new_date = date('Y-m-d H:i:s', strtotime('15 minutes', strtotime($new_date)));
    
    echo "<tr>";
    echo "<td><center><h7>$i</h7></center></td>";
    echo "<td><center><h7>$s_name</h7></center></td>";
    echo "<td><center><h7>$b_date</h7></center></td>";
    echo "<td><center><h7>$b_time</h7></center></td>";
    if ($status_id == 1) {
      if ((strtotime($b_exp_date) - strtotime($exp_date))/  ( 60 * 60 ) > 0) {
        echo "<td><center><h7>$status_name</h7></center></td>";
      }else {
        echo "<td><center><h7><a href=\"./delete_book_list.php?b_id=$b_id\">ยกเลิกการจอง</h7></center></td>";
      }
    }else {
        if ((strtotime($exp_date) - strtotime($new_date))/  ( 60 * 60 ) > 0) {
        echo "<td><center><h7><a href=\"./delete_book_list.php?b_id=$b_id\">ยกเลิกการบริการ</h7></center></td>";
      }else {
        echo "<td><center><h7>$status_name</h7></center></td>";
      }
    }

    if ($status_id == 1) {
      echo "<td><center><h7><a href=\"./edit_detail.php?b_id=$b_id\">แก้ไขรายละเอียด</a>
      <a href=\"./delete_book_list.php?b_id=$b_id\" onClick=\"javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');\">ลบ</a></center></h6</td> ";
      echo "</tr>";
    }elseif ($status_id == 3) {
      echo "<td><center><h7> - </a></td>";
    }else {
      echo "<td><center><h7><a href=\"./edit_detail.php?b_id=$b_id\">แก้ไขรายละเอียด</a></td>";
    }
}
  if ($i < 1 ) {
    echo "<td colspan=\"8\"><center><h7>ไม่มีข้อมูล</h7></center></td>";
  }
  echo "</tbody>";
  echo "</table>";
  $mysqli -> close();
   ?>
<?php
include("./footer.php");
 ?>
