<?php
session_start();
//  isset 값이 잇나 없나 검사하는 함수
//  ex 유저 아이디가 존재하면 변수에다가 세션 변수를 담아줌 아니면 흘러가기 밑으로
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


  $sql = "delete from basket where session_id = '$userid'";
  mysqli_query($con, $sql);

 mysqli_close($con);

echo "
  <script>

    location.href = 'basket_view.php';

    </script>

";

 ?>
