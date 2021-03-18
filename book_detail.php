<?php
include("./header.php");
include("./menu.php");
include("./connect.php");
 ?>
</-------------------------------------------------------------------------------->
<br><center ><p style="font-size:25px;">กรอกข้อมูลการจอง</p></center>
<center><table width="30%">
  <form action = "./book_submit.php" method="post">
    <td>&nbsp;</td>
    <tr>
      <td>สนาม : </td> <td><select name="s_id" required>
        <?php
        $sql = "SELECT * FROM stadium";
        $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
        while($row = mysqli_fetch_array($result)) {
          $s_id = $row["s_id"];
          $s_name = $row["s_name"];
          ?>
          <option value="<?php echo $s_id ; ?>"><?php echo $s_name;?></option>
          <?php
        }
        ?>
      </select></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>วันที่จอง : </td> <td><input type="date" name="s_date" required></td>
         </tr>
    <td>&nbsp;</td>
    <tr>
      <td>เวลาที่จอง : </td> <td><select name="s_time" required>
        <?php
        $i = 9;
        while ($i < 22) {
            echo '<option value="'.$i.':00 - '.($i + 1).':00">'.$i.':00 - '.($i + 1).':00 </option>';
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
