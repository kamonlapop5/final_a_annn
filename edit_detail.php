<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
 <?php
 $b_id = $_GET["b_id"];
 $sql = "SELECT * FROM book where b_id = $b_id";
 $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
 while($row = mysqli_fetch_array($result)) {
   $book_b_date = $row["b_date"];
   $book_s_id = $row["s_id"];
   $book_b_time = $row["b_time"];
 }
 $timestamp = strtotime($book_b_date);
 $new_date = date("Y-m-d", $timestamp);
  ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">กรอกข้อมูลการจอง</p></center>
<center><table width="30%">
  <form action = "./book_edit.php" method="post">
    <input type = "hidden"  name = "b_id" value="<?php echo $b_id;?>">
    <td>&nbsp;</td>
    <tr>
      <td>สนาม : </td> <td><select name="s_id" required>
        <?php
        $sql1 = "SELECT * FROM stadium";
        $result1 = $mysqli->query($sql1) or die($mysqli->error.__LINE__);
        while($row1 = mysqli_fetch_array($result1)) {
          $s_id = $row1["s_id"];
          $s_name = $row1["s_name"];

          if ($book_s_id == $s_id) {
            ?>
            <option selected value="<?php echo $s_id ; ?>"><?php echo $s_name;?></option>
            <?php
          }else {?>
            <option value="<?php echo $s_id ; ?>"><?php echo $s_name;?></option>
          <?php } ?>
          <?php
        }
        ?>
      </select></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>วันที่จอง : </td> <td><input type="date" name="s_date" required value="<?php echo $new_date; ?>"></td>
         </tr>
    <td>&nbsp;</td>
    <tr>
      <td>เวลาที่จอง : </td> <td><select name="s_time" required>
        <?php
        $i = 9;
        while ($i < 22) {
          if ($i.':00 - '.($i + 1).':00' == $book_b_time) {
            echo '<option selected value="'.$i.':00 - '.($i + 1).':00">'.$i.' : 00 - '.($i + 1).' : 00 </option>';
          }else {
            echo '<option value="'.$i.':00 - '.($i + 1).':00">'.$i.' : 00 - '.($i + 1).' : 00 </option>';
          }
            $i = $i+1;
        }
         ?>
      </select></td>
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
