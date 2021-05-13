<?php

session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";


$con = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($con, 'utf8');
$sql = "delete from temp where session_id = '$userid' and situ = '배송완료'";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
   <script>
       location.href = 'mypage.php?id=$userid';
   </script>
 ";



 ?>
