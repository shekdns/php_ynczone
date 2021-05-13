<?php

session_start();
//  isset 값이 잇나 없나 검사하는 함수
//  ex 유저 아이디가 존재하면 변수에다가 세션 변수를 담아줌 아니면 흘러가기 밑으로
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";


$con = mysqli_connect("localhost", "root", "", "project");
 mysqli_set_charset($con, 'utf8');

 $p_ctg = $_POST["p_ctg"];

 $p_num = $_POST["p_num"];
 $name = $username;
 $content = $_POST["content"];
 $star = $_POST["star"];
 $regist_day = date("Y-m-d (H:i)");
 $id = $userid;

 $sql = "insert into reply(p_num, name, content, date, star, id)";
 $sql .= "values('$p_num', '$name', '$content', '$regist_day' , '$star' , '$id')";

 mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행W
 mysqli_close($con);

echo "
  <script>

    location.href = 'list_view.php?num=$p_num&category=$p_ctg';

    </script>

";



 ?>
