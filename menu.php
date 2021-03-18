<tr>
  <td bgcolor = B5E06B width = "15%" height = "500" valign = "top">&nbsp;
    <table  width="100%" align="left" >
      <td bgcolor="B5E06B" height="70" >
</-------------------------------------------------------------------------------->
  <?php if ($_SESSION["m_id"] == ""){ ?>
    <li ><a href="./login.php" style="color:black">เข้าสู่ระบบ</a></li><hr>
    <li ><a href="./Index.php" style="color:black">หน้าแรก</a></li><hr>
  <?php }else {  ?>
    <li ><a href="./logout.php" style="color:black">ออกจากระบบ</a></li><hr>
    <li ><a href="./Index.php" style="color:black">หน้าแรก</a></li><hr>
    <li ><a href="./book_detail.php" style="color:black">จองสนามกีฬา</a></li><hr>
    <li ><a href="./book_list.php" style="color:black">รายการการจอง</a></li><hr>
  <?php } ?>



</-------------------------------------------------------------------------------->
</td>
</table>
</td>
  <td bgcolor="white" valign = "top">
