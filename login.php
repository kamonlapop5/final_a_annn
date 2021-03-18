<?php
include("./header.php");
include("./menu.php");
 ?>
</-------------------------------------------------------------------------------->
 &nbsp;<center><p style="font-size:25px;">เข้าสู่ระบบ</p></center>
<form action ="check.php" method="post" name="frm">
  <center><table width="50%">
    <tr>
      <td >User :</td>
      <td><input type="text" name="User"></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td>Password :</td>
      <td><input type="password" name="Password"></td>
    </tr>
    <td>&nbsp;</td>
    <tr>
      <td align="center"><input style="background-color:B5E06B" type="submit" value="เข้าสู่ระบบ"></td>
      <td><button type="cancel" style="background-color:FF0000" onclick="window.location='index.php';return false;">ย้อนกลับ</button></td>
    </tr>
</table>
</center>
</form>
</-------------------------------------------------------------------------------->
 <?php
 include("./footer.php");
  ?>
